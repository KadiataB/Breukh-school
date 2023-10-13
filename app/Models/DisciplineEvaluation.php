<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplineEvaluation extends Model
{
    use HasFactory;

    protected $fillable=[
        'note_max',
        'annee_scolaire_id',
        'classes_id',
        'discipline_id',
        'evaluation_id'
    ];
    public function classes()
    {
        return $this->belongsTo(Classes::class);
    }
    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }
    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }
    public function anneeScolaire()
    {
        return $this->belongsTo(AnneeScolaire::class);
    }

    public function note()
    {
        return $this->hasMany(Note::class);
    }

    public function DisciplineEvaluation()
    {
        return $this->belongsTo(Semestre::class);
    }
}


