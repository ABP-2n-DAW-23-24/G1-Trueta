<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medication;

class MedicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // 1
        Medication::create([
            'name' => 'CEFAZOLINA'
        ]);

        // 2
        Medication::create([
            'name' => 'CEFUROXIMA'
        ]);

        // 3
        Medication::create([
            'name' => 'CEFTRIAXONA'
        ]);

        // 4
        Medication::create([
            'name' => 'VANCOMICINA'
        ]);

        // 5
        Medication::create([
            'name' => 'CLINDAMICINA'
        ]);

        // 6
        Medication::create([
            'name' => 'AMOXICIL·LINA CLAVULÀNIC'
        ]);

        // 7
        Medication::create([
            'name' => 'GENTAMICINA'
        ]);

        // 8
        Medication::create([
            'name' => 'METRONIDAZOL'
        ]);

        // 9
        Medication::create([
            'name' => 'AZTREONAM'
        ]);
    }
}
