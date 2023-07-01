<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IdentificationType;

class IdentificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $identificationTypes = [
            ['name' => 'CC', 'description' => 'Cédula de ciudadanía'],
            ['name' => 'CE', 'description' => 'Cédula de extranjería'],
            ['name' => 'DN', 'description' => 'Dossiernumber'],
            ['name' => 'NIT', 'description' => 'Número de identificación tributaria'],
            ['name' => 'AS', 'description' => 'Adulto sin identificación'],
            ['name' => 'MS', 'description' => 'Menor sin identificación'],
            ['name' => 'ND', 'description' => 'No definido'],
            ['name' => 'PA', 'description' => 'Pasaporte'],
            ['name' => 'KVK', 'description' => 'KVK'],
        ];

        foreach ($identificationTypes as $identificationType) {
            IdentificationType::create($identificationType);
        }
    }
}
