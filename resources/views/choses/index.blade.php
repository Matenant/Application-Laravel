@extends('layouts.app')

@section('content')
<a href="{{ route('choses.create') }}" class="btn btn-primary mb-3">Nouvel objet</a>
<a href="{{ route('tags.index') }}" class="btn btn-primary mb-3">Gestion des tags</a>

<form action="{{ route('choses.index') }}" method="GET">
    @csrf
    <div class="input-group mb-3">
        <input name="recherche" type="text" class="form-control" placeholder="Tapez quelque chose">
        <button type="submit" class="btn btn-outline-primary">Rechercher</button>
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Emplacement</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Tags</th>
        </tr>
    </thead>
    <tbody>
        @foreach($choses as $chose)
        <tr>
            <th scope="row">{{$chose->id}}</th>
            <td><a href="/choses/{{$chose->id}}">{{$chose->name}}</a></td>
            <td>{{$chose->getParentLieu()}}</td>
            <td>{{$chose->getParentCategorie()}}</td>
            <td>{{$chose->getTags()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection