<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeCandidate;

class TypeCandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Alcaldia', 'Concejo ', 'Asamblea', 'Gobernacion'];

        foreach ($types as $type) {
            TypeCandidate::create([
                'name' => $type,
            ]);
        }
    }
}
