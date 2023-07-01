<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = [
            'Desarrollo de la Agricultura',
            'Desarrollo de la Minería',
            'Economía',
            'Emprendimiento',
            'Seguridad',
            'Crear oportunidades de Empleo',
            'Educación',
            'Salud',
            'Recreación',
            'Turismo'
        ];

        foreach ($topics as $topic) {
            Topic::create(['name' => $topic]);
        }
    }
}
