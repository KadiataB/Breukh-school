<?php

namespace App\Http\Controllers;


use App\Http\Requests\EleveRequest;
use App\Http\Resources\EventResource;
use App\Models\AnneeScolaire;
use App\Models\Inscription;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Models\Eleve;
use Illuminate\Support\Facades\DB;


class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Eleve::all();
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(EleveRequest $request)
    {
        DB::beginTransaction();


            $eleve = Eleve ::create([
                "nom" => $request->nom,
                "prenom" => $request->prenom,
                "date_de_naissance" => $request->date_de_naissance,
                "lieu_de_naissance" => $request->lieu_de_naissance,
                "profil" => $request->profil,
                "sexe" => $request->sexe,
                "email" => $request->email,

            ]);
            $eleveId = $eleve->id;

            $annee = AnneeScolaire::where('status', 1)->first();

             $date= Now();
            Inscription::create([
                "date" => $date,
                "eleve_id" => $eleveId,
                "classes_id" => $request->classes_id,
                "annee_scolaire_id" => $annee->id
            ]);
            DB::commit();
            return $eleve;


    }

    public function updateState(Request $request)
    {
         return Eleve::whereIn('id', $request->all())->update(['etat'=> 0]);

    }

    public function getParticipations(Request $request)
    {
        $eleveId=$request->id;
        $classe= Inscription::where('eleve_id', $eleveId)->pluck('classes_id')->first();
        $participant= Participant::where('classes_id',$classe)->get();

        return [
            "eleve"=>Eleve::find($eleveId),
            "event"=>EventResource::collection($participant)
        ];

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

