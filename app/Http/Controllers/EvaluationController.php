<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        return Evaluation::all();
    }

    public function store(Request $request)
    {
        Evaluation::create([
            "libelle" => $request->libelle
        ]);

    }
}
