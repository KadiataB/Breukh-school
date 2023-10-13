<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                "note"=>$this->note,
                // "inscription"=>new InscriptionResource($this->inscription),
                "ponderation"=>new DisciplineEvaluationResource($this->discipline_evaluation)
        ];
    }
}
