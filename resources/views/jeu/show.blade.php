@extends("base")

@section('title', 'Détail du jeu')

@section('content')

    <div class="row justify-content-center">
        <div class="col-6 ">
            <div class="card">
                <img src="{{ url($jeu->url_media) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $jeu->nom }}</h5>
                    <p class="card-text">
                    {{ $jeu->description }}
                    <hr>
                    {{ $jeu->theme->nom }}
                    <hr>
                    @foreach ( $jeu->mecaniques as $key => $mecaniques)
                        @if ($key !== 0)
                            &nbsp;-&nbsp;
                        @endif
                        {{ $mecaniques->nom }}
                    @endforeach
                    <hr>
                        {{ $jeu->categorie }}
                    <hr>
                        Age recommandé : {{ $jeu->age }}
                    <hr>
                        {{ $jeu->langue }}
                    <hr>
                        {{ $jeu->theme->nom }}
                    <hr>
                        Edité par {{ $jeu->editeur->nom }}
                    <hr>
                        durée : {{ $jeu->duree }}
                    <hr>
                        Nombre de joueur : {{ $jeu->nombre_joueurs }}
                    <hr>
                        Note max : {{ $max }}
                    <hr>
                        Note min : {{ $min }}
                    <hr>
                        Nombre de commentaire du jeu: {{ $nbCom }}
                    <hr>
                        Nombre total de commentaire: {{ $nbTot }}
                    <hr>
                        Moyenne du jeu: {{ $moy }}
                    </p>
                    <hr><hr>
                    <br>
                    Informations supplémentaires sur le tarif:
                    <hr>
                    Prix moyen du jeu : {{$PrixMoyen}}
                    <hr>
                    Prix le plus haut : {{$PrixHaut}}
                    <hr>
                    Prix le plus bas : {{$PrixBas}}
                    <hr>
                    Nombre d'utilisateur qui possèdent ce jeu : {{$UtilisateurAchete}}
                    <hr>
                    Le nombre total d'utilisateurs du site : {{$NbUtilisateur}}
                    <hr>
                    <br>

                        <a href="{{ URL::route('jeu_rules', $jeu->id) }}" class="btn btn-primary">Regarder les régles du jeu</a>
                    <hr><hr>
                </div>
            </div>
        </div>
    </div>
                    <br>
    <h1>Commentaires:</h1>

    @auth
        <div class="card-body">
            <form name="Avis" method="post" action="{{ URL::route('jeu_store') }}">
                <div class="form-group">
                    <label for="description">Avis</label>
                    <div>
                        <textarea name="description" class="form-control" required="">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div>
                </div>
                <div class="form-group">
                    <label for="description">Note</label>
                    <select name="Note">
                        <option value="{{ 0 }}" selected>{{ "0/5" }}</option>
                        <option value="{{ 1 }}" selected>{{ "1/5" }}</option>
                        <option value="{{ 2 }}" selected>{{ "2/5" }}</option>
                        <option value="{{ 3 }}" selected>{{ "3/5" }}</option>
                        <option value="{{ 4 }}" selected>{{ "4/5" }}</option>
                        <option value="{{ 5 }}" selected>{{ "5/5" }}</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @endauth

        <br>
        @foreach ( $coms as $c)
            @if ($jeu->id == $c->jeu_id)
                <ul>
                    <li>Auteur: {{$users->find($c->user_id)->name}}</li>
                    <li>Commentaire: {{$c->commentaire}}</li>
                    @if ($c->note == 0)
                        <li style="background-color:red; border: 2px red solid; margin-right: 90%; text-align: center; color:black;">Note: {{$c->note}}</li>
                    @endif
                    @if ($c->note == 1)
                        <li style="background-color:orangered; border: 2px orangered solid; margin-right: 90%; text-align: center; color:black;">Note: {{$c->note}}</li>
                    @endif
                    @if ($c->note == 2)
                    <li style="background-color:orange; border: 2px orange solid; margin-right: 90%; text-align: center; color:black;">Note: {{$c->note}}</li>
                    @endif
                    @if ($c->note == 3)
                    <li style="background-color:yellow; border: 2px yellow solid; margin-right: 90%; text-align: center; color:black;">Note: {{$c->note}}</li>
                    @endif
                    @if ($c->note == 4)
                    <li style="background-color:greenyellow; border: 2px greenyellow solid; margin-right: 90%; text-align: center; color:black;">Note: {{$c->note}}</li>
                    @endif
                    @if ($c->note == 5)
                    <li style="background-color:green; border: 2px green solid; margin-right: 90%; text-align: center; color:black;">Note: {{$c->note}}</li>
                    @endif
                    <li>{{(date_diff(new \DateTime(), new DateTime($c->date_com)))->format("Il y a %D jour(s), %M mois, %Y an(s)")}} </li>
                </ul>
                <br>
            @endif
        @endforeach
    </div>
    <a href="{{ URL::route('jeu_index') }}" class="btn btn-secondary">Retour à la liste des jeux</a>
@endsection

