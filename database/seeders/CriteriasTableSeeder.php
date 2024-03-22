<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Criteria;

class CriteriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Criteria::create([
            'name' => 'Pes real',
            'unity' => 'kg'
        ]);

        Criteria::create([
            'name' => 'Pes ajustat',
            'unity' => 'kg'
        ]);

        Criteria::create([
            'name' => 'Filtrat glomerular',
            'unity' => 'fg'
        ]);
    }
}
