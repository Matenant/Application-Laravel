@extends('layouts.app')

@section('content')
<form action="{{ route('lieux.update', ['lieu' => $lieu->id]) }}" method="POST">
    @method('PATCH')
    @include('includes.formLieu')
    <button type="submit" class="btn btn-primary">Sauvegarder les informations</button>
</form>
@endsection