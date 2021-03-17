@extends('layouts.app')

@section('content')
<form action="{{ route('choses.store') }}" method="POST">
    @include('includes.form')
    <button type="submit" class="btn btn-primary">Ajouter une chose</button>
</form>
@endsection
