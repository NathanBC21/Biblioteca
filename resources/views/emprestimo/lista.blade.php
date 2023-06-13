@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Lista de Emprestimo
                        <a href="{{ url('emprestimo/create') }}" class="btn btn-success btn-sm float-end">
                            Novo Emprestimo
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
                                    <th>Livro</th>
                                    <th>Cliente</th>
                                    <th>Data de Emprestimo</th>
                                    <th>Quantidade de Dias</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($emprestimos as $emprestimo)
                                    <tr>
                                        <td>{{ $emprestimo->id }}</td>
                                        <td>{{ $emprestimo->livro->nome}}</td>
                                        <td>{{ $emprestimo->cliente->nome}}</td>
                                        <td>{{ $emprestimo->data_emprestimo }}</td>
                                        <td>{{ $emprestimo->quantidade_dias}}</td>

                                        <td>
                                            <a href="{{ url('emprestimo/' . $emprestimo->id) }}" class="btn btn-primary btn-sm">
                                                Editar
                                            </a>
                                            {!! Form::open(['method' => 'DELETE', 'url' => 'emprestimo/' . $emprestimo->id, 'style' => 'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                            {!! Form::close() !!}
                                            {!! Form::open(['method' => 'POST', 'url' => 'emprestimo/devolver/'. $emprestimo->id, 'style' => 'display:inline']) !!}
                                            <button type="submit" Class="btn btn-info btn-sm">Devolver</button>
                                            {!! Form::close()!!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            Não há itens para listar!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center">
                            {{ $emprestimos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
