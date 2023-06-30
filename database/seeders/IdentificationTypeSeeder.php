<?php

namespace Database\Seeders;

use App\Models\IdentificationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdentificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoIdentificaciones = [
            ['nombre' => 'Cédula de ciudadanía'],
            ['nombre' => 'Cédula de extranjería'],
        ];

        foreach ($tipoIdentificaciones as $tipoIdentificacion) {
            IdentificationType::create($tipoIdentificacion);
        }
    }
}
