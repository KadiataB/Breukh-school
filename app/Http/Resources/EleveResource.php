<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EleveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "nom" => $this->nom,
            "prenom" => $this->prenom,
            "date_de_naissance" => $this->date_de_naissance,
            "lieu_de_naissance" => $this->lieu_de_naissance,
            "sexe" => $this->sexe,
            "profil" => $this->profil
        ];
    }
    }

