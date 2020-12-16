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
    <ul>
        <li>{{$j->nom}}</li>
        <a href="{{route('jeux.show',[$j->id])}}"
           class="bg-blue-400 cursor-pointer rounded p-1 mx-1 text-white">
            Plus d'infos
        </a>
    </ul>
@endforeach
</body>
</html>
