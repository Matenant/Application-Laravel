<div class="form-group">
    @csrf
    <input name="name" type="text" class="form-control" placeholder="Tapez un tag">
    @error('name')
        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>
    @enderror
</div>