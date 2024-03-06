<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Condition;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // 1 | Pes ajustat < 50
        Condition::create([
            'criteriaId' => 2,
            'min' => 0,
            'max' => 49
        ]);

        // 2 | Pes ajustat 50-60
        Condition::create([
            'criteriaId' => 2,
            'min' => 50,
            'max' => 59
        ]);

        // 3 | Pes ajustat 60-75
        Condition::create([
            'criteriaId' => 2,
            'min' => 60,
            'max' => 74
        ]);

        // 4 | Pes ajustat 75-90
        Condition::create([
            'criteriaId' => 2,
            'min' => 75,
            'max' => 89
        ]);

        // 5 | Pes ajustat 90-110
        Condition::create([
            'criteriaId' => 2,
            'min' => 90,
            'max' => 110
        ]);

        // 6 | Filtrat glomerular < 15
        Condition::create([
            'criteriaId' => 3,
            'min' => 0,
            'max' => 14
        ]);

        // 7 | Filtrat glomerular > 15
        Condition::create([
            'criteriaId' => 3,
            'min' => 15,
            'max' => null
        ]);
    }
}
