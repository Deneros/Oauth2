<?php

namespace Database\Seeders;

use App\Models\HousingType;
use App\Models\IdentificationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GenderSeeder;

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
        $this->call(IdentificationType::class);
        $this->call(HousingType::class);
    }
}
