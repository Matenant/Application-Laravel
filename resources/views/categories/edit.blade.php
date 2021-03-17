@extends('layouts.app')

@section('content')

<form action="{{ route('categories.update', $categorie->id) }}" method="POST">
    @method('PATCH')
    @include('includes.formCategorie')
    <button type="submit" class="btn btn-primary">Sauvegarder les informations</button>
</form>
@endsection