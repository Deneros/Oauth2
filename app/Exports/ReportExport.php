<?php

namespace App\Exports;

use App\Models\FormData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class ReportExport implements FromCollection, WithHeadings
{
    protected $results;

    public function __construct(Collection $results)
    {
        $this->results = $results;
    }

    public function collection()
    {
        return $this->results->map(function ($item) {
            return [
                'Nombre' => optional($item->user)->name,
                'Apellido' => optional($item->user)->family_name,
                'Género' => optional($item->gender)->name,
                'Tipo de vivienda' => optional($item->housingType)->name,
                'Tipo de identificación' => optional($item->identificationType)->name,
                'Ciudad de nacimiento' => optional($item->cityOfBirth)->name,
                'Ciudad de residencia' => optional($item->cityOfResidence)->name,
                'Edad' => $item->age,
                'Tiene hijos' => $item->has_children ? 'Sí' : 'No',
                'Cantidad de hijos' => $item->number_of_children,
                'Número de identificación' => $item->identification_number,
                'Fecha de nacimiento' => $item->date_of_birth,
                'Nacionalidad' => $item->nationality,
                'Recinto electoral' => $item->polling_station,
                'Dirección de recinto electoral' => $item->polling_address,
                'Lugar de votación' => $item->polling_place,
                'Dirección de residencia' => $item->residence_address,
                'Barrio' => $item->neighborhood,
                'Ciudad de residencia (ID)' => $item->place_of_residence_id,
                'Teléfono celular' => $item->cellphone,
                'Dependientes' => $item->dependents,
                'Hijos' => $item->has_children ? 'Sí' : 'No',
                'Cantidad de hijos' => $item->number_of_children,
                'Hijos que viven contigo' => $item->children_living_with_you,
                'Hijos adultos' => $item->adult_children,
                'Votó en 2022 (Congreso y Presidencia)' => $item->voted_2022_congress_presidency ? 'Sí' : 'No',
                'Votó en 2019 (Alcaldía y Gobernación)' => $item->voted_2019_mayor_governor ? 'Sí' : 'No',
                'Registrado en Dagua' => $item->registered_in_dagua ? 'Sí' : 'No',
                'Líder' => optional($item->leader)->name,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Apellido',
            'Género',
            'Tipo de vivienda',
            'Tipo de identificación',
            'Ciudad de nacimiento',
            'Ciudad de residencia',
            'Edad',
            'Tiene hijos',
            'Cantidad de hijos',
            'Número de identificación',
            'Fecha de nacimiento',
            'Nacionalidad',
            'Recinto electoral',
            'Dirección de recinto electoral',
            'Lugar de votación',
            'Dirección de residencia',
            'Barrio',
            'Ciudad de residencia (ID)',
            'Teléfono celular',
            'Dependientes',
            'Hijos',
            'Cantidad de hijos',
            'Hijos que viven contigo',
            'Hijos adultos',
            'Votó en 2022 (Congreso y Presidencia)',
            'Votó en 2019 (Alcaldía y Gobernación)',
            'Registrado en Dagua',
            'Líder',
        ];
    }
}
