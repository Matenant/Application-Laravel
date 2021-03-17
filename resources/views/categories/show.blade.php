@extends('layouts.app')

@section('content')
<a href="/categories/{{$categorie->id}}/edit" class="btn btn-secondary my-3">Editer</a>
<form action="/categories/{{$categorie->id}}" method="POST" style="display: inline">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger">Supprimer</button>
</form>
<hr>

<p><strong>Nom de la catégorie : </strong>{{$categorie->name}}</p>
<p><strong>Parent de la catégorie :</p></strong>
<ul>
    {{-- Affichage des parents en liste --}}
    @while ($categorie->parent_id != 0)
        @php
            $categorie = $categorie->parent;
        @endphp
            <li>{{$categorie->name}}</li>
    @endwhile
</ul>

@endsection
