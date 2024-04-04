<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Resume;

class ResumesTableSeeder extends Seeder
{
    public function run(): void
    {
        Resume::create([
            'resume' => '{{1}} 2g
            Si es compleix 1 d’aquests criteris, afegir {{7}} 3-5 mg/kg:
            Pacients ingressats a planta durant > 72h, ingrés UCI/UCO/trasllat altre hospital, CEC >
            120’, risc d’exposició a microbiota intestinal o amb factors de risc sobreafegits per infecció
            BGN e immune deprimits.
            - Si FG > 15: {{7}} 5 mg/kg en dosi única.
            - Si FG < 15: {{7}} 3 mg/Kg en dosi única.',
            'questionId' => 1,
            'operationId' => 1,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g
            Si es compleix 1 d’aquests criteris, afegir {{7}} 3-5 mg/kg:
            Pacients ingressats a planta durant > 72h, ingrés UCI/UCO/trasllat altre hospital, CEC >
            120’, risc d’exposició a microbiota intestinal o amb factors de risc sobreafegits per infecció
            BGN e immune deprimits.
            - Si FG > 15: {{7}} 5 mg/kg en dosi única.
            - Si FG < 15: {{7}} 3 mg/Kg en dosi única.',
            'questionId' => 1,
            'operationId' => 2,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g
            Si es compleix 1 d’aquests criteris, afegir {{7}} 3-5 mg/kg:
            Pacients ingressats a planta durant > 72h, ingrés UCI/UCO/trasllat altre hospital, CEC >
            120’, risc d’exposició a microbiota intestinal o amb factors de risc sobreafegits per infecció
            BGN e immune deprimits.
            - Si FG > 15: {{7}} 5 mg/kg en dosi única.
            - Si FG < 15: {{7}} 3 mg/Kg en dosi única.',
            'questionId' => 1,
            'operationId' => 3,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/kg
            En cas de FG < 60 ml/min: {{10}} 800 mg ev .',
            'questionId' => 2,
            'operationId' => 1,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/kg
            En cas de FG < 60 ml/min: {{10}} 800 mg ev .',
            'questionId' => 2,
            'operationId' => 2,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/kg
            En cas de FG < 60 ml/min: {{10}} 800 mg ev .',
            'questionId' => 2,
            'operationId' => 3,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g + {{4}} 15 mg/kg
            En cas de FG < 60 ml/min: {{10}} 800 mg ev.
            Al·lèrgia Penicil·lina: {{4}} 15 mg/kg.',
            'questionId' => 3,
            'operationId' => 1,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g + {{4}} 15 mg/kg
            En cas de FG < 60 ml/min: {{10}} 800 mg ev.
            Al·lèrgia Penicil·lina: {{4}} 15 mg/kg.',
            'questionId' => 3,
            'operationId' => 2,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g + {{4}} 15 mg/kg
            En cas de FG < 60 ml/min: {{10}} 800 mg ev.
            Al·lèrgia Penicil·lina: {{4}} 15 mg/kg.',
            'questionId' => 3,
            'operationId' => 3,
        ]);

        Resume::create([
            'resume' => '{{10}} 800 mg ev previ implant i posteriorment seguir amb dues dosis de 400
            mg/12h ev (total 3 dosis en 24 hores).
            +
            {{11}} 2g previ implant i posteriorment seguir amb dues dosis de 2g/8h (total 3
            dosis en 24h)..',
            'questionId' => 1,
            'operationId' => 4,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g + {{4}} 15 mg/kg
            Si accés via femoral cal cobrir flora genitourinària i digestiva (Enteroccoc faecalis i
            Enterobacteries).
            Es pot prolongar la profilaxi fins 24h post procediment segons indicacions metge prescriptor
            (habitualment 2 dosis post procediment).',
            'questionId' => 1,
            'operationId' => 5,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g + {{4}} 15 mg/kg
            Si accés via femoral cal cobrir flora genitourinària i digestiva (Enteroccoc faecalis i
            Enterobacteries).
            Es pot prolongar la profilaxi fins 24h post procediment segons indicacions metge prescriptor
            (habitualment 2 dosis post procediment).',
            'questionId' => 1,
            'operationId' => 6,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/Kg + {{9}} 2g',
            'questionId' => 2,
            'operationId' => 5,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/Kg + {{9}} 2g',
            'questionId' => 2,
            'operationId' => 6,
        ]);

        Resume::create([
            'resume' => '{{2}} 1,5 g',
            'questionId' => 1,
            'operationId' => 7,
        ]);

        Resume::create([
            'resume' => '{{7}} 3-5 mg/Kg',
            'questionId' => 2,
            'operationId' => 7,
        ]);

        Resume::create([
            'resume' => '{{2}} 1,5 g + {{8}} 1g ev',
            'questionId' => 1,
            'operationId' => 8,
        ]);

        Resume::create([
            'resume' => '{{7}} 3-5 mg/kg + {{8}} 1g',
            'questionId' => 2,
            'operationId' => 8,
        ]);

        Resume::create([
            'resume' => '{{7}} 3-5 mg/kg + {{4}} 15 mg/Kg',
            'questionId' => 1,
            'operationId' => 9,
        ]);

        Resume::create([
            'resume' => '{{12}} 3g vo , entre 1-3 h abans del procediment o {{2}} 1,5 g ev',
            'questionId' => 1,
            'operationId' => 10,
        ]);

        Resume::create([
            'resume' => '{{12}} 3g vo o {{7}} 3-5 mg/Kg ev',
            'questionId' => 2,
            'operationId' => 10,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g
            * En cas de cesària associada a febre intrapart, corioamnionitis o ruptura prematura de
            membranes, consultar els protocols específics de tractament.',
            'questionId' => 1,
            'operationId' => 17,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg',
            'questionId' => 2,
            'operationId' => 17,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g
            * En cas de cesària associada a febre intrapart, corioamnionitis o ruptura prematura de
            membranes, consultar els protocols específics de tractament.',
            'questionId' => 1,
            'operationId' => 18,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg',
            'questionId' => 2,
            'operationId' => 18,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g
            * En cas de cesària associada a febre intrapart, corioamnionitis o ruptura prematura de
            membranes, consultar els protocols específics de tractament.',
            'questionId' => 1,
            'operationId' => 19,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg',
            'questionId' => 2,
            'operationId' => 19,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g
            * En cas de cesària associada a febre intrapart, corioamnionitis o ruptura prematura de
            membranes, consultar els protocols específics de tractament.',
            'questionId' => 1,
            'operationId' => 20,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg',
            'questionId' => 2,
            'operationId' => 20,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g
            * En cas de cesària associada a febre intrapart, corioamnionitis o ruptura prematura de
            membranes, consultar els protocols específics de tractament.',
            'questionId' => 1,
            'operationId' => 21,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg',
            'questionId' => 2,
            'operationId' => 21,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g
            * En cas de cesària associada a febre intrapart, corioamnionitis o ruptura prematura de
            membranes, consultar els protocols específics de tractament.',
            'questionId' => 1,
            'operationId' => 22,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg',
            'questionId' => 2,
            'operationId' => 22,
        ]);

        Resume::create([
            'resume' => '{{3}} 2g + {{8}} 1g
            . A la cirurgia programada es recomana la preparació mecànica del colon (Fosfoevac o
            Pleinvue) associada a antibiòtics via oral amb {{16}} 1g + {{8}} 500 mg, 3
            dosis preoperatòries 19, 18 i 9 h abans de l’inici de la cirurgia (és a dir, a les 13h, 14h i
            23h del dia anterior a la cirurgia).
            -Aquesta pauta es mantindrà durant 5 dies.',
            'questionId' => 1,
            'operationId' => 23,
        ]);

        Resume::create([
            'resume' => '{{8}} 1g + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 23,
        ]);

        Resume::create([
            'resume' => '{{3}} 2g + {{8}} 1g
            . A la cirurgia programada es recomana la preparació mecànica del colon (Fosfoevac o
            Pleinvue) associada a antibiòtics via oral amb {{16}} 1g + {{8}} 500 mg, 3
            dosis preoperatòries 19, 18 i 9 h abans de l’inici de la cirurgia (és a dir, a les 13h, 14h i
            23h del dia anterior a la cirurgia).
            -Aquesta pauta es mantindrà durant 5 dies.',
            'questionId' => 1,
            'operationId' => 24,
        ]);

        Resume::create([
            'resume' => '{{8}} 1g + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 24,
        ]);

        Resume::create([
            'resume' => '{{17}} 200 mg vo 2h abans del procediment o 200 mg ev (ha d’haver finalitzat
            dins els 60 min previs a la incisió), a passar en 2 hores.
            Si per situació clínica emergent, no és possible complir en temps, utilitzar la pauta
            d’al.lergics a Penicil.lina.',
            'questionId' => 1,
            'operationId' => 25,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 25,
        ]);

