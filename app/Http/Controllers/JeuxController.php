<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JeuxController extends Controller
{
    public function show($nom) {
        $nomJeu = Tache::find($nom);
        return view('jeux.show', ['marathon' => $nomJeu]);
    }
}
