<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ConditionsDose;

class ConditionsDosesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dose:1 | GENTAMICINA 160mg: PA < 50 && FG < 15
        // PA < 50
        ConditionsDose::create([
            'conditionId' => 1, // PA < 50
            'doseId' => 1
        ]);

        // FG < 15
        ConditionsDose::create([
            'conditionId' => 6, // FG < 15
            'doseId' => 1
        ]);

        // Dose:2 | GENTAMICINA 160mg: PA 50-60 && FG < 15
        // PA 50-60
        ConditionsDose::create([
            'conditionId' => 2, // PA 50-60
            'doseId' => 2
        ]);

        // FG < 15
        ConditionsDose::create([
            'conditionId' => 6, // FG < 15
            'doseId' => 2
        ]);


        // Dose:3 | GENTAMICINA 240mg: PA 60-75 && FG < 15
        // PA 60-75
        ConditionsDose::create([
            'conditionId' => 3, // PA 60-75
            'doseId' => 3
        ]);

        // FG < 15
        ConditionsDose::Create([
            'conditionId' => 6,
            'doseId' => 3
        ]);

        // Dose:4 | GENTAMICINA 240mg: PA 75-90 && FG < 15
        // PA 75-90
        ConditionsDose::create([
            'conditionId' => 4, // PA 75-90
            'doseId' => 4
        ]);

        // FG < 15
        ConditionsDose::create([
            'conditionId' => 6,
            'doseId' => 4
        ]);

        // Dose:5 | GENTAMICINA 320mg: PA 90-110 && FG < 15
        // PA 90-110
        ConditionsDose::create([
            'conditionId' => 5,
            'doseId' => 5
        ]);

        // FG < 15
        ConditionsDose::create([
            'conditionId' => 6,
            'doseId' => 5
        ]);

        // Dose:6 | GENTAMICINA 240mg: PA < 50 && FG > 15
        // PA < 50
        ConditionsDose::create([
            'conditionId' => 1,
            'doseId' => 6
        ]);

        // FG > 15
        ConditionsDose::create([
            'conditionId' => 7,
            'doseId' => 6
        ]);

        // Dose:7 | GENTAMICINA 320mg: PA 50-60 && FG > 15
        // PA 50-60
        ConditionsDose::create([
            'conditionId' => 2, // PA 50-60
            'doseId' => 7
        ]);
        // FG > 15
        ConditionsDose::create([
            'conditionId' => 7,
            'doseId' => 7
        ]);

        // Dose:8 | GENTAMICINA 320mg: PA 60-75 && FG > 15
        // PA 60-75
        ConditionsDose::create([
            'conditionId' => 3, // PA 60-75
            'doseId' => 8
        ]);

        // FG > 15
        ConditionsDose::create([
            'conditionId' => 7,
            'doseId' => 8
        ]);

        // Dose:9 | GENTAMICINA 400mg: PA 75-90 && FG > 15
        // PA 75-90
        ConditionsDose::create([
            'conditionId' => 4, // PA 75-90
            'doseId' => 9
        ]);

        // FG > 15
        ConditionsDose::create([
            'conditionId' => 7,
            'doseId' => 9
        ]);

        // Dose:10 | GENTAMICINA 480mg: PA 90-110 && FG > 15
        // PA 90-110
        ConditionsDose::create([
            'conditionId' => 5, // PA 90-110
            'doseId' => 10
        ]);

        // FG > 15
        ConditionsDose::create([
            'conditionId' => 7,
            'doseId' => 10
        ]);
    }
}