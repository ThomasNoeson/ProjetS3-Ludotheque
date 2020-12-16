<?php

namespace App\Http\Controllers;


use App\Models\Jeu;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller {
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
}
