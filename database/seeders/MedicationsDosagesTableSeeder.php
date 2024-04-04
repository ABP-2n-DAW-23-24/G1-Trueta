<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MedicationDosage;


class MedicationsDosagesTableSeeder extends Seeder
{
    public function run(): void
    {
        // 1
        MedicationDosage::create([
            'medicationId' => 1,
            'dosage' => '- Dosi: 2 g ev .
            - Si el pacient pesa >120 kg administrar 3 grams IV.
            - Temps infusió: 30 min. Si no es disposa d’aquest temps es pot infondre en bolus 3-
            5 min.
            - L’antibiòtic ha d’haver finalitzat dins els 60 min previs a la incisió de la pell.
            - Donar segona dosi d’1g, si:
                La cirurgia dura ≥ 3 hores.
                Hi ha pèrdua de ≥ 1500mL de sang.
                En pacients amb FG 10- 30 ml/min, valorar redosificació. Si FG <10 no cal
                redosificar.'
        ]);

        // 2
        MedicationDosage::create([
            'medicationId' => 2,
            'dosage' => '- Dosi: 1,5 g.
            - Temps infusió: 30 min. Si no es disposa d’aquest temps, es pot infondre en bolus
            3-5 min .
            - L’antibiòtic ha d’haver finalitzat dins els 60 min previs a la incisió de la pell.
            - Donar segona dosi d’1g, si:
                La cirurgia dura ≥ 3 hores.
                Hi ha pèrdua de ≥ 1500mL de sang.
                En pacients amb FG 10- 30 ml, valorar redosificació. Si FG <10 no cal
                redosificar.'
        ]);

        // 3
        MedicationDosage::create([
            'medicationId' => 3,
            'dosage' => '- Dosi: 2g ev.
            - Temps infusió: 30 min. Si no es disposa d’aquest temps, es pot infondre en bolus
            3-5 min.
            - L’antibiòtic ha d’haver finalitzat dins els 60 min previs a la incisió de la pell.
            - No cal re dosificar si la cirurgia es perllonga, només si ha pèrdua de ≥ 1500mL de
            sang.'
        ]);

        // 4
        MedicationDosage::create([
            'medicationId' => 4,
            'dosage' => '- Dosi: 15-20 mg/Kg (màx 2g) .
            - Taula segons pes:
                 < 50 kg: 750 mg
                 50-70 Kg: 1000 mg.
                 70-85 Kg: 1250 mg.
                 85-100 Kg: 1500 mg.
                 >100 kg: 1750 mg.
                 >120 kg: 2000 mg.
            - Temps infusió: ≤ 1g: 60 min.
            > 1g: 120 min.
            - La infusió ha d’haver finalitzat dins els 60 minuts previs a la incisió de la pell, per lo
            que serà necessari iniciar-la almenys 2 hores abans de la incisió de la pell.
            - No cal re dosificació intra operatòria.'
        ]);

        // 5
        MedicationDosage::create([
            'medicationId' => 5,
            'dosage' => '- Dosi: 900 mg .
            - Temps infusió: 30 min.
            - L’antibiòtic ha d’haver finalitzat dins els 60 min previs a la incisió de la pell.
            - Donar segona dosi si:
                La cirurgia dura ≥ 6 hores.
                Hi ha pèrdua de ≥ 1500mL de sang.
                En pacients amb FG 10- 30 ml, valorar redosificació. Si FG <10 no cal
                redosificar.'
        ]);

        // 6
        MedicationDosage::create([
            'medicationId' => 6,
            'dosage' => '- Dosi: 2g.
            - Temps infusió: 3.0 min. Si es necessita es pot passar en bolus 5 min.
            - L’antibiòtic ha d’haver finalitzat dins els 60 min previs a la incisió de la pell.
            - Donar segona dosi de 1g+200 mg, si:
                La cirurgia dura ≥ 3hores.
                Hi ha pèrdua de ≥ 1500mL de sang.
                En pacients amb FG 10- 30 ml/min, valorar redosificació. Si FG <10 no cal
                redosificar.'
        ]);

        // 7
        MedicationDosage::create([
            'medicationId' => 7,
            'dosage' => '- Dosi: 3-5 mg /kg
                Si FG > 15: Gentamicina 5 mg/kg .
                Si FG < 15: Gentamicina 3 mg/Kg .
            - Temps infusió: 30- 60 min.
            - L’antibiòtic ha d’haver finalitzat dins els 60 min previs a la incisió de la pell.
            - Donar segona dosi si pèrdua de ≥ 1500mL de sang.
            - No cal re-dosificar si es perllonga la cirurgia.
            
            Pes ajustat= [(pes real - pes ideal) x 0,4 ] + pes ideal.

            Pes ideal(kg):

            Altura (cm) | HOMBRES | MUJERES
            --------------------------------
            140         |   39    |   34
            145         |   43    |   39
            150         |   48    |   43
            155         |   52    |   48
            160         |   57    |   52
            165         |   61    |   57
            170         |   66    |   62
            175         |   71    |   66
            180         |   75    |   71
            185         |   80    |   75
            190         |   84    |   80
            195         |   89    |   84


            Dosis(mg):

            Pes Ajustat (Kg) | 3 mg/kg | 5 mg/kg
            -------------------------------------
            <55               |  160 mg |  240 mg
            50-60             |  160 mg |  320 mg
            60-75             |  240 mg |  320 mg
            75-90             |  240 mg |  400 mg
            90-110            |  320 mg |  480 mg

            '
        ]);

        // 8
        MedicationDosage::create([
            'medicationId' => 8,
            'dosage' => '- Dosi: 15 mg/Kg/dia.
            - Temps infusió: 30-60 min.
            - Donar segona dosi si pèrdua de ≥ 1500mL de sang.
            - No cal re-dosificar si es perllonga la cirurgia.'
        ]);

        // 9
        MedicationDosage::create([
            'medicationId' => 9,
            'dosage' => '- Dosi: 2g.
            - Temps infusió: 30 min.
            - Donar segons dosi si:
                La cirurgia dura > 4 hores.
                Hi ha pèrdua ≥ 1500mL de sang.
                En pacients amb FG 10- 30 ml, valorar redosificació. Si FG <10 no cal
                redosificar.'
        ]);

        // 10
        MedicationDosage::create([
            'medicationId' => 10,
            'dosage' => ''
        ]);

        // 11
        MedicationDosage::create([
            'medicationId' => 11,
            'dosage' => ''
        ]);

        // 12
        MedicationDosage::create([
            'medicationId' => 12,
            'dosage' => ''
        ]);

        // 13
        MedicationDosage::create([
            'medicationId' => 13,
            'dosage' => ''
        ]);

        // 14
        MedicationDosage::create([
            'medicationId' => 14,
            'dosage' => ''
        ]);

        // 15
        MedicationDosage::create([
            'medicationId' => 15,
            'dosage' => ''
        ]);

        // 16
        MedicationDosage::create([
            'medicationId' => 16,
            'dosage' => ''
        ]);

        // 17
        MedicationDosage::create([
            'medicationId' => 17,
            'dosage' => ''
        ]);

        // 18
        MedicationDosage::create([
            'medicationId' => 18,
            'dosage' => ''
        ]);

        // 19
        MedicationDosage::create([
            'medicationId' => 19,
            'dosage' => ''
        ]);

        // 20
        MedicationDosage::create([
            'medicationId' => 20,
            'dosage' => ''
        ]);

    }
}
