<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes=[
            [

            'libelle'=>'CI',
            'niveaux_id'=>1

            ],
            [
                'libelle'=>'6e',
                'niveaux_id'=>2
            ],
            [
                'libelle'=>'seconde',
                'niveaux_id'=>3
            ]

            ];
            \App\Models\Classes::insert($classes);

    }
}
