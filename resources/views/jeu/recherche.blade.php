@extends("base")

@section('title', 'Liste des jeux')

@section('content')

    <div class="card">
        @if($jeux->isEmpty())
            <p>Pas de resultats</p>
        @else
       @foreach($jeux as $j)
           <p>{{$j->nom}}</p>
        @endforeach
        @endif
    </div>

@endsection
