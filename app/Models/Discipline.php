<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $fillable=[
        'libelle'
    ];

    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'discipline_evaluations','classes_id','discipline_id');
    }

}
