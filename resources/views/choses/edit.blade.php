@extends('layouts.app')

@section('content')
<form action="{{ route('choses.update', ['chose' => $chose->id]) }}" method="POST">
    @method('PATCH')
    @include('includes.form')
    <button type="submit" class="btn btn-primary">Sauvegarder les informations</button>
</form>
@endsection