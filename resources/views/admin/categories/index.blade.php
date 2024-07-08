@extends('adminlte::page')

@section('title', 'Listagem de Categorias')

@section('content_header')
    <h1>
        <a href="{{ route('categories.create') }}" class="btn btn-success">Add</a>
        Categorias
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('categories.index') }}" class="active">Categorias</a></li>
    </ol>
@stop

@section('content')
   

        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Status</th>
                            <th width="150px" scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->categorie }}</td>
                            <td>{{ $category->status }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="badge bg-yellow">
                                    Editar
                                </a>
                                <a href="{{ route('categories.show', $category->id) }}" class="badge bg-primary">
                                    Detalhes
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if (isset($data))
                    {!! $categories->appends($data)->links() !!}
                @else
                    {!! $categories->links() !!}
                @endif

            </div>
        </div>
    </div>
@stop