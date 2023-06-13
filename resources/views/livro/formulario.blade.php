@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados do Livro
                        <a href="{{ url('livro') }}" class="btn btn-success btn-sm float-end">
                            Listar Livros
                        </a>
                    </div>
                    <div class="card-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">
                                {{ Session::get('mensagem_sucesso') }}
                            </div>
                        @endif
                        @if(Session::has('mensagem_erro'))
                            <div class="alert alert-danger">
                                {{ Session::get('mensagem_erro') }}
                            </div>
                        @endif

                        @if(Route::is('livro.show'))
                            {!! Form::model($livro,
                                            ['method'=>'PATCH',
                                            'url'=>'livro/'.$livro->id]) !!}
                        @else
                            {!! Form::open(['method'=>'POST', 'url'=>'livro']) !!}
                        @endif
                        {!! Form::label('titulo', 'Titulo') !!}
                        {!! Form::input('text', 'titulo',
                                        null,
                                        ['class'=>'form-control',
                                         'placeholder'=>'Titulo',
                                         'required',
                                         'maxlength'=>50,
                                         'autofocus']) !!}
                        {!! Form::label('autor', 'Autor') !!}
                        {!! Form::input('text', 'autor',
                                        null,
                                        ['class'=>'form-control',
                                        'placeholder'=>'Autor',
                                        'required',
                                        'maxlength'=>150]) !!}
                        {!! Form::label('ano_publicacao', 'Ano de Publicação') !!}
                        {!! Form::input('integer', 'ano_publicacao',
                                        null,
                                        ['class'=>'form-control',
                                        'placeholder'=>'Ano de Publicação',
                                        'required',
                                        'maxlength'=>150]) !!}
                        {!! Form::label('quantidade_paginas', 'Quantidade de Páginas') !!}
                        {!! Form::input('integer', 'quantidade_paginas',
                                        null,
                                        ['class'=>'form-control',
                                        'placeholder'=>'Quantidade de Páginas',
                                        'required',
                                        'maxlength'=>150]) !!}
                        {!! Form::label('edicao', 'Edição') !!}
                        {!! Form::input('text', 'edicao',
                                        null,
                                        ['class'=>'form-control',
                                        'placeholder'=>'Edição',
                                        'required',
                                        'maxlength'=>150]) !!}
                        {!! Form::label('editora', 'Editora') !!}
                        {!! Form::input('text', 'editora',
                                        null,
                                        ['class'=>'form-control',
                                        'placeholder'=>'Editora',
                                        'required',
                                        'maxlength'=>150]) !!}
                        {!! Form::label('ano_edicao', 'Ano da Edição') !!}
                        {!! Form::input('integer', 'ano_edicao',
                                        null,
                                        ['class'=>'form-control',
                                        'placeholder'=>'Ano da Edição',
                                        'required',
                                        'maxlength'=>150]) !!}
                        {!! Form::label('valor', 'Valor') !!}
                        {!! Form::input('decimal', 'valor',
                                        null,
                                        ['class'=>'form-control',
                                        'placeholder'=>'Valor',
                                        'required',
                                        'maxlength'=>150]) !!}
                        {!! Form::submit('Salvar',
                                        ['class'=>'float-end btn btn-primary mt-3']) !!}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
