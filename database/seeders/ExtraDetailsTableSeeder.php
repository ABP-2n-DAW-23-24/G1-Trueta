<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ExtraDetail;

class ExtraDetailsTableSeeder extends Seeder
{
    public function run(): void
    {
        ExtraDetail::create([
            'info' => "No es recomana profilaxi en cas d'inserció de catèters vasculars centrals.",
            'operationId' => 1,
            'surgeryId' => null
        ]);

        ExtraDetail::create([
            'info' => "No es recomana profilaxi en cas d'inserció de catèters vasculars centrals.",
            'operationId' => 2,
            'surgeryId' => null
        ]);

        ExtraDetail::create([
            'info' => "No es recomana profilaxi en cas d'inserció de catèters vasculars centrals.",
            'operationId' => 3,
            'surgeryId' => null
        ]);

        ExtraDetail::create([
            'info' => "No precisa profilaxi",
            'operationId' => 11,
            'surgeryId' => null
        ]);

        ExtraDetail::create([
            'info' => "No precisa profilaxi",
            'operationId' => 12,
            'surgeryId' => null
        ]);

        ExtraDetail::create([
            'info' => "No precisa profilaxi",
            'operationId' => 13,
            'surgeryId' => null
        ]);

        ExtraDetail::create([
            'info' => "No precisa profilaxi",
            'operationId' => 14,
            'surgeryId' => null
        ]);

        ExtraDetail::create([
            'info' => "No precisa profilaxi",
            'operationId' => 15,
            'surgeryId' => null
        ]);

        ExtraDetail::create([
            'info' => "No precisa profilaxi",
            'operationId' => 16,
            'surgeryId' => null
        ]);

        ExtraDetail::create([
            'info' => "No es recomana profilaxi en col·locació electiva de tubs toràcics ni realització de fibrobroncoscòpia i mediastinoscòpia.",
            'operationId' => 61,
            'surgeryId' => null
        ]);

        ExtraDetail::create([
            'info' => "No es recomana profilaxi en col·locació electiva de tubs toràcics ni realització de fibrobroncoscòpia i mediastinoscòpia.",
            'operationId' => 62,
            'surgeryId' => null
        ]);

        ExtraDetail::create([
            'info' => "No es recomana profilaxi en col·locació electiva de tubs toràcics ni realització de fibrobroncoscòpia i mediastinoscòpia.",
            'operationId' => 63,
            'surgeryId' => null
        ]);

        ExtraDetail::create([
            'info' => "No es recomana profilaxi en col·locació electiva de tubs toràcics ni realització de fibrobroncoscòpia i mediastinoscòpia.",
            'operationId' => 64,
            'surgeryId' => null
        ]);

        ExtraDetail::create([
            'info' => "No es recomana profilaxi en col·locació electiva de tubs toràcics ni realització de fibrobroncoscòpia i mediastinoscòpia.",
            'operationId' => 65,
            'surgeryId' => null
        ]);

        ExtraDetail::create([
            'info' => "No precisa profilaxi.",
            'operationId' => 77,
            'surgeryId' => null
        ]);

        ExtraDetail::create([
            'info' => "No precisa profilaxi.",
            'operationId' => 78,
            'surgeryId' => null
        ]);
    }
}