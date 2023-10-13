<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classes extends Model
{
    use HasFactory;

    public function niveaux()
    {
        return $this->belongsTo(Niveaux::class,'niveaux_id');
    }

    public function disciplines1()
    {
        return $this->hasMany(DisciplineEvaluation::class);
    }

    public function disciplines()
    {
        return $this->belongsToMany(Discipline::class, 'discipline_evaluations','classes_id', 'discipline_id');
    }
    public function classeSemestre() :HasMany
    {
        return $this->hasMany(ClasseSemestre::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function eleves()
    {
        return $this->belongsToMany(Eleve::class,'inscriptions','classes_id','eleve_id');
    }

    public function inscriptions()
    {
        return $this->belongsToMany(Inscription::class);
    }

}
