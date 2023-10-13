<?php
namespace App\Traits;
use App\Http\Resources\NiveauxResource;
use App\Models\Note;
trait JoinQueryParams {
    public function test($model,$request, array $uri)
    {


    $niveau=$model::all();

    $req=request()->query('join');
    $request=explode(',',$req);
    // return $request;

    $data=[];
    foreach ($request as $key) {

        foreach ($uri as $value) {
            if(trim($key)==trim($value)){
                $data[]=trim($value);
            }
        }
    }
        return $model::with($data)->get();

    }

    public function getNote1($model,$classeId)
    {
        $param = request()->query('join');
        if($param) {
            $notes = $model::join('inscriptions', 'notes.inscription_id', '=', 'inscriptions.id')
        ->join('classes', 'inscriptions.classes_id', '=', 'classes.id')
        ->where('classes.id', $classeId)
        ->select('notes.*')
        ->get();
         return $notes;
        } else {
            return $model::all();
        }
    }

    public function getNoteByEleve1($model, $classeId, $eleveId)
    {
        $param = request()->query('join');
        if($param) {
            $note = Note::join('inscriptions', 'notes.inscription_id', '=', 'inscriptions.id')
            ->join('classes', 'inscriptions.classes_id', '=', 'classes.id')
            ->where('classes.id', $classeId)
            ->where('inscriptions.eleve_id', $eleveId)
            ->select('notes.*')
            ->first();

        return $note;
        } else {
            return $model::all();
        }
    }
}
