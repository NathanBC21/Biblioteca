<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Livro;
use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class EmprestimosController extends Controller
{

    public function _construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $emprestimos = Emprestimo::with('livro')->with('cliente')->paginate(25);
        Paginator::useBootstrap();

        return view('emprestimo.lista', compact('emprestimos'));
    }

    public function create()
    {
        $livros = Livro::select('titulo', 'id')->pluck('titulo','id');
        $clientes = Cliente::select('nome','id')->pluck('nome','id');
        return view('emprestimo.formulario', compact('livros','clientes'));
    }

    public function store(Request $request,Emprestimo $emprestimo)
    {
        $emprestimo = new Emprestimo();
        $emprestimo->fill($request->all());
        if ($emprestimo->save()){
            $livros = 'mensagem_sucesso';
            $clientes = 'mensagem_sucesso';
            $msg = "Emprestimo salvo!";
        } else {
            $livros = 'mensagem_erro';
            $clientes = 'mensagem_erro';
            $msg = 'Deu erro';
        }
        return Redirect::to('emprestimo/create')->with($livros, $msg)->with($clientes, $msg);
    }

    public function show(Emprestimo $emprestimo)
    {
        $emprestimo = Emprestimo::findOrFail($emprestimo->id);
        $livros = Livro::select('titulo','id')->pluck('titulo', 'id');
        $clientes = Cliente::select('nome', 'id')->pluck('nome', 'id');
        return view('emprestimo.formulario', compact('livros', 'clientes', 'emprestimo'));

    }

    public function edit(Emprestimo $emprestimo)
    {
        //
    }

    public function update(Request $request, Emprestimo $emprestimo)
    {
        $emprestimo = Emprestimo::findOrFAil($emprestimo->id);
        $emprestimo->fill($request->all());
        if ($emprestimo->save()){
            $livros = 'mensagem_sucesso';
            $clientes = 'mensagem_sucesso';
            $msg = "Emprestimo alterado!";
        } else {
            $livros = 'mensagem_erro';
            $clientes = 'mensagem_erro';
            $msg = 'Deu erro';
        }
        return Redirect::to('emprestimo/'.$emprestimo->id)
                    ->with($livros, $msg)->with($clientes, $msg);
    }

    public function destroy(Emprestimo $emprestimo)
    {
        $emprestimo = Emprestimo::findOrFAil($emprestimo->id);
        if ($emprestimo->delete()){
            $livros = 'mensagem_sucesso';
            $clientes = 'mensagem_sucesso';
            $msg = "Emprestimo removido!";
        } else {
            $livros = 'mensagem_erro';
            $clientes = 'mensagem_erro';
            $msg = 'Deu erro';
        }
        return Redirect::to('emprestimo')
            ->with($livros, $msg)->with($clientes, $msg);
    }

    public function devolver($emprestimo_id){
        $emprestimo = Emprestimo::findOrFail($emprestimo_id);
        $emprestimo->devolucao = Carbon::now('America/Sao_Paulo');
        if ($emprestimo->save()){
            $tipo = 'mensagem_sucesso';
            $msg = 'Emprestimo alterado!';
        }
        else{
            $tipo = 'mensagem_erro';
            $msg = 'Deu erro!';
        }
        return Redirect::to('emprestimo')->with($tipo, $msg);
    }

}
