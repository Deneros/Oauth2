<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_path = storage_path('app/public/cities.json');

        $cities = file_get_contents($json_path);
        $data = json_decode($cities, true);

        foreach ($data as $item) {
            foreach ($item['ciudades'] as $city_name) {
                City::create([
                    'name' => $city_name,
                ]);
            }
        }
    }
}
