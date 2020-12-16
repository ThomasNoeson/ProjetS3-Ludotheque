<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Jeux</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
<ul>
@foreach($jeux as $j)

        <li>{{$j->nom}}</li>
</ul>
@endforeach
</body>
</html>