        Resume::create([
            'resume' => '{{17}} 200 mg vo 2h abans del procediment o 200 mg ev (ha d’haver finalitzat
            dins els 60 min previs a la incisió), a passar en 2 hores.
            Si per situació clínica emergent, no és possible complir en temps, utilitzar la pauta
            d’al.lergics a Penicil.lina.',
            'questionId' => 1,
            'operationId' => 26,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 26,
        ]);

        Resume::create([
            'resume' => '{{18}} 1g',
            'questionId' => 1,
            'operationId' => 27,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 27,
        ]);

        Resume::create([
            'resume' => 'Es recomana l’administració intracameral de {{2}} 1 mg/0,1 ml',
            'questionId' => 1,
            'operationId' => 28,
        ]);

        Resume::create([
            'resume' => '{{13}} 160 mcg / 0,1 ml injecció intravítria',
            'questionId' => 2,
            'operationId' => 28,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 29,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/kg',
            'questionId' => 2,
            'operationId' => 29,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg
            {{13}} 160 mcg / 0,1 ml administració intravítria',
            'questionId' => 1,
            'operationId' => 30,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 31,
        ]);

        Resume::create([
            'resume' => '{{5}} 900mg',
            'questionId' => 2,
            'operationId' => 31,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g + {{4}} 15 mg/kg',
            'questionId' => 3,
            'operationId' => 31,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 32,
        ]);

        Resume::create([
            'resume' => '{{5}} 900mg',
            'questionId' => 2,
            'operationId' => 32,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g + {{4}} 15 mg/kg',
            'questionId' => 3,
            'operationId' => 32,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 33,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg',
            'questionId' => 2,
            'operationId' => 33,
        ]);

        Resume::create([
            'resume' => 'Afegir {{4}} 15mg/kg (màxim 2 grams) al tractament amb {{1}}.
            Si al·lèrgia a penicil·lina: {{4}}.',
            'questionId' => 3,
            'operationId' => 33,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 34,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg',
            'questionId' => 2,
            'operationId' => 34,
        ]);

        Resume::create([
            'resume' => 'Afegir {{4}} 15mg/kg (màxim 2 grams) al tractament amb {{1}}.
            Si al·lèrgia a penicil·lina: {{4}}.',
            'questionId' => 3,
            'operationId' => 34,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 35,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg',
            'questionId' => 2,
            'operationId' => 35,
        ]);

        Resume::create([
            'resume' => 'Afegir {{4}} 15mg/kg (màxim 2 grams) al tractament amb {{1}}.
            Si al·lèrgia a penicil·lina: {{4}}.',
            'questionId' => 3,
            'operationId' => 35,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 36,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg',
            'questionId' => 2,
            'operationId' => 36,
        ]);

        Resume::create([
            'resume' => 'Afegir {{4}} 15mg/kg (màxim 2 grams) al tractament amb {{1}}.
            Si al·lèrgia a penicil·lina: {{4}}.',
            'questionId' => 3,
            'operationId' => 36,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 37,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg',
            'questionId' => 2,
            'operationId' => 37,
        ]);

        Resume::create([
            'resume' => 'Afegir {{4}} 15mg/kg (màxim 2 grams) al tractament amb {{1}}.
            Si al·lèrgia a penicil·lina: {{4}}.',
            'questionId' => 3,
            'operationId' => 37,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 38,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 5 mg/kg',
            'questionId' => 2,
            'operationId' => 38,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 39,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg',
            'questionId' => 2,
            'operationId' => 39,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 40,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg',
            'questionId' => 2,
            'operationId' => 40,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 41,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg',
            'questionId' => 2,
            'operationId' => 41,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 42,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg',
            'questionId' => 2,
            'operationId' => 42,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 43,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg',
            'questionId' => 2,
            'operationId' => 43,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 44,
        ]);

        Resume::create([
            'resume' => '{{5}} 900mg',
            'questionId' => 2,
            'operationId' => 44,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 45,
        ]);

        Resume::create([
            'resume' => '{{5}} 900mg',
            'questionId' => 2,
            'operationId' => 45,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 46,
        ]);

        Resume::create([
            'resume' => '{{5}} 900mg',
            'questionId' => 2,
            'operationId' => 46,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 47,
        ]);

        Resume::create([
            'resume' => '{{5}} 900mg',
            'questionId' => 2,
            'operationId' => 47,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 48,
        ]);

        Resume::create([
            'resume' => '{{5}} 900mg',
            'questionId' => 2,
            'operationId' => 48,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 49,
        ]);

        Resume::create([
            'resume' => '{{5}} 900mg
            Es recomana l’aplicació tòpica d’antibiòtic després de timpanoplàstia.',
            'questionId' => 2,
            'operationId' => 49,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 50,
        ]);

        Resume::create([
            'resume' => '{{5}} 900mg
            Es recomana l’aplicació tòpica d’antibiòtic després de timpanoplàstia.',
            'questionId' => 2,
            'operationId' => 50,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 51,
        ]);

        Resume::create([
            'resume' => '{{5}} 900mg
            Es recomana l’aplicació tòpica d’antibiòtic després de timpanoplàstia.',
            'questionId' => 2,
            'operationId' => 51,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 52,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 52,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 53,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 53,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 54,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 54,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 55,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 55,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 56,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 56,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 57,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 57,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 58,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 58,
        ]);

                Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 59,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 59,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 60,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 60,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 61,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 61,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 62,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 62,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 63,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 63,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 64,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 64,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g
             Si hi ha implantació de material protètic, prolongar la profilaxi fins 24 h post
            intervenció.',
            'questionId' => 1,
            'operationId' => 65,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/kg
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.',
            'questionId' => 2,
            'operationId' => 65,
        ]);

        Resume::create([
            'resume' => 'Si procediment amb col·locació de material protètic:
            {{1}} 2g + {{4}} 15 mg/Kg
            Si Al·lèrgia a Peni: {{4}}
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.',
            'questionId' => 3,
            'operationId' => 65,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g
             Si hi ha implantació de material protètic, prolongar la profilaxi fins 24 h post
            intervenció.',
            'questionId' => 1,
            'operationId' => 66,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/kg
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.',
            'questionId' => 2,
            'operationId' => 66,
        ]);

        Resume::create([
            'resume' => 'Si procediment amb col·locació de material protètic:
            {{1}} 2g + {{4}} 15 mg/Kg
            Si Al·lèrgia a Peni: {{4}}
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.',
            'questionId' => 3,
            'operationId' => 66,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g
             Si hi ha implantació de material protètic, prolongar la profilaxi fins 24 h post
            intervenció.',
            'questionId' => 1,
            'operationId' => 67,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/kg
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.',
            'questionId' => 2,
            'operationId' => 67,
        ]);

        Resume::create([
            'resume' => 'Si procediment amb col·locació de material protètic:
            {{1}} 2g + {{4}} 15 mg/Kg
            Si Al·lèrgia a Peni: {{4}}
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.',
            'questionId' => 3,
            'operationId' => 67,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g
             Si hi ha implantació de material protètic, prolongar la profilaxi fins 24 h post
            intervenció.',
            'questionId' => 1,
            'operationId' => 68,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/kg
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.',
            'questionId' => 2,
            'operationId' => 68,
        ]);

        Resume::create([
            'resume' => 'Si procediment amb col·locació de material protètic:
            {{1}} 2g + {{4}} 15 mg/Kg
            Si Al·lèrgia a Peni: {{4}}
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.',
            'questionId' => 3,
            'operationId' => 68,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 69,
        ]);

        Resume::create([
            'resume' => '{{5}} 900mg',
            'questionId' => 2,
            'operationId' => 69,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g + {{4}} 15 mg/kg
            Al·lèrgia a Penicil·lina: {{4}} 15 mg/kg',
            'questionId' => 3,
            'operationId' => 69,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 70,
        ]);

        Resume::create([
            'resume' => '{{5}} 900mg',
            'questionId' => 2,
            'operationId' => 70,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g + {{4}} 15 mg/kg
            Al·lèrgia a Penicil·lina: {{4}} 15 mg/kg',
            'questionId' => 3,
            'operationId' => 70,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 71,
        ]);

        Resume::create([
            'resume' => '{{5}} 900mg',
            'questionId' => 2,
            'operationId' => 71,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g + {{4}} 15 mg/kg
            Al·lèrgia a Penicil·lina: {{4}} 15 mg/kg',
            'questionId' => 3,
            'operationId' => 71,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 72,
        ]);

        Resume::create([
            'resume' => '{{5}} 900mg',
            'questionId' => 2,
            'operationId' => 72,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g + {{4}} 15 mg/kg
            Al·lèrgia a Penicil·lina: {{4}} 15 mg/kg',
            'questionId' => 3,
            'operationId' => 72,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 73,
        ]);

        Resume::create([
            'resume' => '{{5}} 900mg',
            'questionId' => 2,
            'operationId' => 73,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g + {{4}} 15 mg/kg
            Al·lèrgia a Penicil·lina: {{4}} 15 mg/kg',
            'questionId' => 3,
            'operationId' => 73,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 74,
        ]);

        Resume::create([
            'resume' => '{{5}} 900mg',
            'questionId' => 2,
            'operationId' => 74,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g + {{4}} 15 mg/kg
            Al·lèrgia a Penicil·lina: {{4}} 15 mg/kg',
            'questionId' => 3,
            'operationId' => 74,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g + {{7}} 3-5 mg/Kg',
            'questionId' => 1,
            'operationId' => 75,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg',
            'questionId' => 2,
            'operationId' => 75,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 78,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg',
            'questionId' => 2,
            'operationId' => 78,
        ]);

        Resume::create([
            'resume' => 'Afegir {{4}}. En cas que s’utilitzi {{5}}, no cal afegir {{4}}.',
            'questionId' => 3,
            'operationId' => 78,
        ]);

        Resume::create([
            'resume' => 'Sense obstrucció: {{1}} 2g
            Amb obstrucció: {{6}} 2g',
            'questionId' => 1,
            'operationId' => 79,
        ]);

        Resume::create([
            'resume' => 'Sense obstrucció.: {{5}} 900 mg + {{7}} *
            Si FG < 20: {{7}} 2 mg/Kg
            Amb obstrucció: {{7}} + {{8}} 1g',
            'questionId' => 2,
            'operationId' => 79,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 80,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 80,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 81,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 81,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 82,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 82,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 83,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 83,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g 
            En cas de lesió víscera buida, es pot prolongar profilaxi 24h.',
            'questionId' => 1,
            'operationId' => 84,
        ]);

        Resume::create([
            'resume' => '{{8}} 1g + {{7}} 3-5 mg/Kg',
            'questionId' => 2,
            'operationId' => 84,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 85,
        ]);

        Resume::create([
            'resume' => '{{8}} 1g + {{7}} 3-5 mg/Kg',
            'questionId' => 2,
            'operationId' => 85,
        ]);
        
        Resume::create([
            'resume' => 'Previ a la cirurgia cal tractament amb {{14}} 400 mg/12h oral +/- {{15}} 50
            mg/Kg/dia oral des de 2-4 setm abans del procediment i fins 1-3 mesos després.
            {{1}} 2g',
            'questionId' => 1,
            'operationId' => 89,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 90,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 + {{7}} 3-5 mg/kg
            A part de la profilaxi, es recomana una bona antisèpsia del lloc d’implantació.',
            'questionId' => 2,
            'operationId' => 90,
        ]);

        Resume::create([
            'resume' => '{{19}} 400 mg ev',
            'questionId' => 1,
            'operationId' => 91,
        ]);

        Resume::create([
            'resume' => '{{19}} 400 mg ev',
            'questionId' => 1,
            'operationId' => 92,
        ]);

        Resume::create([
            'resume' => '{{20}} 4g ev dins els 60 min previs al procediment',
            'questionId' => 1,
            'operationId' => 93,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/Kg + {{7}} 3-5 mg/Kg',
            'questionId' => 2,
            'operationId' => 93,
        ]);

        Resume::create([
            'resume' => 'SI<3 SEGMENTS: No precisa profilaxi
            SI>3 SEGMENTS: {{6}} (Si
            cultius previs de bilis, ajustar segons
            antibiograma)',
            'questionId' => 1,
            'operationId' => 86,
        ]);

        Resume::create([
            'resume' => 'SI<3 SEGMENTS: No precisa profilaxi
            SI>3SEGMENTS: {{4}} + {{7}}',
            'questionId' => 2,
            'operationId' => 86,
        ]);

        Resume::create([
            'resume' => 'Baix Risc: No precisa profilaxi
            Alt Risc o cirurgia oberta: {{1}}
            “Alt risc” (1 o més): pacient intervingut
            d’urgència, DM, ASA>3, inmunodepressió,
            embaràs, Edat>70a, episodi de còlic biliar
            30 dies abans de la IQ, colangitis,
            icterícia, coledocolitiasi, IQ prèvia biliar,
            colecistitis aguda en els últims 6 mesos,
            pancreatitis alitiàsica i pròtesis a via biliar i
            ATB en l’últim mes.',
            'questionId' => 1,
            'operationId' => 87,
        ]);

        Resume::create([
            'resume' => '{{4}} + {{7}}',
            'questionId' => 2,
            'operationId' => 87,
        ]);

        Resume::create([
            'resume' => 'No manipulació via biliar: {{6}}
            Manipulació via biliar:
            -Si cultius bilis previs ajustar segons
            antibiograma.
            -Si NO tenim informació prèvia:
            {{20}}',
            'questionId' => 1,
            'operationId' => 88,
        ]);

        Resume::create([
            'resume' => '{{4}} + {{7}}',
            'questionId' => 2,
            'operationId' => 88,
        ]);

        Resume::create([
            'resume' => '{{12}} 3g vo 1 - 3 h abans',
            'questionId' => 1,
            'operationId' => 95,
        ]);

        Resume::create([
            'resume' => '{{12}} 3 g',
            'questionId' => 2,
            'operationId' => 95,
        ]);

        Resume::create([
            'resume' => '{{12}} 3g vo
            la nit abans
            {{3}} 2 g ev
            30 min abans',
            'questionId' => 1,
            'operationId' => 96,
        ]);

        Resume::create([
            'resume' => '{{7}} 3-5 mg/Kg',
            'questionId' => 2,
            'operationId' => 96,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 97,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/kg ev o
            {{10}} 800 mg si FG< 60ml/dia',
            'questionId' => 2,
            'operationId' => 97,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 101,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/kg ev o
            {{10}} 800 mg si FG< 60ml/dia',
            'questionId' => 2,
            'operationId' => 101,
        ]);

        Resume::create([
            'resume' => '{{2}} 1,5g ev + {{8}} 1 g ev',
            'questionId' => 1,
            'operationId' => 104,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/kg ev o 
            {{10}} 800 mg sFG< 60ml/dia + 
            {{8}} 1g ev',
            'questionId' => 2,
            'operationId' => 104,
        ]);

        Resume::create([
            'resume' => '{{2}} 1,5g ev + {{8}} 1 g ev',
            'questionId' => 1,
            'operationId' => 105,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/kg ev o 
            {{10}} 800 mg sFG< 60ml/dia + 
            {{8}} 1g ev',
            'questionId' => 2,
            'operationId' => 105,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g + {{8}} 1g',
            'questionId' => 1,
            'operationId' => 106,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/kg ev o 
            {{10}} 800 mg sFG< 60ml/dia + 
            {{8}} 1g ev',
            'questionId' => 2,
            'operationId' => 106,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 107,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/kg ev o
            {{10}} 800 mg si FG< 60ml/dia',
            'questionId' => 2,
            'operationId' => 107,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g',
            'questionId' => 1,
            'operationId' => 108,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/kg ev o
            {{10}} 800 mg si FG< 60ml/dia',
            'questionId' => 2,
            'operationId' => 108,
        ]);

        Resume::create([
            'resume' => '{{20}} 4g ev',
            'questionId' => 1,
            'operationId' => 109,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/Kg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 109,
        ]);

        Resume::create([
            'resume' => '{{20}} 4g ev',
            'questionId' => 1,
            'operationId' => 110,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/Kg + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 110,
        ]);

        Resume::create([
            'resume' => '{{2}} 1,5 g',
            'questionId' => 1,
            'operationId' => 111,
        ]);

        Resume::create([
            'resume' => '{{4}} 15 mg/kg ev
            {{10}} 800 mg sFG< 60ml/dia + {{9}} 2g',
            'questionId' => 2,
            'operationId' => 111,
        ]);

        Resume::create([
            'resume' => '{{1}} 2g
            (*) Factors de risc: duració cirurgia > 2 h, implant protètic, > 65 anys, obesitat, comorbilitats,
            transfusió, infecció activa a distància, la ILQ implicaria gravetat.',
            'questionId' => 1,
            'operationId' => 115,
        ]);

        Resume::create([
            'resume' => '{{5}} 900 mg',
            'questionId' => 2,
            'operationId' => 115,
        ]);

        Resume::create([
            'resume' => '{{3}} 2g + {{8}} 1g.
            A la cirurgia colorectal programada es recomana la preparació mecànica del colon
            (Fosfoevac o Pleinvue) associada a antibiòtics via oral amb Neomicina 1g + {{8}}
            500 mg, 3 dosis preoperatòries 19, 18 i 9 h abans de l’inici de la cirurgia (és a dir, a les 13h,
            14h i 23h del dia anterior a la cirurgia).',
            'questionId' => 1,
            'operationId' => 116,
        ]);

        Resume::create([
            'resume' => '{{8}} 1g + {{7}} 3-5 mg/kg',
            'questionId' => 2,
            'operationId' => 116,
        ]);

        Resume::create([
            'resume' => '{{6}} 2g',
            'questionId' => 1,
            'operationId' => 117,
        ]);

        Resume::create([
            'resume' => '{{8}} 1g + {{7}} 3-5 mg/Kg',
            'questionId' => 2,
            'operationId' => 117,
        ]);

    }
}
