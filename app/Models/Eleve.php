<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

 
class Eleve extends Model
{
    use Notifiable;
    protected $table = 'eleves';
    use HasFactory;
    protected $guarded =[];
    public function __construct()
    {
      $this->numero= $this->getNumeroEleve();
    }



    public static function getNumeroEleve()
    {
        // Récupérer tous les numéros des élèves ayant un état de 1 en ordre croissant
        $numerosEtatUn = DB::table('eleves')->where('profil', 1)
                              ->orderBy('numero', 'asc')
                              ->pluck('numero')
                              ->toArray();

        // Parcourir les numéros et trouver le premier numéro absent dans l'ordre croissant
        $dernierNumero = 0;
        foreach ($numerosEtatUn as $numero) {
            if ($numero > $dernierNumero + 1) {
                // Trouvé le premier numéro absent, retourner le numéro précédent
                return $dernierNumero + 1;
            }
            $dernierNumero = $numero;
        }

        // Si tous les numéros sont présents, générer un nouveau numéro en fonction du dernier numéro attribué
        return $dernierNumero + 1;
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'inscriptions','classes_id', 'eleve_id');
    }



}


