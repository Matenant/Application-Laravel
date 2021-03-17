
<div class="form-group">
    @csrf
    <input type="text" class="mb-3 form-control @error('name') is-invalid @enderror" name="name" placeholder="Rentrez un nom" value="{{ old('name') ?? $lieu->name }}">
    @error('name')
        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>
    @enderror
    <select class="mb-3 custom-select @error('parent_id') is-invalid @enderror" name="parent_id" value="{{old('parent_id') ?? $lieu->parent_id}}">

        @foreach ($lieux as $tempLieu)
            {{-- On enlève tous les lieux en lien avec celui que l'on modifie --}}
            @if ($lieu->estPareil($tempLieu) == false)
                <option value="{{$tempLieu->id}}" {{$lieu->parent_id == $tempLieu->id ? 'selected' : ''}}>{{$tempLieu->getParent()}}</option>
            @endif
        @endforeach
        <option value="0" {{$lieu->parent_id == 0 ? 'selected' : ''}}>Aucun lieu parent</option>
    </select>
    @error('parent_id')
        <div class="invalid-feedback">
            {{$errors->first('parent_id')}}
        </div>
    @enderror
</div>
