<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable=[
        'date',
        'annee_scolaire_id',
        'classes_id',
        'eleve_id',
    ];

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'eleve_id');
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class);
    }
}
