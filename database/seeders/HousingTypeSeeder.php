<?php

namespace Database\Seeders;

use App\Models\HousingType;
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
        $housings = [
            ['name' => 'Propia'],
            ['name' => 'Familiar'],
            ['name' => 'Arriendo'],
        ];

        foreach ($housings as $housing) {
            HousingType::create($housing);
        }
    }
}
