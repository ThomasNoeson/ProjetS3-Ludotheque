<?php

namespace App\Http\Controllers;

class TriController extends Controller
{
    public function tri ()
    {
        $jeux = Jeu::all()->sortBy('nom');
        return view('jeu.index', ['jeux' => $jeux]);
    }


}
