@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados da Emprestimo
                        <a href="{{ url('emprestimo') }}" class="btn btn-success btn-sm float-end">
                            Listar Emprestimos
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

                        @if(Route::is('emprestimo.show'))
                            {!! Form::model($emprestimo,
                                            ['method'=>'PATCH',
                                            'url'=>'emprestimo/'.$emprestimo->id]) !!}
                        @else
                            {!! Form::open(['method'=>'POST', 'url'=>'emprestimo']) !!}
                        @endif
                        {!! Form::label('licro_id', "Livro") !!}
                        {!! Form::select('livro_id',
                                         $livros,
                                         null,
                                         ['class'=>'form-control',
                                         'placeholder'=>'Selecione o livro',
                                         'required',
                                         'autofocus']) !!}
                        {!! Form::label('cliente_id', "Cliente") !!}
                        {!! Form::select('cliente_id',
                                         $clientes,
                                         null,
                                         ['class'=>'form-control',
                                         'placeholder'=>'Selecione o cliente',
                                         'required']) !!}
                        {!! Form::label('data_emprestimo', 'Data do Emprestimo') !!}
                        {!! Form::input('date', 'data_emprestimo',
                                        null,
                                        ['class'=>'form-control',
                                        'placeholder'=>'Data de Emprestimo',
                                        'required']) !!}
                        {!! Form::label('quantidade_dias', 'Quantidade de Dias') !!}
                        {!! Form::input('numeric', 'quantidade_dias',
                                        null,
                                        ['class'=>'form-control',
                                        'placeholder'=>'Quantidade de Dias',
                                        'required']) !!}
                        {!! Form::submit('Salvar',
                                        ['class'=>'float-end btn btn-primary mt-3']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
