<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\DisciplineEvaluation;
use App\Models\Note;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;


class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function insertNote(Request $request, $classeId, $disicplindeId, $evaluationId)
    {
        $tabl = DisciplineEvaluation::where([
            'classes_id' => $classeId,
            'discipline_id' => $disicplindeId,
            'evaluation_id' => $evaluationId,
            'annee_scolaire_id'=>1,
            'semestre_id'=>1
        ])->first();
        // dd($tabl);
        $tabl['note_max'];
        // dd($tabl->note_max);
        $notes = [];
        $tabs = $request->tab;
        //  dd($tabs);

        if (is_null($tabs)) {
            return response()->json(["message" => "Le tableau des notes est manquant"], 400);
        }

        foreach ($tabs as $tab) {
            // dd($tab);

            // dd($tab['note']);
            if ((int) $tabl['note_max'] < $tab['note']) {
                return response()->json(["message" => "La note ne doit pas être plus grande"], 401);
            }

            $note = Note::create(["note" => $tab['note'], "inscription_id" => $tab['inscription_id'], "discipline_evaluation_id" => $tabl->id]);
            $notes[] = $note;
        }
        return response()->json($notes);

    }
    public function updateNote(Request $request, $classeId, $disicplindeId, $evaluationId,$eleveId)
    {

                $tabl = DisciplineEvaluation::where([
                    'classes_id' => $classeId,
                    'discipline_id' => $disicplindeId,
                    'evaluation_id' => $evaluationId,
                    'annee_scolaire_id' => 1,
                    'semestre_id' => 1
                ])->first();
                $not=$request->note;
                // $inscription=$request->inscription_id;
                if (is_null($request)) {
                    return response()->json(["message" => "La note est manquante"], 400);
                }

                if ((int) $tabl->note_max <$not) {
                    return response()->json(["message" => "La note ne doit pas être plus grande"], 401);
                }

                $note = Note::updateOrCreate([
                    "inscription_id" => $eleveId,
                    "discipline_evaluation_id" => $tabl->id
                ],["note" => $not]);



                return response()->json($note);



    }

//     public function updateNote(Request $request, $classeId, $disicplindeId, $evaluationId, $inscriptionId)
// {
//     $tabl = DisciplineEvaluation::where([
//         'classes_id' => $classeId,
//         'discipline_id' => $disicplindeId,
//         'evaluation_id' => $evaluationId,
//         'annee_scolaire_id' => 1,
//         'semestre_id' => 1
//     ])->first();

//     if (is_null($tabl)) {
//         return response()->json(["message" => "La discipline d'évaluation n'existe pas"], 404);
//     }

//     if ((int) $tabl['note_max'] < $request->note) {
//         return response()->json(["message" => "La note ne doit pas être plus grande"], 401);
//     }

//     $note = Note::where([
//         'inscription_id' => $inscriptionId,
//         'discipline_evaluation_id' => $tabl->id
//     ])->first();

//     if (is_null($note)) {
//         $note = Note::create([
//             "note" => $request->note,
//             "inscription_id" => $inscriptionId,
//             "discipline_evaluation_id" => $tabl->id
//         ]);
//     } else {
//         $not=$request->tab;
//         $note = $request->note;
//         // dd($not->note);
//         $note->save();
//     }

//     return response()->json(["message" => "Note mise à jour avec succès"], 200);
// }
// public function updateNote(Request $request, $classeId, $disciplineId, $evaluationId, $eleveId)
//     {
//         DB::table('notes')
//             ->join('inscriptions', 'notes.inscription_id', '=', 'inscriptions.id')
//             ->join('discipline_evaluations', 'notes.discipline_evaluation_id', '=', 'discipline_evaluations.id')
//             ->where('inscriptions.classes_id', $classeId)
//             ->where('discipline_evaluations.discipline_id', $disciplineId)
//             ->where('discipline_evaluations.evaluation_id', $evaluationId)
//             ->where('inscriptions.eleve_id', $eleveId)
//             ->update(['notes.note' => $request->input('note')]);

//         DB::table('notes')
//             // ->where('classes_id', $classeId)
//             ->where('discipline_id', $disciplineId)
//             ->where('evaluation_id', $evaluationId)
//             ->update(['note' => $request->input('note')]);

//         return ['message' => 'note mise à jour avec succès'];
//     }

    // public function updateNote(Request $request)
    // {

    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
    }
}
