<?php

namespace App\Http\Controllers;
use App\Models\Editeur;
use App\Models\Jeu;

class TriController extends Controller
{
    public function tri ()
    {
        $jeux = Jeu::all()->sortBy('nom');
        return view('jeu.index', ['jeux' => $jeux]);
    }

    public function choixEditeur ($nom_editeur)
    {
        $Editeur = Editeur::all();
        $Jeu = Jeu::all();
        $x = 0;
        foreach ($Editeur as $i){
            if ($i["nom"] == $nom_editeur){
                $x = $i["id"];
            }
        }
        foreach ($Jeu as $j){
            if ($j["editeur_id"] == $x){
                echo('1');
            }
        }
    }

    public function triediteur($nom_editeur){
        $TriEditeur = $this->choixEditeur($nom_editeur);
        return view('jeu.index', ['TriEditeur' => $TriEditeur]);
    }

}
