<?php

namespace App\Http\Controllers;

use App\Livewire\Classe;
use App\Models\Classes;
use App\Models\Level;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    

    public function index(){
        return view ('classes.index');
    }

    public function create(){
        return view ('classes.create');
    }

    public function edit(Classes $classe){
        // passe l'instance au template
        return view('classes.edit', compact('classe'));
    }
}
