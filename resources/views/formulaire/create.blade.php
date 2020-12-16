<html>
<head>
    <title>Formulaire - Marathon du Web 2020 - IUT de Lens</title>
    <meta charset="utf-8">
    <meta name="formulaire" content="Formulaire d'ajout d'un jeu">
    <link rel="stylesheet" href="{{url('style.css')}}">
</head>

<body>
    <h1 class="blanc">Formulaire d'ajout d'un jeu</h1>
    <div>
        <label>Nom</label>
        <input type="text" class="form-control" id="nom">
    </div>
    <div>
        <label>Description</label>
        <input type="text" class="form-control" id="description">
    </div>
    <div>
        <label>Thème</label>
        <select id="theme" class="form-control">
            <option selected>Choisir...</option>
            <option>VALUES</option>
            <option>VALUES</option>
        </select>
    </div>
    <div>
        <label>Éditeur</label>
        <select id="editeur" class="form-control">
            <option selected>Choisir...</option>
            <option>values</option>
            <option>values</option>
        </select>
    </div>
    <div>
        <label>Règles</label>
        <input type="text" class="form-control" id="regles">
    </div>
    <div>
        <label>Langages</label>
        <input type="text" class="form-control" id="langages">
    </div>
    <div>
        <label>Url_media</label>
        <input type="text" class="form-control" id="urlmedia">
    </div>
    <div>
        <label>Age</label>
        <input type="text" class="form-control" id="age">
    </div>
    <div>
        <label>Nombre de joueurs</label>
        <input type="text" class="form-control" id="nombrejoueurs">
    </div>
    <div>
        <label>Categorie</label>
        <input type="text" class="form-control" id="categorie">
    </div>
    <div>
        <label>Duree</label>
        <input type="text" class="form-control" id="duree">
    </div>

    <button type="submit" id="bouton">Ajoutez le jeu</button>
</body>
