@extends('layouts.app')

@section('content')
<form action="{{ route('tags.store') }}" method="POST">
    @include('includes.formTag')
    <button type="submit" class="btn btn-primary">Ajouter un tag</button>
</form>
@endsection