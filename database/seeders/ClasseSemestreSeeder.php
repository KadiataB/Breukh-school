<?php

namespace Database\Seeders;

use App\Models\ClasseSemestre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseSemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classSemestres= [
            [
                "classes_id"=>1,
                "semestre_id"=>1
            ],
            [
                "classes_id"=>1,
                "semestre_id"=>2
            ],
            [
                "classes_id"=>1,
                "semestre_id"=>3
            ],
            [
                "classes_id"=>3,
                "semestre_id"=>4
            ],
            [
                "classes_id"=>3,
                "semestre_id"=>5
            ],
        ];
        ClasseSemestre::insert($classSemestres);
    }
}
