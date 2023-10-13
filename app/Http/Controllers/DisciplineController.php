<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    public function index()
    {
        return Discipline::all();
    }

    public function store(Request $request)
    {
        Discipline::create([
            "libelle" => $request->libelle
        ]);

    }
 
}
