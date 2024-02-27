<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\IdealWeight;


class IdealWeightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // gender: 0 home
        // gender: 1 dona

        IdealWeight::create([
            'gender' => 0,
            'minHeight' => 140,
            'maxHeight' => 144,
            'weight' => 39
        ]);

        IdealWeight::create([
            'gender' => 1,
            'minHeight' => 140,
            'maxHeight' => 144,
            'weight' => 34
        ]);

        IdealWeight::create([
            'gender' => 0,
            'minHeight' => 145,
            'maxHeight' => 149,
            'weight' => 43
        ]);

        IdealWeight::create([
            'gender' => 1,
            'minHeight' => 145,
            'maxHeight' => 149,
            'weight' => 39
        ]);

        IdealWeight::create([
            'gender' => 0,
            'minHeight' => 150,
            'maxHeight' => 154,
            'weight' => 48
        ]);

        IdealWeight::create([
            'gender' => 1,
            'minHeight' => 150,
            'maxHeight' => 154,
            'weight' => 43
        ]);

        IdealWeight::create([
            'gender' => 0,
            'minHeight' => 155,
            'maxHeight' => 159,
            'weight' => 52
        ]);

        IdealWeight::create([
            'gender' => 1,
            'minHeight' => 155,
            'maxHeight' => 159,
            'weight' => 48
        ]);

        IdealWeight::create([
            'gender' => 0,
            'minHeight' => 160,
            'maxHeight' => 164,
            'weight' => 57
        ]);

        IdealWeight::create([
            'gender' => 1,
            'minHeight' => 160,
            'maxHeight' => 164,
            'weight' => 52
        ]);

        IdealWeight::create([
            'gender' => 0,
            'minHeight' => 165,
            'maxHeight' => 169,
            'weight' => 61
        ]);

        IdealWeight::create([
            'gender' => 1,
            'minHeight' => 165,
            'maxHeight' => 169,
            'weight' => 57
        ]);

        IdealWeight::create([
            'gender' => 0,
            'minHeight' => 170,
            'maxHeight' => 174,
            'weight' => 66
        ]);

        IdealWeight::create([
            'gender' => 1,
            'minHeight' => 170,
            'maxHeight' => 174,
            'weight' => 62
        ]);

        IdealWeight::create([
            'gender' => 0,
            'minHeight' => 175,
            'maxHeight' => 179,
            'weight' => 71
        ]);

        IdealWeight::create([
            'gender' => 1,
            'minHeight' => 175,
            'maxHeight' => 179,
            'weight' => 66
        ]);

        IdealWeight::create([
            'gender' => 0,
            'minHeight' => 180,
            'maxHeight' => 184,
            'weight' => 75
        ]);

        IdealWeight::create([
            'gender' => 1,
            'minHeight' => 180,
            'maxHeight' => 184,
            'weight' => 71
        ]);

        IdealWeight::create([
            'gender' => 0,
            'minHeight' => 185,
            'maxHeight' => 189,
            'weight' => 80
        ]);

        IdealWeight::create([
            'gender' => 1,
            'minHeight' => 185,
            'maxHeight' => 189,
            'weight' => 75
        ]);

        IdealWeight::create([
            'gender' => 0,
            'minHeight' => 190,
            'maxHeight' => 194,
            'weight' => 84
        ]);

        IdealWeight::create([
            'gender' => 1,
            'minHeight' => 190,
            'maxHeight' => 194,
            'weight' => 80
        ]);

        IdealWeight::create([
            'gender' => 0,
            'minHeight' => 195,
            'maxHeight' => 199,
            'weight' => 89
        ]);

        IdealWeight::create([
            'gender' => 1,
            'minHeight' => 195,
            'maxHeight' => 199,
            'weight' => 84
        ]);

    }
}
