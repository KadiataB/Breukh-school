<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveaux extends Model
{
    use HasFactory;

    protected $table= 'niveaux';
    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'inscriptions', 'classes_id', 'eleve_id');
    }

    public function eleves()
    {
        return $this->belongsToMany(Eleve::class,'inscriptions','classes_id','eleve_id');
    }

    public function notes()
    {
        return $this->belongsToMany(Note::class,'inscriptions','classes_id', 'eleve_id');
    }

    public function disciplines()
    {
        return $this->belongsTo(Discipline::class,'discipline_evaluations', 'discipline_id', 'classe_id');
    }
    public function inscriptions()
    {
        return $this->belongsToMany(Inscription::class, );
    }

}
