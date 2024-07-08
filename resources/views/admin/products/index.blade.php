@extends('adminlte::page')

@section('title', 'Listagem de Produtos')

@section('content_header')

    <h1>
        <a href="{{ route('products.create') }}" class="btn btn-success">Add</a>
        Produtos
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('products.index') }}" class="active">Produtos</a></li>
    </ol>
@stop

@section('content')
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Descrição</th>
                            <th width="150px" scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->product }}</th>
                            <td>{{ $product->category->categorie }}</td>
                            <td>R$ </td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="badge bg-yellow">
                                    Editar
                                </a>
                                <a href="{{ route('products.show', $product->id) }}" class="badge bg-primary">
                                    Detalhes
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if (isset($filters))
                    {!! $products->appends($filters)->links() !!}
                @else
                    {!! $products->links() !!}
                @endif

            </div>
        </div>
    </div>
@stop