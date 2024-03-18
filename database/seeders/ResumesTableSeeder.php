<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Resume;

class ResumesTableSeeder extends Seeder
{
    public function run(): void
    {
        // 1
        Resume::create([
            'resume' => '{{1}} 2g
            Si es compleix 1 d’aquests criteris, afegir {{7}} 3-5 mg/kg:
            Pacients ingressats a planta durant > 72h, ingrés UCI/UCO/trasllat altre hospital, CEC >
            120’, risc d’exposició a microbiota intestinal o amb factors de risc sobreafegits per infecció
            BGN e immune deprimits.
            - Si FG > 15: {{7}} 5 mg/kg en dosi única.
            - Si FG < 15: {{7}} 3 mg/Kg en dosi única.'
        ]);

        // 2
        Resume::create([
            'resume' => '{{4}} 15 mg/kg
            En cas de FG < 60 ml/min: {{10}} 800 mg ev .'
        ]);

        // 3
        Resume::create([
            'resume' => '{{1}} 2g + {{4}} 15 mg/kg
            En cas de FG < 60 ml/min: {{10}} 800 mg ev.
            Al·lèrgia Penicil·lina: {{4}} 15 mg/kg.'
        ]);

        // 4
        Resume::create([
            'resume' => '{{10}} 800 mg ev previ implant i posteriorment seguir amb dues dosis de 400
            mg/12h ev (total 3 dosis en 24 hores).
            +
            {{11}} 2g previ implant i posteriorment seguir amb dues dosis de 2g/8h (total 3
            dosis en 24h)..'
        ]);

        // 5
        Resume::create([
            'resume' => '{{1}} 2g + {{4}} 15 mg/kg
            Si accés via femoral cal cobrir flora genitourinària i digestiva (Enteroccoc faecalis i
            Enterobacteries).
            Es pot prolongar la profilaxi fins 24h post procediment segons indicacions metge prescriptor
            (habitualment 2 dosis post procediment).'
        ]);

        // 6
        Resume::create([
            'resume' => '{{4}} 15 mg/Kg + {{9}} 2g'
        ]);

        // 7
        Resume::create([
            'resume' => '{{7}} 3-5 mg/Kg'
        ]);

        // 8
        Resume::create([
            'resume' => '{{7}} 3-5 mg/kg + {{8}} 1g'
        ]);

        // 9
        Resume::create([
            'resume' => '{{12}} 3g vo o {{7}} 3-5 mg/Kg ev'
        ]);

        // 10
        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg'
        ]);

        // 11
        Resume::create([
            'resume' => '{{8}} 1g + {{7}} 3-5 mg/kg'
        ]);

        // 12
        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg'
        ]);

        // 13
        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg'
        ]);

        // 14
        Resume::create([
            'resume' => '{{13}} 160 mcg / 0,1 ml injecció intravítria'
        ]);

        // 15
        Resume::create([
            'resume' => '{{4}} 15 mg/kg'
        ]);

        // 16
        Resume::create([
            'resume' => '{{1}} 2g'
        ]);

        // 17
        Resume::create([
            'resume' => '{{5}} 900mg'
        ]);

        // 18
        Resume::create([
            'resume' => '{{1}} 2g + {{4}} 15 mg/kg'
        ]);

        // 19
        Resume::create([
            'resume' => '{{1}} 2g'
        ]);

        // 20
        Resume::create([
            'resume' => '{{5}} 900 mg'
        ]);

        // 21
        Resume::create([
            'resume' => 'Afegir {{4}} 15mg/kg (màxim 2 grams) al tractament amb {{1}}.
            Si al·lèrgia a penicil·lina: {{4}}.'
        ]);

        // 22
        Resume::create([
            'resume' => '{{6}} 2g'
        ]);

        // 23
        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 5 mg/kg'
        ]);

        // 24
        Resume::create([
            'resume' => '{{1}} 2g'
        ]);

        // 25
        Resume::create([
            'resume' => '{{5}} 900 mg'
        ]);

        // 26
        Resume::create([
            'resume' => '{{6}} 2g'
        ]);

        // 27
        Resume::create([
            'resume' => '{{5}} 900mg'
        ]);

        // 28
        Resume::create([
            'resume' => '{{1}} 2g'
        ]);

        // 29
        Resume::create([
            'resume' => '{{5}} 900mg'
        ]);

        // 30
        Resume::create([
            'resume' => '{{6}} 2g'
        ]);

        // 31
        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg'
        ]);

        // 32
        Resume::create([
            'resume' => '{{6}} 2g'
        ]);

        // 33
        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg'
        ]);

        // 34
        Resume::create([
            'resume' => '{{1}} 2g
             Si hi ha implantació de material protètic, prolongar la profilaxi fins 24 h post
            intervenció.'
        ]);

        // 35
        Resume::create([
            'resume' => '{{4}} 15 mg/kg
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.'
        ]);

        // 36
        Resume::create([
            'resume' => 'Si procediment amb col·locació de material protètic:
            {{1}} 2g + {{4}} 15 mg/Kg
            Si Al·lèrgia a Peni: {{4}}
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.'
        ]);

        // 37
        Resume::create([
            'resume' => '{{1}} 2g'
        ]);

        // 38
        Resume::create([
            'resume' => '{{5}} 900mg'
        ]);

        // 39
        Resume::create([
            'resume' => '{{1}} 2g + {{4}} 15 mg/kg
            Al·lèrgia a Penicil·lina: {{4}} 15 mg/kg'
        ]);

        // 40
        Resume::create([
            'resume' => '{{1}} 2g + {{7}} 3-5 mg/Kg'
        ]);

        // 41
        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg'
        ]);

        // 42
        Resume::create([
            'resume' => '{{1}} 2g'
        ]);

        // 43
        Resume::create([
            'resume' => '{{5}} 900 mg'
        ]);

        // 44
        Resume::create([
            'resume' => 'Afegir {{4}}. En cas que s’utilitzi {{5}}, no cal afegir {{4}}.'
        ]);

        // 45
        Resume::create([
            'resume' => 'Sense obstrucció: {{1}} 2g
            Amb obstrucció: {{6}} 2g'
        ]);

        // 46
        Resume::create([
            'resume' => 'Sense obstrucció.: {{5}} 900 mg + {{7}} *
            Si FG < 20: {{7}} 2 mg/Kg
            Amb obstrucció: {{7}} + {{8}} 1g'
        ]);

        // 47
        Resume::create([
            'resume' => '{{1}} 2g'
        ]);

        // 48
        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg'
        ]);

        // 49
        Resume::create([
            'resume' => '{{1}} 2g'
        ]);

        // 50
        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg'
        ]);

        // 51
        Resume::create([
            'resume' => '{{6}} 2g 
            En cas de lesió víscera buida, es pot prolongar profilaxi 24h.'
        ]);

        // 52
        Resume::create([
            'resume' => '{{8}} 1g + {{7}} 3-5 mg/Kg'
        ]);

        // 53
        Resume::create([
            'resume' => '{{6}} 2g'
        ]);

        // 54
        Resume::create([
            'resume' => '{{8}} 1g + {{7}} 3-5 mg/Kg'
        ]);
        
        // 55
        Resume::create([
            'resume' => 'Previ a la cirurgia cal tractament amb {{14}} 400 mg/12h oral +/- {{15}} 50
            mg/Kg/dia oral des de 2-4 setm abans del procediment i fins 1-3 mesos després.
            {{1}} 2g'
        ]);

        // 56
        Resume::create([
            'resume' => '{{5}} 900 + {{7}} 3-5 mg/kg
            A part de la profilaxi, es recomana una bona antisèpsia del lloc d’implantació.'
        ]);

        // 57
        Resume::create([
            'resume' => '{{4}} 15 mg/Kg + {{7}} 3-5 mg/Kg'
        ]);
    }
}
