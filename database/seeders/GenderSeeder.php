<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            ['name' => 'Masculino'],
            ['name' => 'Femenino'],
            ['name' => 'No binario'],
        ];

        foreach ($genders as $gender) {
            Gender::create($gender);
        }
    }
}
