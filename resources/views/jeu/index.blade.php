<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Jeux</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
@foreach($jeux as $j)
<<<<<<< HEAD
    <ul>
        <li>{{$j->nom}}</li>
        <a href="{{route('jeux.show',[$j->id])}}"
           class="bg-blue-400 cursor-pointer rounded p-1 mx-1 text-white">
            Plus d'infos
        </a>
    </ul>
=======
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
>>>>>>> 7213f8481ed0c494ecc665b3eb340128dfb33476
@endforeach
</body>
</html>
