<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use Illuminate\Http\Request;

class DevolucoesController extends Controller
{
    public function create(Emprestimo $emprestimo)
    {
        return view('devolucoes.create', compact('emprestimo'));
    }

    public function store(Request $request, Emprestimo $emprestimo)
    {
        // Lógica para processar devolução e gerar o PDF
    }
}
