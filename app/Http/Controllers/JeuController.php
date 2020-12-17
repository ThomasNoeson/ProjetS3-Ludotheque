<?php

namespace App\Http\Controllers;

use App\Models\Achat;
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
        $listeDuree = Jeu::all();
        $filter = null;
        if ($sort !== null) {
            if ($sort) {
                $jeux = Jeu::select('jeux.*')->orderBy('nom')->paginate(15);
            } else {
                $jeux = Jeu::select('jeux.*')->orderByDesc('nom')->paginate(15);
            }
            $sort = !$sort;
            $filter = true;
        } else {
            $jeux = Jeu::paginate(15);
            $sort = true;

        }
        return view('jeu.index', ['jeux' => $jeux, 'sort' => intval($sort), 'filter' => $filter, 'd' => $listeDuree]);
    }

    /**
     * Show Jeu.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */

    public function show($id)
    {
        $nbCom = 0;
        $jeux = Jeu::all();
        $com = Commentaire::all();
        $user = User::all();

        $jeu = $jeux->find($id);
        $notemax = $com->max('note'); //note la plus haute du jeu
        $notemin = $com->min('note'); //note la plus basse
        foreach ($com as $c) { //nombre de com du jeu
            if ($c->jeu_id == $id)
                $nbCom = $nbCom + 1;
        }
        $nbTot = $com->count(); // nombre total de coms
        $moy = $this->moynote($id); //moyenne des notes du jeu

        $PrixMoyen = $this->PrixMoyen($id);

        $PrixHaut = $this->PrixHaut($id);

        $PrixBas = $this->PrixBas($id);

        $NbUtilisateur = $this->NbUtilisateur();

        $UtilisateurAchete = $this->UtilisateurAchete($id);

        return view('jeu.show', ['max' => $notemax, 'min' => $notemin, 'nbCom' => $nbCom, 'nbTot' => $nbTot, 'moy' => $moy, 'jeu' => $jeu, 'coms' => $com, 'users' => $user, 'PrixMoyen' => $PrixMoyen, 'PrixHaut' => $PrixHaut, 'PrixBas' => $PrixBas, 'NbUtilisateur' => $NbUtilisateur, 'UtilisateurAchete' => $UtilisateurAchete]);


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
        $jeu->url_media = 'https://picsum.photos/seed/' . $jeu->nom . '/200/200';

        $jeu->save();

        return Redirect::route('jeu_index');
    }

        public function avis(Request $request) {
        //Ajout d'un commentaire (pas fini)
            $com = new Commentaire();
            $com->commentaire = $request->com;
            $com->date_com = new \DateTime();
            $com->note = $request->note;
            $com->jeu_id = 1;
            $com->user_id = Auth::user()->id;
            $com->save();

            return Redirect::route('jeu_index');
        }

    function PrixMoyen($id_jeu)
    {
        $AchatTotal = Achat::all();
        $total = 0;
        $count = 0;
        foreach ($AchatTotal as $i) {
            if ($i["jeu_id"] == $id_jeu) {
                $total += $i["prix"];
                $count += 1;
            }

        }
        if ($count == 0) $count = 1;
        return ($total / $count);
    }

    function PrixHaut($id_jeu)
    {
        $AchatTotal = Achat::all();
        $PlusHaut = 0;
        foreach ($AchatTotal as $i) {
            if ($i["jeu_id"] == $id_jeu) {
                $total = $i["prix"];
                if ($total > $PlusHaut) {
                    $PlusHaut = $total;
                }
            }
        }
        return $PlusHaut;
    }

    function PrixBas($id_jeu)
    {
        $AchatTotal = Achat::all();
        $PlusBas = 500000000;
        foreach ($AchatTotal as $i) {
            if ($i["jeu_id"] == $id_jeu) {
                $total = $i["prix"];
                if ($total < $PlusBas) {
                    $PlusBas = $total;
                }
            }
        }
        return $PlusBas;
    }

    function NbUtilisateur()
    {
        $User = User::all();
        $count = 0;
        foreach ($User as $i) {
            $count += 1;
        }
        return $count;
    }

    function UtilisateurAchete($id_jeu)
    {
        $AchatTotal = Achat::all();
        $count = 0;
        foreach ($AchatTotal as $i) {
            if ($i["jeu_id"] == $id_jeu) {
                $count += 1;
            }
        }
        return ($count);
        $achat->save();
        return Redirect::route('jeu_index');
    }

    public function supprimer()
    {

    }

    public function ajout(Request $request)
    {
        //Ajout d'un jeu dans la table achat
        $achat = new Achat();
        $jeux = Jeu::all();
        //$jeux->id->where($request -> jeu, $jeux->nom)
        $achat->jeu_id = $request->jeu;
        $achat->user_id = Auth::user()->id;
        $achat->date_achat = new \DateTime();
        $achat->lieu = $request->lieu;
        $achat->prix = $request->prix;
        $achat->save();
        return Redirect::route('profile');

    }


    public function moynote($id)
    {
        $com = Commentaire::all();
        $total = 0;
        $count = 0;
        foreach ($com as $c) {
            if ($c->jeu_id == $id) {
                $total = $total + $c->note;
                $count = $count + 1;
            }
        }
        if ($count == 0) $count = 1;
        return $total / $count;
    }

    public function tri()
    {
        $jeux = Jeu::paginate(15);
        return view('jeu.index', ['jeux' => $jeux]);
    }

    public function recherche(Request $request) {
        if ($request->nbjoueurs == null or $request->duree == null) return Redirect::route('jeu_index');
        $jeux = Jeu::all()->where('nombre_joueurs', $request->nbjoueurs)->where('duree', $request->duree);
        return view('jeu.recherche', ['jeux' => $jeux]);
    }

}
