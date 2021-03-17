@extends('layouts.app')

@section('content')
<a href="/lieux/{{$lieu->id}}/edit" class="btn btn-secondary my-3">Editer</a>
<form action="/lieux/{{$lieu->id}}" method="POST" style="display: inline">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger">Supprimer</button>
</form>
<hr>
<p><strong>Nom du lieu : </strong>{{$lieu->name}}</p>
<p><strong>Parent du lieu :</p></strong>
<ul>
    {{-- Affichage des parents en liste --}}
    @while ($lieu->parent_id != 0)
        @php
            $lieu = $lieu->parent;
        @endphp
            <li>{{$lieu->name}}</li>
    @endwhile
</ul>
@endsection
