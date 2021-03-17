@extends('layouts.app')

@section('content')
<a href="/choses/{{$chose->id}}/edit" class="btn btn-secondary my-3">Editer</a>
<form action="/choses/{{$chose->id}}" method="POST" style="display: inline">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger">Supprimer</button>
</form>
<hr>
<p><strong>Nom de l'objet : </strong>{{$chose->name}}</p>
<p><strong>Lieu de l'objet : </strong>{{$chose->getParentLieu()}}</p>
<p><strong>Catégorie de l'objet : </strong>{{$chose->getParentCategorie()}}</p>
<p><strong>Tags de l'objet : </strong>{{$chose->getTags()}}</p>
@endsection
