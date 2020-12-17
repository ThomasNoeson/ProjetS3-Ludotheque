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
        $jeux = Jeu::all()->where('editeur_id', $request->ide_editeur);
        return view('jeu.index', ['jeux' => $jeux, 'sort' => 0, 'filter' => null]);
    }

    public function tritheme(Request $request){ //Affichage en fonction des themes
        $jeux = Jeu::all()->where('theme_id', $request->theme_id);
        return view('jeu.index', ['jeux' => $jeux, 'sort' => 0, 'filter' => null]);
    }

    public function trimecanique(Request $request){ //Affichage en fonction des mecanismes
        $jeux = Jeu::all()->where('id', $request->mecanique_id);
        return view('jeu.index', ['jeux' => $jeux, 'sort' => 0, 'filter' => null]);
    }
}
