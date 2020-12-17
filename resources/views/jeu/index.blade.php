@extends("base")

@section('title', 'Liste des jeux')

@section('content')

    <h1 style="margin-top: 3%; font-weight: bold; " class="text-center">Tous les jeux de la super ludotheque de l'IUT de Lens</h1><br>
    @auth
        <div style="margin-left: 2%;" class="card-body">
            <div class="card-title">Recherche</div>
            <form name="form-create-jeu" method="post" action="{{ URL::route('jeu_recherche') }}">
                @csrf
                <div class="form-group">
                    <label for="nom">Nombre de joueur</label>
                    <input type="text" id="nbjoueurs" name="nbjoueurs" value="{{ old('nbjoueurs') }}" class="form-control">
                </div>
                <div class="form-group">
                    <select name="duree" id="duree" size="1">

                        @foreach( \App\Models\Jeu::all() as $duree)
                            <option value="{{ $duree->duree }}" selected>{{ $duree->duree }}</option>
                        @endforeach
                    </select>
                </div>
                <button style="background-color:#8E7CC3; border-color: #8E7CC3;" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @endauth

    <div style="margin-bottom: 3%;" class="row col-12">
        <div class="center col-12">
            <div style="margin-bottom: 2%;">
                <a style="margin-left: 2%; background-color:#E06666; border-color: #E06666;" class="row btn btn-success" href="{{ URL::route('jeu_create') }}">Ajouter un jeu</a>
                <a style="margin-left: 2%; background-color:#E06666; border-color: #E06666;" class="row btn btn-success" href="{{ URL::route('jeu_index', $sort) }}">Trier par nom @if ($filter !== null)<i class="fas  @if ($sort == 0)fa-sort-down @else fa-sort-up @endif "></i> @endif</a>
            </div>
        </div>
        <div class="card-columns center">
            <div style="background-color:#8E7CC3; padding-top: 2%; color:whitesmoke; box-shadow: 2px 2px 2px #8E7CC3;" class="card">
                <form name="form-create-jeu" method="post" action="{{route('jeu_triediteur')}}">
                    @csrf
                    <div style="margin-left: 2%;">
                        <h3 style="text-align:center;">Choix d'un éditeur</h3>
                        <select style="color:black;" class="col-10" name="ide_editeur" id="ide_editeur" size="1">
                            @foreach( \App\Models\Editeur::all() as $editeur)
                                @if (old('ide_editeur') == $editeur->id)
                                    <option value="{{ $editeur->id }}" selected>{{ $editeur->nom }}</option>
                                @else
                                    <option value="{{ $editeur->id }}">{{ $editeur->nom }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button style="background-color:whitesmoke; border-color: black; color:black; font-size:12px; margin: 2%;" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <div style="background-color:#8E7CC3; padding-top: 2%; color:whitesmoke; box-shadow: 2px 2px 2px #8E7CC3;" class="card">
                <form name="form-create-jeu" method="post" action="{{route('jeu_tritheme')}}">
                    @csrf
                    <div style="margin-left: 2%;">
                        <h3 style="text-align:center;">Choix d'un thème</h3>
                        <select style="color:black;" class="col-10" name="theme_id" id="theme_id" size="1">
                            @foreach( \App\Models\Theme::all() as $theme)
                                @if (old('theme_id') == $theme->id)
                                    <option value="{{ $theme->id }}" selected>{{ $theme->nom }}</option>
                                @else
                                    <option value="{{ $theme->id }}">{{ $theme->nom }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button style="background-color:whitesmoke; border-color: black; color:black; font-size:12px; margin: 2%;" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <div style="background-color:#8E7CC3; padding-top: 2%; color:whitesmoke; box-shadow: 2px 2px 2px #8E7CC3;" class="card">
                <form name="form-create-jeu" method="post" action="{{route('jeu_trimecanique')}}">
                    @csrf
                    <div style="margin-left: 2%;">
                        <h3 style="text-align:center;">Choix d'un mécanisme</h3>
                        <select style="color:black;" class="col-10" name="mecanique_id" id="mecanique_id" size="1">
                            @foreach( \App\Models\Mecanique::all() as $mecanique)
                                @if (old('mecanique_id') == $mecanique->id)
                                    <option value="{{ $mecanique->id }}" selected>{{ $mecanique->nom }}</option>
                                @else
                                    <option value="{{ $mecanique->id }}">{{ $mecanique->nom }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button style="background-color:whitesmoke; border-color: black; color:black; font-size:12px; margin: 2%;" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row col-12">
            <div class="card-columns">
        @foreach ($jeux as $jeu)
                <div class="card">
                    <img src="" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $jeu->nom }}</h5>
                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit($jeu->description, 50, $end='...') }}<br/>
                        <hr>
                        {{ $jeu->theme}}
                        <hr>
                        durée : {{ $jeu->duree }}
                        <hr>
                        Nombre de joueur : {{ $jeu->nombre_joueurs }}

                        <a style="background-color:#8E7CC3; border-color: #8E7CC3;" href="{{ URL::route('jeu_show', $jeu->id) }}" class="btn btn-primary">Plus d'info</a>
                    </div>
                </div>
                
            @endforeach
        </div>
    </div>
    <br>
    {{$jeux->links()}}

    <br>
@endsection
