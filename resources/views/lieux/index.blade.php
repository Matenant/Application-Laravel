@extends('layouts.app')

@section('content')
<a href="{{ route('lieux.create') }}" class="btn btn-primary mb-3">Nouveau lieu</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Lieu</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lieux as $lieu)
        <tr>
            <th scope="row">{{$lieu->id}}</th>
            <td><a href="/lieux/{{$lieu->id}}">{{$lieu->getParent()}}</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection