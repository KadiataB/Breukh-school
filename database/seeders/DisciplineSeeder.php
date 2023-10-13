<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $disciplines=[
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
            \App\Models\Discipline::insert($disciplines);

    }
    }

