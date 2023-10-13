<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DisciplineEvaluationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // "id"=>$this->id,
            "note_max"=>$this->note_max,
            // "classe"=> $this->classes->libelle,
            "discipline"=> $this->discipline->libelle,
            "evaluation"=> $this->evaluation->libelle,
            // "semestre"=> $this->semestre->libelle
        ];
    }
}
