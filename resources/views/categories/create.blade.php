@extends('layouts.app')

@section('content')
<form action="{{ route('categories.store') }}" method="POST">
    @include('includes.formCategorie')
    <button type="submit" class="btn btn-primary">Ajouter une catégorie</button>
</form>
@endsection
