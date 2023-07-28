<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Carlos',
            'family_name' => 'Zapata Admin',
            'identification_number' => 31894312, 
            'identification_type_id' => 1, 
            'email' => 'cazapata@fullengine.com', 
            'email_verified_at' => now(),
            'password' => Hash::make('otbLsz3wLAWG'), 
            'disabled' => false,
            'role_id' => 1,
        ]);
    }
}
