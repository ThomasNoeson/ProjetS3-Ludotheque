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
                    </p>
                    <hr><hr>
                        <a href="{{ URL::route('jeu_rules', $jeu->id) }}" class="btn btn-primary">Regarder les régles du jeu</a>
                    <hr><hr>
                </div>
            </div>
        </div>
        <h1>Commentaires:</h1>
        <br>
        @foreach ( $coms as $c)
            @if ($jeu->id == $c->jeu_id)
                <ul>
                    <li>Auteur: {{$users->find($c->user_id)->name}}</li>
                    <li>Commentaire: {{$c->commentaire}}</li>
                    <li>Note: {{$c->note}}</li>
                    <li>{{(date_diff(new \DateTime(), new DateTime($c->date_com)))->format("Il y a %D jour(s), %M mois, %Y an(s)")}} </li>
                </ul>
                <br>
            @endif
        @endforeach
    </div>
    <a href="{{ URL::route('jeu_index') }}" class="btn btn-secondary">Retour à la liste des jeux</a>
@endsection

