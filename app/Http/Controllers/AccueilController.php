<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function aleatoire(){
        $bdd=Jeu::all;
        $liste = array();
        for ($i =0;i<5;$i++) {
            $x = rand(1, 50);
            $recup = $bdd->query("SELECT nom,description FROM jeu WHERE id=$x");
            array_push($liste,$recup);
        }
        echo($liste);
    }
}
