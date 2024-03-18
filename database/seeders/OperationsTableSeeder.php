<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Operation;

class OperationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Operation::create([
            'surgeryId' => 1,
            'name' => 'Recanvi valvular'
        ]);

        Operation::create([
            'surgeryId' => 1,
            'name' => 'Bypass aortocoronari'
        ]);

        Operation::create([
            'surgeryId' => 1,
            'name' => 'Implantació de dispositius cardíacs (marcapàs, DAI,...)'
        ]);

        Operation::create([
            'surgeryId' => 1,
            'name' => 'ECMO'
        ]);

        Operation::create([
            'surgeryId' => 1,
            'name' => 'TAVI (inserció transcatèter de vàlvula aòrtica)'
        ]);

        Operation::create([
            'surgeryId' => 1,
            'name' => 'Tancament CIA i FOP'
        ]);

        Operation::create([
            'surgeryId' => 2,
            'name' => 'RTU, cirurgia endoscòpica, cirurgia reconstructiva, uretral'
        ]);

        Operation::create([
            'surgeryId' => 2,
            'name' => 'Cirurgies AMB entrada tracte intestinal'
        ]);

        
        Operation::create([
            'surgeryId' => 2,
            'name' => 'Pròtesis de pene, testicle o esfínter urinari'
        ]);

        Operation::create([
            'surgeryId' => 2,
            'name' => 'Biopsia pròstata transperineal'
        ]);

        Operation::create([
            'surgeryId' => 2,
            'name' => 'Litotrícia extracorpòrea',
            'profilaxis' => 0
        ]);

        Operation::create([
            'surgeryId' => 2,
            'name' => 'Cirurgia endourològica ambulatòria',
            'profilaxis' => 0
        ]);

        Operation::create([
            'surgeryId' => 2,
            'name' => 'Cistoscòpia',
            'profilaxis' => 0
        ]);

        Operation::create([
            'surgeryId' => 2,
            'name' => 'Cirurgia nèta testicular',
            'profilaxis' => 0
        ]);

        Operation::create([
            'surgeryId' => 2,
            'name' => 'Fimosi',
            'profilaxis' => 0
        ]);

        Operation::create([
            'surgeryId' => 2,
            'name' => 'Cirurgia de penis sense implant',
            'profilaxis' => 0
        ]);


        Operation::create([
            'surgeryId' => 3,
            'name' => 'Cesària'
        ]);

        Operation::create([
            'surgeryId' => 3,
            'name' => 'Cirurgia laparotòmica SENSE entrada a vagina i amb baix ris de lesió intestinal'
        ]);
        
        Operation::create([
            'surgeryId' => 3,
            'name' => 'Cirurgia laparoscòpica (amb assistència robòtica o no) que inclou histerectomia amb baix risc de lesió intestinal'
        ]);

        Operation::create([
            'surgeryId' => 3,
            'name' => 'Cirurgia vulvar'
        ]);

        Operation::create([
            'surgeryId' => 3,
            'name' => 'Cirurgia sòl pelvià amb o sense col.locació de material protèsic'
        ]);

        Operation::create([
            'surgeryId' => 3,
            'name' => 'Cirurgia de mama'
        ]);

        Operation::create([
            'surgeryId' => 3,
            'name' => 'Cirurgia laparoscòpica o laparotòmica amb risc de resecció o lesió intestinal (neoplàsia ovari, endometriosi profunda)'
        ]);

        Operation::create([
            'surgeryId' => 3,
            'name' => 'Citoreducció neoplàsica ovari d’alta complexitat'
        ]);

        Operation::create([
            'surgeryId' => 3,
            'name' => 'Avortament induït quirúrgic 1o i 2o trimestre'
        ]);

        Operation::create([
            'surgeryId' => 3,
            'name' => 'Legrat puerperal'
        ]);

        Operation::create([
            'surgeryId' => 3,
            'name' => 'Reparació estrips vaginals III-IV (afectació ano-rectal)'
        ]);

        Operation::create([
            'surgeryId' => 4,
            'name' => 'Cataractes, glaucoma, injert corneal'
        ]);

        Operation::create([
            'surgeryId' => 4,
            'name' => 'Cirurgia lacrimal'
        ]);

        
        Operation::create([
            'surgeryId' => 4,
            'name' => 'Traumatisme penetrant d’ull'
        ]);

        Operation::create([
            'surgeryId' => 6,
            'name' => 'Mastectomia oncològica'
        ]);

        Operation::create([
            'surgeryId' => 6,
            'name' => 'Implants/reducció mama (B-II), reconstrucció oncoplàstica'
        ]);

        Operation::create([
            'surgeryId' => 7,
            'name' => 'Inserció de derivació ventriculo peritoneal, ventriculo auricular (DVPA) i drenatge ventricular extern'
        ]);

        Operation::create([
            'surgeryId' => 7,
            'name' => 'Craniotomia electiva'
        ]);

        
        Operation::create([
            'surgeryId' => 7,
            'name' => 'Procediments discals: hernia discal, laminectomia, fusió espinal, mielomeningocele'
        ]);

        Operation::create([
            'surgeryId' => 7,
            'name' => 'Drenatge hematoma subdural'
        ]);

        Operation::create([
            'surgeryId' => 7,
            'name' => 'Biòpsia estereotàxica'
        ]);

        Operation::create([
            'surgeryId' => 7,
            'name' => 'Cirurgia transesfenoidal (a través senos paranasales o faringe)'
        ]);

        
        Operation::create([
            'surgeryId' => 8,
            'name' => 'Procediments cutanis sense implicació de la cavitat oral'
        ]);

        Operation::create([
            'surgeryId' => 8,
            'name' => 'Septoplastia'
        ]);

        Operation::create([
            'surgeryId' => 8,
            'name' => 'Rinoplastia simple'
        ]);

        
        Operation::create([
            'surgeryId' => 8,
            'name' => 'Linfadenectomia'
        ]);
                
        Operation::create([
            'surgeryId' => 8,
            'name' => 'Fractures maxilofacials'
        ]);

        Operation::create([
            'surgeryId' => 8,
            'name' => 'Procediments cutanis AMB implicació de la cavitat oral'
        ]);

        Operation::create([
            'surgeryId' => 8,
            'name' => 'Rinoplàstia complexa (revisió, pròtesis)'
        ]);

        Operation::create([
            'surgeryId' => 8,
            'name' => 'Procediments odontològics (implant oral, endodòncia)'
        ]);

        Operation::create([
            'surgeryId' => 8,
            'name' => 'Implantació d’injert ossi a través cavitat oral'
        ]);

        Operation::create([
            'surgeryId' => 8,
            'name' => 'Cirurgia reconstructora'
        ]);

        Operation::create([
            'surgeryId' => 9,
            'name' => 'Linfadenectomia extensa'
        ]);

        
        Operation::create([
            'surgeryId' => 9,
            'name' => 'Cirurgia cervical amb ressecció multivisceral'
        ]);

        Operation::create([
            'surgeryId' => 9,
            'name' => 'Implant coclear'
        ]);

        Operation::create([
            'surgeryId' => 9,
            'name' => 'Traqueotomia'
        ]);

        Operation::create([
            'surgeryId' => 9,
            'name' => 'Amigdalectomia'
        ]);

        Operation::create([
            'surgeryId' => 9,
            'name' => 'Adenoidectomia'
        ]);

        Operation::create([
            'surgeryId' => 9,
            'name' => 'Laringectomia'
        ]);

        Operation::create([
            'surgeryId' => 9,
            'name' => 'Cirurgia de sinus o incisió de mucosa faringe- laringea'
        ]);

        Operation::create([
            'surgeryId' => 9,
            'name' => 'Mastoïdectomia'
        ]);

        Operation::create([
            'surgeryId' => 9,
            'name' => 'Cirurgia de cap i coll'
        ]);

        Operation::create([
            'surgeryId' => 9,
            'name' => 'Cirurgia neta contaminada i contaminada d’oïda mitja i sins'
        ]);

        
        Operation::create([
            'surgeryId' => 10,
            'name' => 'Lobectomia / Pneumonectomia / Resecció pulmonar'
        ]);

        Operation::create([
            'surgeryId' => 10,
            'name' => 'Toracotomia'
        ]);

        Operation::create([
            'surgeryId' => 10,
            'name' => 'Pleuroscòpia, toracoscòpia, videotoracoscòpia'
        ]);

        
        Operation::create([
            'surgeryId' => 10,
            'name' => 'Decorticació pleural, pleurectomia'
        ]);
        
        Operation::create([
            'surgeryId' => 10,
            'name' => 'Traumatisme toràcic penetrant'
        ]);

        Operation::create([
            'surgeryId' => 11,
            'name' => 'Endarterectomia carotídia'
        ]);

        Operation::create([
            'surgeryId' => 11,
            'name' => 'Cirurgia arterial (Ao abdominal, protètica, membres inferiors o que inclogui incisió inguinal)'
        ]);

        Operation::create([
            'surgeryId' => 11,
            'name' => 'Amputació membre inferior per isquèmia'
        ]);

        Operation::create([
            'surgeryId' => 11,
            'name' => 'Cirurgia vascular perifèrica percutània o oberta'
        ]);

        Operation::create([
            'surgeryId' => 12,
            'name' => 'Implantació de material protètic (durada 24h)'
        ]);

        Operation::create([
            'surgeryId' => 12,
            'name' => 'Artroplàstia genoll, maluc/ primaries i de revisió'
        ]);

        Operation::create([
            'surgeryId' => 12,
            'name' => 'Reducció de fractura tancada amb material osteosíntesi'
        ]);

        Operation::create([
            'surgeryId' => 12,
            'name' => 'Fractura oberta Gustilo I, II (durada 24 h)'
        ]);

        Operation::create([
            'surgeryId' => 12,
            'name' => 'Laminectomia, fusió vertebral, discectomia amb/sense instrumentació'
        ]);

        
        Operation::create([
            'surgeryId' => 12,
            'name' => 'Hernia discal'
        ]);

        Operation::create([
            'surgeryId' => 12,
            'name' => 'Fractura oberta Gustilo III'
        ]);

        Operation::create([
            'surgeryId' => 13,
            'name' => 'Cirurgia endocrina cervical (tiroides / paratiroides)',
            'profilaxis' => 0
        ]);

        
        Operation::create([
            'surgeryId' => 13,
            'name' => 'Hernioplastia inguinal laparoscòpica',
            'profilaxis' => 0
        ]);

        Operation::create([
            'surgeryId' => 13,
            'name' => 'Herniorrafia i hernioplastia inguinal o abdominal oberta'
        ]);

        Operation::create([
            'surgeryId' => 13,
            'name' => 'Cirurgia de Budell prim amb o sense obstrucció'
        ]);

        Operation::create([
            'surgeryId' => 14,
            'name' => 'Esofaguectomia, gastrectomia'
        ]);

        
        Operation::create([
            'surgeryId' => 14,
            'name' => 'Cirurgia de reflux GE, achalasia, vagotomia'
        ]);

        Operation::create([
            'surgeryId' => 14,
            'name' => 'Esplenectomia'
        ]);

        
        Operation::create([
            'surgeryId' => 14,
            'name' => 'Cirurgia bariàtrica'
        ]);

        Operation::create([
            'surgeryId' => 15,
            'name' => 'Traumatisme penetrant abdomen'
        ]);

        
        Operation::create([
            'surgeryId' => 15,
            'name' => 'Apendicectomia'
        ]);

                
        Operation::create([
            'surgeryId' => 16,
            'name' => 'CIRURGIA HEPÀTICA LAPAROSCÒPICA'
        ]);

        Operation::create([
            'surgeryId' => 16,
            'name' => 'COLECISTECTOMIA'
        ]);

        Operation::create([
            'surgeryId' => 16,
            'name' => 'CIRURGIA PANCREÀTICA'
        ]);

        Operation::create([
            'surgeryId' => 16,
            'name' => 'Quist hidatidic'
        ]);

        Operation::create([
            'surgeryId' => 19,
            'name' => 'Col·locació PEG'
        ]);

        Operation::create([
            'surgeryId' => 19,
            'name' => 'USE- PAAF lesió quística al costat del tracte GI (inclou mediastí)'
        ]);

        Operation::create([
            'surgeryId' => 19,
            'name' => 'Drenatge transmural de col·lecció pancreàtica'
        ]);

        Operation::create([
            'surgeryId' => 19,
            'name' => 'CPRE (colangiopancreatografia retrògrada endoscòpica) amb drenatge incomplet via biliar'
        ]);

        Operation::create([
            'surgeryId' => 20,
            'name' => 'Biòpsia d’òrgan procediment net'
        ]);

        Operation::create([
            'surgeryId' => 20,
            'name' => 'Biopsia transrectal pròstata'
        ]);

        Operation::create([
            'surgeryId' => 20,
            'name' => 'Nefrostomia percutània'
        ]);

        Operation::create([
            'surgeryId' => 20,
            'name' => 'Pròtesis endo vascular recobertes (Dacron, PTFE)'
        ]);

        Operation::create([
            'surgeryId' => 20,
            'name' => 'Inserció filtre VCI'
        ]);

        
        Operation::create([
            'surgeryId' => 20,
            'name' => 'Angiografia Angioplàstia Inserció stent coronari i altres territoris'
        ]);

        Operation::create([
            'surgeryId' => 20,
            'name' => 'Inserció catèter venós central no tunelitzat'
        ]);

        Operation::create([
            'surgeryId' => 20,
            'name' => 'Inserció port a cath o CVC tunelitzat'
        ]);

        Operation::create([
            'surgeryId' => 20,
            'name' => 'Embolització aneurisme amb inserció de “coil”'
        ]);

        Operation::create([
            'surgeryId' => 20,
            'name' => 'Embolització per control sagnat (ex politraumàtic)'
        ]);

        Operation::create([
            'surgeryId' => 20,
            'name' => 'Embolització amb probable infart isquèmic extens (úter,melsa,..)'
        ]);

        Operation::create([
            'surgeryId' => 20,
            'name' => 'Quimio embolització de fetge amb esfínter Oddi prèviament NO funcionant'
        ]);

        Operation::create([
            'surgeryId' => 20,
            'name' => 'Quimio embolització de fetge amb esfínter Oddi prèviament funcionant'
        ]);

        Operation::create([
            'surgeryId' => 20,
            'name' => 'Inserció gastrostomia alimentació endoscòpica'
        ]);

        Operation::create([
            'surgeryId' => 20,
            'name' => 'Catèter diàlisi peritoneal'
        ]);

        Operation::create([
            'surgeryId' => 20,
            'name' => 'CPRE amb drenatge incomplet via biliar'
        ]);

        Operation::create([
            'surgeryId' => 20,
            'name' => 'Drenatge via biliar/colecistostomia'
        ]);

        Operation::create([
            'surgeryId' => 20,
            'name' => 'Shunt transjugular portosistèmic (TIPS)'
        ]);        

        Operation::create([
            'surgeryId' => 12,
            'name' => 'Artroscòpia',
            'profilaxis' => 0
        ]);        

        Operation::create([
            'surgeryId' => 12,
            'name' => 'Reducció de fractura tancada sense material osteosíntesi',
            'profilaxis' => 0
        ]);        

        Operation::create([
            'surgeryId' => 12,
            'name' => "Retirada d'implants ortopèdics utilitzats com tractament de fractures",
            'profilaxis' => 0
        ]);        
    }
}
