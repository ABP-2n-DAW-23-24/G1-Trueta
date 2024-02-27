<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Surgery;


class SurgeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Surgery::create([
            'name' => 'CARDÍACA'
        ]);

        Surgery::create([
            'name' => 'UROLÒGICA'
        ]);

        Surgery::create([
            'name' => 'GINECOLOGICA'
        ]);

        Surgery::create([
            'name' => 'OFTALMOLOGICA'
        ]);

        Surgery::create([
            'name' => 'PLASTICA I DERMATOLOGICA'
        ]);

        Surgery::create([
            'name' => 'MAMA'
        ]);

        Surgery::create([
            'name' => 'NEUROCIRURGIA'
        ]);

        Surgery::create([
            'name' => 'MÀXILO-FACIAL'
        ]);

        Surgery::create([
            'name' => 'ORL'
        ]);

        Surgery::create([
            'name' => 'TORÀCICA'
        ]);

        Surgery::create([
            'name' => 'VASCULAR'
        ]);

        Surgery::create([
            'name' => 'ORTOPÈDICA I TRAUMATOLÒGICA'
        ]);

        Surgery::create([
            'name' => 'GASTROINTESTINAL'
        ]);

        Surgery::create([
            'name' => 'ESOFÀGICA,GÀSTRICA,DUODENAL SENSE OBSTRUCCIÓ'
        ]);

        Surgery::create([
            'name' => 'DUODENAL AMB OBSTRUCCIÓ'
        ]);

        Surgery::create([
            'name' => 'HEPATO BILIAR PANCREATICA'
        ]);

        Surgery::create([
            'name' => 'COLO RECTAL'
        ]);

        Surgery::create([
            'name' => 'PROCTOLÒGICA NO COMPLEXA'
        ]);

        
        Surgery::create([
            'name' => 'ENDOSCOPIES'
        ]);
        
        Surgery::create([
            'name' => 'RADIOLOGIA INTERVENCIONISTA'
        ]);
    }
}
