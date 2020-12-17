<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Jeu;
use App\Models\User;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    function cinqAleatoires() {
        $jeu_ids = Jeu::all()->pluck('id');
        $faker = \Faker\Factory::create();
        $ids = $faker->randomElements($jeu_ids->toArray(), 5);
        $jeux = [];
        foreach ($ids as $id) {
            $jeux[] = Jeu::find($id);
        }
        return view('marathon_accueil', ['jeux' => $jeux]);
    }

    /**
     * home Page
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        $users = User::all();

        return view('home.index', ['users' => $users]);
    }

    public function meilleur(){ //Meilleurs jeux
        $com = Commentaire::all();
        $listeId = array();
        $listeTotale = array();
        foreach($com as $i){
            if (!(in_array($i["jeu_id"], $listeId))){
                $count = 0;
                $note = 0;
                array_push($listeId, $i["jeu_id"]);
                foreach ($com as $y){
                    if ($y["jeu_id"] == $i["jeu_id"]){
                        $count += 1;
                    $note += $y["note"];
                    }
                }
                $noteTotale = $note/$count;
                if (sizeof($listeTotale )<6){
                    $listeTotale[$i["id_jeu"]] = $noteTotale;
                }
                else{
                    foreach ($listeTotale as $id => $notes){
                        if($notes < $noteTotale){
                            unset($listeTotale[$id]);
                            $listeTotale[$i["id_jeu"]] = $noteTotale;
                        }
                    }
                }
            }
        }
        return view('marathon_accueil', ['listeTotale' => $listeTotale]);
    }


}
