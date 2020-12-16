<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class JeuController extends Controller
{
    /**
     * List All Jeu
     *
     * @return \Illuminate\View\View
     */
    public function index($sort = null)
    {
        $filter = null;
        if($sort !== null){
            if($sort){
                $jeux = Jeu::all()->sortBy('nom');
            } else{
                $jeux = Jeu::all()->sortByDesc('nom');
            }
            $sort = !$sort;
            $filter = true;
        } else {
            $jeux = Jeu::all();
            $sort = true;

        }
        return view('jeu.index', ['jeux' => $jeux, 'sort' => intval($sort), 'filter' => $filter]);
    }

    /**
     * Show Jeu.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $jeux = Jeu::all();
        $com = Commentaire::all();
        $user = User::all();

        $jeu = $jeux->find($id);


        return view('jeu.show', ['jeu' => $jeu, 'coms' => $com, 'users' => $user]);
    }

    /**
     * Show rules .
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function rules($id)
    {
        $jeux = Jeu::all();

        $jeu = $jeux->find($id);

        return view('jeu.rules', ['jeu' => $jeu]);
    }

    /**
     * Show the form to create a new jeu.
     *
     * @return Response
     */
    public function create()
    {
        return view('jeu.create');
    }

    /**
     * Store a new Jeu.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'nom' => 'required|unique:jeux',
                'description' => 'required',
                'theme' => 'required',
                'editeur' => 'required',
            ],
            [
                'nom.required' => 'Le nom est requis',
                'nom.unique' => 'Le nom doit être unique',
                'description.required' => 'La description est requise',
                'theme.required' => 'Le théme est requis',
                'editeur.required' => 'L\'editeur est requis',
            ]
        );

        $jeu = new Jeu();
        $jeu->nom = $request->nom;
        $jeu->description = $request->description;
        $jeu->theme_id = $request->theme;
        $jeu->user_id = Auth::user()->id;
        $jeu->editeur_id = $request->editeur;
        $jeu->url_media = 'https://picsum.photos/seed/'.$jeu->nom.'/200/200';

        $jeu->save();

        return Redirect::route('jeu_index');
    }
    public function tri ()
    {
        $jeux = Jeu::all()->sortBy('nom');
        return view('jeu.index', ['jeux' => $jeux]);
    }

    public function choixEditeur ($nom_editeur)
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
        $TriEditeur = TriEditeur($nom_editeur);
        return view('jeu.index', ['TriEditeur' => $TriEditeur]);
    }
}
