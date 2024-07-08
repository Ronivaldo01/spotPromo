<div class="form-group">
    <input type="text" name="product" placeholder="Produto" class="form-control" value="{{ $product->product ?? old('product') }}">
</div>
<div class="form-group">
    <input type="text" name="description" placeholder="Descrição" class="form-control" value="{{ $product->description ?? old('description') }}">
</div>
<div class="form-group">
    <input type="text" name="price" placeholder="Preço" class="form-control" value="">
</div>
<div class="form-group">
    <select name="category_id" class="form-control">
        <option value="">Escolha</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                @if (isset($product->category_id) && $product->category_id == $category->id) selected @endif
                >{{ $category->categorie }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <textarea name="description" class="form-control" cols="30" rows="10">{{ $product->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>