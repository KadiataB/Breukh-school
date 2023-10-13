<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dis=[
            [
            'libelle'=>'maths',
            ],
            [
                'libelle'=>'orthographe',
            ],
            [
                'libelle'=>'grammaire',
            ],
            [
                'libelle'=>'voaculaire',
            ]
            ];
            \App\Models\Discipline::insert();
    }
}
