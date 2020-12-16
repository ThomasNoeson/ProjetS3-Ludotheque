{{--
   messages d'erreurs dans la saisie du formulaire.
--}}


@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{--
     formulaire de saisie d'une tâche
     la fonction 'route' utilise un nom de route
     'csrf_field' ajoute un champ caché qui permet de vérifier
       que le formulaire vient du serveur.
  --}}

<form action="{{route('jeux.store')}}" method="POST">
    {!! csrf_field() !!}
    <h1 class="blanc">Formulaire d'ajout d'un jeu</h1>
    <div>
        <label>Nom</label>
        <input type="text" class="form-control" id="nom" name="nom">
    </div>
    <div>
        <label>Description</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <div>
        <label>Thème</label>
        <input type="text" class="form-control" id="theme">
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
    <div>
        <label>User_id</label>
        <input type="text" class="form-control" id="user">
    </div>
    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
</form>


