
<div class="form-group">
    @csrf
    <div class="mb-3">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Rentrez un nom" value="{{old('name') ?? $chose->name}}">
        @error('name')
            <div class="invalid-feedback">
                {{$errors->first('name')}}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <select class="custom-select @error('lieu_id') is-invalid @enderror" name="lieu_id" value="{{old('lieu_id') ?? $chose->lieu_id}}">
            @foreach ($lieux as $lieu)
                <option value="{{$lieu->id}}" {{$chose->lieu_id == $lieu->id ? 'selected' : ''}}>{{$lieu->getParent()}}</option>
            @endforeach
                <option value="0" {{$chose->lieu_id == 0 ? 'selected' : ''}}>Aucun lieu</option>
        </select>
        @error('lieu_id')
            <div class="invalid-feedback">
                {{$errors->first('lieu_id')}}
            </div>
        @enderror
    </div>


    <div class="mb-3">
        <select class="custom-select @error('categorie_id') is-invalid @enderror" name="categorie_id" value="{{old('categorie_id') ?? $chose->categorie_id}}">
            @foreach ($categories as $categorie)
                <option value="{{$categorie->id}}" {{$chose->categorie_id == $categorie->id ? 'selected' : ''}}>{{$categorie->getParent()}}</option>
            @endforeach
                <option value="0" {{$chose->categorie_id == 0 ? 'selected' : ''}}>Aucune catégorie</option>
        </select>
        @error('categorie_id')
            <div class="invalid-feedback">
                {{$errors->first('categorie_id')}}
            </div>
        @enderror
    </div>

    @for($i = 0; $i < 3; $i++)
        @php
            $name = "name".($i+1);
            if(isset($chose->tags[$i])) {
                $select = $chose->tags[$i]->id;
            }
            else{
                $select = 0;
            }
        @endphp
        <div class="input-group mb-3">
            <select class="custom-select" name={{$name}}>
                    <option value="0" {{$select == 0 ? 'selected' : ''}}>Aucun Tag</option>
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}" {{$select == $tag->id ? 'selected' : ''}}>{{$tag->name}}</option>
                @endforeach
            </select>
        </div>
    @endfor
</div>


