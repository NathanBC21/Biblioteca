<!-- resources/views/devolucoes/pdf.blade.php -->

<h1>Devolução</h1>

<p>
    <strong>Nome da pessoa:</strong> {{ $devolucao->emprestimo->cliente->nome }} {{ $devolucao->emprestimo->cliente->sobrenome }}<br>
    <strong>Nome do livro:</strong> {{ $devolucao->emprestimo->livro->titulo }}<br>
    <strong>Valor do livro:</strong> R$ {{ $devolucao->emprestimo->livro->valor }}<br>
    <strong>Data do empréstimo:</strong> {{ $devolucao->emprestimo->data_emprestimo->format('d/m/Y') }}<br>
    <strong>Quantidade de dias emprestado:</strong> {{ $devolucao->emprestimo->quantidade_dias }} dias<br>
    <strong>Multa a ser paga:</strong> R$ {{ $devolucao->multa ?? '0,00' }}<br>
</p>
