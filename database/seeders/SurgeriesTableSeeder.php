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
            'name' => 'CARDÍACA',
            'color' => '#FF0000' // Rojo
        ]);
        
        Surgery::create([
            'name' => 'UROLÒGICA',
            'color' => '#FFA500' // Naranja
        ]);
        
        Surgery::create([
            'name' => 'GINECOLOGICA',
            'color' => '#FFFF00' // Amarillo
        ]);
        
        Surgery::create([
            'name' => 'OFTALMOLOGICA',
            'color' => '#008000' // Verde
        ]);
        
        Surgery::create([
            'name' => 'PLASTICA I DERMATOLOGICA',
            'color' => '#0000FF' // Azul
        ]);
        
        Surgery::create([
            'name' => 'MAMA',
            'color' => '#4B0082' // Violeta
        ]);
        
        Surgery::create([
            'name' => 'NEUROCIRURGIA',
            'color' => '#9400D3' // Púrpura
        ]);
        
        Surgery::create([
            'name' => 'MÀXILO-FACIAL',
            'color' => '#FF1493' // Rosa
        ]);
        
        Surgery::create([
            'name' => 'ORL',
            'color' => '#FF4500' // Naranja rojizo
        ]);
        
        Surgery::create([
            'name' => 'TORÀCICA',
            'color' => '#00FFFF' // Cian
        ]);
        
        Surgery::create([
            'name' => 'VASCULAR',
            'color' => '#008080' // Verde azulado
        ]);
        
        Surgery::create([
            'name' => 'ORTOPÈDICA I TRAUMATOLÒGICA',
            'color' => '#800080' // Morado
        ]);
        
        Surgery::create([
            'name' => 'GASTROINTESTINAL',
            'color' => '#FFD700' // Dorado
        ]);
        
        Surgery::create([
            'name' => 'ESOFÀGICA, GÀSTRICA, DUODENAL SENSE OBSTRUCCIÓ',
            'color' => '#00FF00' // Lima
        ]);
        
        Surgery::create([
            'name' => 'DUODENAL AMB OBSTRUCCIÓ',
            'color' => '#800000' // Borgoña
        ]);
        
        Surgery::create([
            'name' => 'HEPATO BILIAR PANCREATICA',
            'color' => '#800000' // Borgoña
        ]);
        
        Surgery::create([
            'name' => 'COLO RECTAL',
            'color' => '#808000' // Oliva
        ]);
        
        Surgery::create([
            'name' => 'PROCTOLÒGICA NO COMPLEXA',
            'color' => '#808000' // Oliva
        ]);
        
        Surgery::create([
            'name' => 'ENDOSCOPIES',
            'color' => '#008080' // Verde azulado
        ]);
        
        Surgery::create([
            'name' => 'RADIOLOGIA INTERVENCIONISTA',
            'color' => '#9400D3' // Púrpura
        ]);
        
    }
}
