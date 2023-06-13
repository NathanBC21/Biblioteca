@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Lista de Livros
                        <a href="{{ url('livro/create') }}" class="btn btn-success btn-sm float-end">
                            Novo Livro
                        </a>
                    </div>
                    <div class="card-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">
                                {{ Session::get('mensagem_sucesso') }}
                            </div>
                        @endif
                        <table class="table table-sm table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Titulo</th>
                                    <th>Autor</th>
                                    <th>Ano de Publicação</th>
                                    <th>Quantidade de Páginas</th>
                                    <th>Edição</th>
                                    <th>Editora</th>
                                    <th>Ano da Edição</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($livros as $livro)
                                    <tr>
                                        <td>{{ $livro->id }}</td>
                                        <td>{{ $livro->titulo }}</td>
                                        <td>{{ $livro->autor }}</td>
                                        <td>{{ $livro->ano_publicacao }}</td>
                                        <td>{{ $livro->quantidade_paginas }}</td>
                                        <td>{{ $livro->edicao }}</td>
                                        <td>{{ $livro->editora }}</td>
                                        <td>{{ $livro->ano_edicao }}</td>
                                        <td>{{ $livro->valor }}</td>
                                        <td>
                                            <a href="{{ url('livro/' . $livro->id) }}" class="btn btn-primary btn-sm">
                                                Editar
                                            </a>
                                            {!! Form::open(['method' => 'DELETE', 'url' => 'livro/' . $livro->id, 'style' => 'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9">
                                            Não há itens para listar!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center">
                            {{ $livros->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
