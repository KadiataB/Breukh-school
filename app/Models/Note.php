<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable=[
        "note",
        "discipline_evaluation_id",
        "inscription_id"
    ];

    public function eleve()
    {
        return $this->belongsTo(Inscription::class);
    }

    public function discipline_evaluation()
    {
        return $this->belongsTo(DisciplineEvaluation::class);
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'inscriptions', 'classes_id', 'eleve_id');
    }

    public function inscription()
    {
        return $this->belongsTo(Note::class);
    }


}
