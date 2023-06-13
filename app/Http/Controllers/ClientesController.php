<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes =  Cliente::paginate(25);
        Paginator::useBootstrap();
        return view('cliente.lista', compact('clientes'));
    }

    public function create()
    {
        return view('Cliente.formulario');
    }

    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->fill($request->all());
        if ($cliente->save()){
            $request->session()->flash('mensagem_sucesso', 'Cliente salvo');
        } else {
            $request->session()->flash('mensagem_erro', 'Deu Erro');
        }
        return Redirect::to('cliente/create');
    }

    public function show(Cliente $cliente)
    {
        $cliente = Cliente::findOrFail($cliente->id);
        return view('cliente.formulario', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {

    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente = cliente::findOrFail($cliente->id);
        $cliente->fill($request->all());
        if ($cliente->save()){
            $request->session()->flash('mensagem_sucesso', 'Cliente salvo');
        } else {
            $request->session()->flash('mensagem_erro', 'Deu Erro');
        }
        return Redirect::to('cliente/'.$cliente->id);

    }

    public function destroy(Cliente $cliente)
    {
        $cliente = Cliente::findOrFail($cliente->id);
        $cliente->delete();
        return Redirect::to('cliente');
    }
}
