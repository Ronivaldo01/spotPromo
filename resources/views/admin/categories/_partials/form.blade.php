@csrf
<div class="form-group">
    <input type="text" value="{{ $category->categorie ?? old('categorie') }}" name="categorie" class="form-control" placeholder="Categoria">
</div>
<div class="form-group">
    <input type="text" value="{{ $category->status ?? old('status') }}" name="status" class="form-control" placeholder="Status">
</div>
<div class="form-group">
    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Descrição">{{ $category->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>