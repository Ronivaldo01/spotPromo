<div class="form-group">
    {{ Form::text('product', null, ['placeholder' => 'Produto', 'class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::textarea('description', null, ['placeholder' => 'Descrição', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>