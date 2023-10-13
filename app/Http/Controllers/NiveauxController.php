<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNiveauxRequest;
use App\Http\Requests\UpdateNiveauxRequest;
use App\Http\Resources\NiveauxResource;
use App\Models\Classes;
use App\Models\Eleve;
use App\Models\Inscription;
use App\Models\Niveaux;
use App\Traits\JoinQueryParams;
use Illuminate\Http\Request;
use PHPUnit\Framework\Test;

class NiveauxController extends Controller
{

    use JoinQueryParams;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $param = request()->query('join');
        // if($param) {
        //     $niveaux = Niveaux::with(request()->query('join'))->get();
        //     return NiveauxResource::collection(Niveaux::with(request()->query('join'))->get());
        // } else {
        //     return Niveaux::all();
        // }
        // return $this->test(Niveaux::class, 'classes');

       return $this->test(Niveaux::class,$request,['classes','eleves','notes']);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function find(Niveaux $niveau)
    {
        return $niveau->load('classes');
        // return Niveaux::find($id)->load('classes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNiveauxRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Niveaux $niveaux)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Niveaux $niveaux)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNiveauxRequest $request, Niveaux $niveaux)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Niveaux $niveaux)
    {
        //
    }
}
