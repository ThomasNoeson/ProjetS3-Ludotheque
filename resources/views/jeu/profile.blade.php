@extends("base")

@section('title', 'profil')

@section('content')

    <h1 class="text-center">Informations de l'utilisateur: </h1><br>
    <p>Nom: {{\Illuminate\Support\Facades\Auth::user()->name}}</p>
    <p>email: {{\Illuminate\Support\Facades\Auth::user()->email}}</p>
    <h1>Formulaire d'ajout:</h1>
    <form name="form-create-jeu" method="post" action="{{ URL::route('ajout') }}">
        @csrf
        <div class="form-group">
            <label for="description">Jeu</label>
            <select name="jeu" id="jeu">
                @foreach( \App\Models\Jeu::all() as $j)
                    <option value="{{$j -> id}}">{{ $j->nom }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="nom">Prix</label>
            <input type="text" id="prix" name="prix" value="{{ old('prix') }}" class="form-control" required="">
        </div>
        <br>
        <br>
        <div class="form-group">
            <label for="nom">Lieu</label>
            <input type="text" id="lieu" name="lieu" value="{{ old('lieu') }}" class="form-control" required="">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    <div>
        <h1>Mes jeux: </h1>
        <br>
        @foreach(\App\Models\Achat::all() as $a)
            @if($a->user_id == \Illuminate\Support\Facades\Auth::user()->id)
                <ul>
                    <li>Jeu: {{\App\Models\Jeu::find($a->jeu_id)->nom}}</li>
                    <li>Prix: {{$a->prix}}</li>
                    <li>Date d'achat: {{ (new DateTime($a->date_achat))->format("D-M-Y")}}</li>
                </ul>
                <br>
            @endif
        @endforeach
    </div>


@endsection
