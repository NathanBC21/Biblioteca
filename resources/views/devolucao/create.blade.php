<!-- resources/views/devolucoes/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Devolução</h1>

    <p>
        <strong>Nome da pessoa:</strong> {{ $emprestimo->cliente->nome }} {{ $emprestimo->cliente->sobrenome }}<br>
        <strong>Nome do livro:</strong> {{ $emprestimo->livro->titulo }}<br>
        <strong>Valor do livro:</strong> R$ {{ $emprestimo->livro->valor }}<br>
        <strong>Data do empréstimo:</strong> {{ \Carbon\Carbon::parse($emprestimo->data_emprestimo)->format('d/m/Y') }}<br>
        <strong>Quantidade de dias emprestado:</strong> {{ $emprestimo->quantidade_dias }} dias<br>
    </p>

    <form action="{{ route('devolucoes.store', $emprestimo) }}" method="post">
        @csrf
        <button type="submit">Devolver</button>
    </form>
@endsection
