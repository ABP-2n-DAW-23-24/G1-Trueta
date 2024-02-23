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
        Medication::create([
            'name' => 'CEFAZOLINA'
        ]);

        Medication::create([
            'name' => 'CEFUROXIMA'
        ]);

        Medication::create([
            'name' => 'CEFTRIAXONA'
        ]);

        Medication::create([
            'name' => 'VANCOMICINA'
        ]);

        Medication::create([
            'name' => 'CLINDAMICINA'
        ]);

        Medication::create([
            'name' => 'AMOXICIL·LINA CLAVULÀNIC'
        ]);

        Medication::create([
            'name' => 'GENTAMICINA'
        ]);

        Medication::create([
            'name' => 'METRONIDAZOL'
        ]);

        Medication::create([
            'name' => 'AZTREONAM'
        ]);
    }
}
