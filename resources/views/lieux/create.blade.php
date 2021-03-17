@extends('layouts.app')

@section('content')
<form action="{{ route('lieux.store') }}" method="POST">
    @include('includes.formLieu')
    <button type="submit" class="btn btn-primary">Ajouter un lieu</button>
</form>
@endsection
