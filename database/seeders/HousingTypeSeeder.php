<?php

namespace Database\Seeders;

use App\Models\HousingType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HousingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoViviendas = [
            ['nombre' => 'Propia'],
            ['nombre' => 'Familiar'],
            ['nombre' => 'Arriendo'],
        ];

        foreach ($tipoViviendas as $tipoVivienda) {
            HousingType::create($tipoVivienda);
        }
    }
}
