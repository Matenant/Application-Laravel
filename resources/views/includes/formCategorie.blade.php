
<div class="form-group">
    @csrf
    <input type="text" class="mb-3 form-control @error('name') is-invalid @enderror" name="name" placeholder="Rentrez un nom" value="{{old('name') ?? $categorie->name}}">
    @error('name')
        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>
    @enderror

    <select class="mb-3 custom-select @error('parent_id') is-invalid @enderror" name="parent_id" value="{{old('parent_id') ?? $categorie->parent_id}}">
        @foreach ($categories as $tempCategorie)
            {{-- On enlève toutes les catégories en lien avec celle que l'on modifie --}}
            @if ($categorie->estPareil($tempCategorie) == false)
                <option value="{{$tempCategorie->id}}" {{$categorie->parent_id == $tempCategorie->id ? 'selected' : ''}}>{{$tempCategorie->getParent()}}</option>
            @endif
        @endforeach
            <option value="0" {{$categorie->parent_id == 0 ? 'selected' : ''}}>Aucune catégorie parent</option>
    </select>
    @error('parent_id')
        <div class="invalid-feedback">
            {{$errors->first('parent_id')}}
        </div>
    @enderror
</div>