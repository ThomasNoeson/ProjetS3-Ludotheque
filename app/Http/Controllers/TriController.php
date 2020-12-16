<?php

namespace App\Http\Controllers;

class TriController extends Controller
{
    public function tri ()
    {
        $jeux = Jeu::all()->sortBy('nom');
        return view('jeu.index', ['jeux' => $jeux]);
    }

    public function choixEditeur ()
    {
        $Editeur = Editeur::all();
        $Jeu = Jeu::all();
        foreach ($Editeur as $i){
            if ($i["nom"] == $nom_editeur){
                $x = $i["id"];
            }
        }
        foreach ($Jeu as $j){
            if ($j["editeur_id"] == $x){
                echo($j["nom"]);
            }
        }
    }

    public function triediteur($nom_editeur){
        $TriEditeur = $this->TriEditeur($nom_editeur);
        return view('jeu.index', ['TriEditeur' => $TriEditeur]);
    }

}
