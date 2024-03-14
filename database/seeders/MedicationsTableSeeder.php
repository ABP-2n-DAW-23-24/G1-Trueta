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

        // 10
        Medication::create([
            'name' => 'TEICOPLANINA'
        ]);

        // 11
        Medication::create([
            'name' => 'CEFTAZIDIMA'
        ]);

        // 12
        Medication::create([
            'name' => 'FOSFOMICINA TROMETAMOL'
        ]);

        // 13
        Medication::create([
            'name' => 'MOXIFLOXACINO'
        ]);

        
        // 14
        Medication::create([
            'name' => 'ALBENDAZOL'
        ]);

        // 15
        Medication::create([
            'name' => 'PRAZIQUANTEL'
        ]);

        // 16
        Medication::create([
            'name' => 'NEOMICINA'
        ]);
    }
}
