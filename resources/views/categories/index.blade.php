@extends('layouts.app')

@section('content')
<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Nouvelle catégorie</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $categorie)
        <tr>
            <th scope="row">{{$categorie->id}}</th>

            <td><a href="/categories/{{$categorie->id}}">{{$categorie->getParent()}}</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection