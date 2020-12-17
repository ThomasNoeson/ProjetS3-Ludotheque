<?php

namespace App\Http\Controllers;
use App\Models\Editeur;
use App\Models\Jeu;
use Illuminate\Http\Request;

class TriController extends Controller
{
    public function tri ()
    {
        $jeux = Jeu::all()->sortBy('nom');
        return view('jeu.index', ['jeux' => $jeux]);
    }

    public function triediteur(Request $request){ //Affichage en fonction des editeurs
        $jeux = Jeu::all()->where('editeur_id', $request->ide);
        return view('jeu.index', ['jeux' => $jeux, 'sort' => 0, 'filter' => null]);
    }

}
