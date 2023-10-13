<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;
    public function classeSemestre()
    {
        return $this->hasMany(ClasseSemestre::class);
    }

    public function disciplineEvaluation()
    {
        return $this->hasMany(DisciplineEvaluation::class);
    }
}
