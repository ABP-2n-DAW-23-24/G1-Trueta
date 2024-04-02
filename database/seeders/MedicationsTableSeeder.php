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
            'name' => 'CEFAZOLINA',
            'deleted' => 'false'
        ]);

        // 2
        Medication::create([
            'name' => 'CEFUROXIMA',
            'deleted' => 'false'
        ]);

        // 3
        Medication::create([
            'name' => 'CEFTRIAXONA',
            'deleted' => 'false'
        ]);

        // 4
        Medication::create([
            'name' => 'VANCOMICINA',
            'deleted' => 'false'
        ]);

        // 5
        Medication::create([
            'name' => 'CLINDAMICINA',
            'deleted' => 'false'
        ]);

        // 6
        Medication::create([
            'name' => 'AMOXICIL·LINA CLAVULÀNIC',
            'deleted' => 'false'
        ]);

        // 7
        Medication::create([
            'name' => 'GENTAMICINA',
            'deleted' => 'false'
        ]);

        // 8
        Medication::create([
            'name' => 'METRONIDAZOL',
            'deleted' => 'false'
        ]);

        // 9
        Medication::create([
            'name' => 'AZTREONAM',
            'deleted' => 'false'
        ]);

        // 10
        Medication::create([
            'name' => 'TEICOPLANINA',
            'deleted' => 'false'
        ]);

        // 11
        Medication::create([
            'name' => 'CEFTAZIDIMA',
            'deleted' => 'false'
        ]);

        // 12
        Medication::create([
            'name' => 'FOSFOMICINA TROMETAMOL',
            'deleted' => 'false'
        ]);

        // 13
        Medication::create([
            'name' => 'MOXIFLOXACINO',
            'deleted' => 'false'
        ]);

        
        // 14
        Medication::create([
            'name' => 'ALBENDAZOL',
            'deleted' => 'false'
        ]);

        // 15
        Medication::create([
            'name' => 'PRAZIQUANTEL',
            'deleted' => 'false'
        ]);

        // 16
        Medication::create([
            'name' => 'NEOMICINA',
            'deleted' => 'false'
        ]);

        // 17
        Medication::create([
            'name' => 'DOXICICLINA',
            'deleted' => 'false'
        ]);

        // 18
        Medication::create([
            'name' => 'CEFOXITINA',
            'deleted' => 'false'
        ]);

        // 19
        Medication::create([
            'name' => 'CIPROFLOXACI',
            'deleted' => 'false'
        ]);

        // 20
        Medication::create([
            'name' => 'PIPERACIL.LINA-TAZOBACTAM',
            'deleted' => 'false'
        ]);
    }
}