<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1 
        Question::create([
            'question' => 'Profilaxi quirúrgica d’elecció'
        ]);

        // 2
        Question::create([
            'question' => 'Al·lèrgia a Penicil·lina'
        ]);

        // 3
        Question::create([
            'question' => 'Pacients colonitzats per MARSA'
        ]);
    }
}
