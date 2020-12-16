<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Jeux</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
<a href="{{route('jeux.create')}}"
   class="bg-blue-400 cursor-pointer rounded p-1 mx-1 text-white">
    Ajouter un jeu
</a>
@foreach($jeux as $j)
        <ul>
            <li>{{$j->id}}</li>
            <li>{{$j->nom}}</li>
            <li>{{$j->url_media}}</li>
            <li>{{$j->description}}</li>
            <li>{{$j->nombre_joueurs}}</li>
            <li>{{$j->theme_id}}</li>
            <a href="{{route('jeux.show',[$j->id])}}"
            class="bg-blue-400 cursor-pointer rounded p-1 mx-1 text-white">
            Plus d'infos
            </a>
        </ul>
@endforeach
</body>
</html>
