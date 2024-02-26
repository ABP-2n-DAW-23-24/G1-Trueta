<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dose;


class DosesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // PA = Pes ajustat
        // PR = Pes real
        // FG = Filtratge glomerular

        // 1 | GENTAMICINA 160mg: PA < 50 && FG < 15
        Dose::create([
            'dose' => '160mg',
            'medicationId' => 7 // GENTAMICINA
        ]);

        // 2 | GENTAMICINA 160mg: PA 50-60 && FG < 15
        Dose::create([
            'dose' => '160mg',
            'medicationId' => 7 // GENTAMICINA
        ]);

        // 3 | GENTAMICINA 240mg: PA 60-75 && FG < 15
        Dose::create([
            'dose' => '240mg',
            'medicationId' => 7 // GENTAMICINA
        ]);

        // 4 | GENTAMICINA 240mg: PA 75-90 && FG < 15
        Dose::create([
            'dose' => '240mg',
            'medicationId' => 7 // GENTAMICINA
        ]);

        // 5 | GENTAMICINA 320mg: PA 90-110 && FG < 15
        Dose::create([
            'dose' => '320mg',
            'medicationId' => 7 // GENTAMICINA
        ]);

        // 6 | GENTAMICINA 240mg: PA < 50 && FG > 15
        Dose::create([
            'dose' => '240mg',
            'medicationId' => 7 // GENTAMICINA
        ]);

        // 7 | GENTAMICINA 320mg: PA 50-60 && FG > 15
        Dose::create([
            'dose' => '320mg',
            'medicationId' => 7 // GENTAMICINA
        ]);

        // 8 | GENTAMICINA 320mg: PA 60-75 && FG > 15
        Dose::create([
            'dose' => '320mg',
            'medicationId' => 7 // GENTAMICINA
        ]);

        // 9 | GENTAMICINA 400mg: PA 75-90 && FG > 15
        Dose::create([
            'dose' => '400mg',
            'medicationId' => 7 // GENTAMICINA
        ]);

        // 10 | GENTAMICINA 480mg: PA 90-110 && FG > 15
        Dose::create([
            'dose' => '480mg',
            'medicationId' => 7 // GENTAMICINA
        ]);
    }
}
