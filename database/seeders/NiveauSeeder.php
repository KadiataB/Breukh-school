<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $niveaux=[
            [

            'libelle'=>'elementaire'
            ],
            [
                'libelle'=>'moyen'
            ],
            [
                'libelle'=>'secondaire',
            ]

            ];
            \App\Models\Niveaux::insert($niveaux);
    }
}
