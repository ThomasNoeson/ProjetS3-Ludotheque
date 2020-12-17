@extends("base")

@section('title', 'Liste des jeux')

@section('content')

    <h1 class="text-center">Tous les jeux de la super ludotheque de l'IUT de Lens</h1><br>
    <div class="row">
        <div>
            <div>
                <a style="margin-left: 2%;" class="btn btn-success" href="{{ URL::route('jeu_create') }}">Ajouter un jeu</a>
            </div>
            <br>
            <div>
                <a style="margin-left: 2%;" href="{{ URL::route('jeu_index', $sort) }}">Trié par nom @if ($filter !== null)<i class="fas  @if ($sort == 0)fa-sort-down @else fa-sort-up @endif "></i> @endif</a>
            </div>
            <br>



            <form name="form-create-jeu" method="post" action="{{route('jeu_triediteur')}}">
                @csrf
            <div style="margin-left: 2%;">
                <h3>Choix de l'éditeur</h3>
                <select name="ide_editeur" id="ide_editeur" size="1">
                    @foreach( \App\Models\Editeur::all() as $editeur)
                        @if (old('ide_editeur') == $editeur->id)
                            <option value="{{ $editeur->id }}" selected>{{ $editeur->nom }}</option>
                        @else
                            <option value="{{ $editeur->id }}">{{ $editeur->nom }}</option>
                        @endif
                    @endforeach
                </select><br>
            </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <br>
            <form name="form-create-jeu" method="post" action="{{route('jeu_tritheme')}}">
                @csrf
            <div style="margin-left: 2%;">
                <h3>Choix du thème</h3>
                <select name="theme_id" id="theme_id" size="1">
                    @foreach( \App\Models\Theme::all() as $theme)
                        @if (old('theme_id') == $theme->id)
                            <option value="{{ $theme->id }}" selected>{{ $theme->nom }}</option>
                        @else
                            <option value="{{ $theme->id }}">{{ $theme->nom }}</option>
                        @endif
                    @endforeach
                </select><br>
            </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <br>

            <form name="form-create-jeu" method="post" action="{{route('jeu_trimecanique')}}">
                @csrf
                <div style="margin-left: 2%;">
                    <h3>Choix du mécanisme</h3>
                    <select name="mecanique_id" id="mecanique_id" size="1">
                        @foreach( \App\Models\Mecanique::all() as $mecanique)
                            @if (old('mecanique_id') == $mecanique->id)
                                <option value="{{ $mecanique->id }}" selected>{{ $mecanique->nom }}</option>
                            @else
                                <option value="{{ $mecanique->id }}">{{ $mecanique->nom }}</option>
                            @endif
                        @endforeach
                    </select><br>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <br>
        </div>

    </div>
    <div class="row ">


        @foreach ($jeux as $jeu)
            <div style="margin-left: 2%;" class="col-4" >
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

                        <a href="{{ URL::route('jeu_show', $jeu->id) }}" class="btn btn-primary">Plus d'info</a>
                    </div>
                </div>
            </div>
    </div>

    @endforeach


@endsection
