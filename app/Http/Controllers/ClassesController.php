<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassesRequest;
use App\Http\Requests\UpdateClassesRequest;
use App\Http\Resources\ClassesResource;
use App\Http\Resources\DisciplineEvaluationResource;
use App\Http\Resources\InscriptionResource;
use App\Http\Resources\NoteResource;
use App\Http\Resources\ParticipantResource;
use App\Models\Classes;
use App\Models\DisciplineEvaluation;
use App\Models\Eleve;
use App\Models\Inscription;
use App\Models\Note;
use App\Traits\JoinQueryParams;
use Symfony\Component\HttpFoundation\Request;



class ClassesController extends Controller
{
    use JoinQueryParams;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Classes::all();
    }

    public function eleve($id)
    {
        return Eleve::join('inscriptions', 'eleves.id', 'inscriptions.eleve_id')
            ->where('inscriptions.classes_id', $id)
            ->select('eleves.*')
            ->get();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function coef($id)
    {
        $notes = DisciplineEvaluation::where('classes_id', $id)
            ->join('classes', 'discipline_evaluations.classes_id', '=', 'classes.id')
            ->join('evaluations', 'discipline_evaluations.evaluation_id', '=', 'evaluations.id')
            ->join('disciplines', 'discipline_evaluations.discipline_id', '=', 'disciplines.id')
            ->select('discipline_evaluations.*', 'evaluations.libelle as evaluation', 'disciplines.libelle as discipline', 'discipline_evaluations.note_max as note_max')
            ->get();
        $data = [];
        foreach ($notes as $value) {
            $data[] = [
                'note_max' => $value->note_max,
                'evaluation' => $value->evaluation,
                'discipline' => $value->discipline,
            ];
        }
        return $data;


    }
    public function storeCoef(Request $request, $classe)
    {

        $idSemestre = $request->semestre_id;
        $note = DisciplineEvaluation::create([
            ...$request->validate([
                "note_max" => "required",
                "annee_scolaire_id" => "required",
                "discipline_id" => "required",
                "evaluation_id" => "required",
            ]),
            "classes_id" => $classe,
            "semestre_id" => $idSemestre


        ]);
        return new DisciplineEvaluationResource($note);

    }

    public function getnotes($classeId)
    {
      return $this->getNote1(Note::class,$classeId);

    }

    public function getNoteByEleve($classeId, $eleveId)
    {
      return $this->getNoteByEleve1(Note::class,$classeId, $eleveId);
    }

    // public function getNotesByDiscipline($classeId, $disciplineId, $evaluationId, $inscriptionId)
    // {
    //     $ponderation = DisciplineEvaluation::where(["evaluation_id" => $evaluationId, "classes_id"=>$classeId,"discipline_id" => $disciplineId, "annee_scolaire_id" => 1, "semestre_id" => 1])->first();
    //     $disEvalaution=$ponderation->id;
    //     $notes = Note::where(["inscription_id"=>$inscriptionId, "discipline_evaluation_id" => $disEvalaution])->first();


    //     return $notes;
    // }

    public function getNoteByDiscipline($classe, $discipline)
{
    $ponderation = DisciplineEvaluation::where([
        'classes_id' => $classe,
        'discipline_id' => $discipline,
        'annee_scolaire_id' => 1,
        'semestre_id' => 1
    ])->pluck('id');

    $notes = Note::join('inscriptions', 'notes.inscription_id', '=', 'inscriptions.id')
        ->whereIn('discipline_evaluation_id', $ponderation)
        ->get();
        // return $notes;
    $dataNotes = [];

    foreach ($notes as $note) {
        $inscriptionId = $note->inscription_id;
        $eleve= Inscription::where('id',$inscriptionId)->first();
        if (!isset($dataNotes[$inscriptionId])) {
            $dataNotes[$inscriptionId] = [
                'inscription' =>new InscriptionResource( $eleve),
                // 'discipline_evaluation_id' =>new DisciplineEvaluationResource( $note->discipline_evaluation),
                'notes' => new NoteResource($note),
            ];
        }

        // $dataNotes[$inscriptionId]['notes'][] = $note;
    }

    return  array_values($dataNotes);
}

public function getParticipationsByUser($id){
    $classe = Classes::find($id);
    return  ParticipantResource::collection($classe->participants);
}




    public function getNoteDiscipline()
    {

    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassesRequest $request, Classes $classes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classes)
    {
        //
    }
}
