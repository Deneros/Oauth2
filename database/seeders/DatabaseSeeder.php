<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
// use Database\Seeders\GenderSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenderSeeder::class);
        $this->call(IdentificationTypeSeeder::class);
        $this->call(HousingTypeSeeder::class);
        $this->call(TopicSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(TypeCandidatesTableSeeder::class);
    }
}
