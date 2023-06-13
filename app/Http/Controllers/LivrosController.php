<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class LivrosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listar(){
        $livros = Livro::paginate(25);
        Paginator::useBootstrap();

        return view('livro.lista', compact('livros'));
    }

    public function create(){
        return view('livro.formulario');
    }

    public function store(Request $request){
        $livro = new Livro();
        $livro->fill($request->all());
        if ($livro->save()){
            $request->session()->flash('mensagem_sucesso', "Livro salvo!");
        } else {
            $request->session()->flash('mensagem_erro', 'Deu erro');
        }
        return Redirect::to('livro/create');
    }

    public function update(Request $request, $livro_id){
        $livro = Livro::findOrFail($livro_id);
        $livro->fill($request->all());
        if ($livro->save()){
            $request->session()->flash('mensagem_sucesso', "Livro alterado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Deu erro');
        }
        return Redirect::to('livro/'.$livro->id);
    }

    public function show($id){
        $livro = Livro::findOrFail($id);
        return view('livro.formulario', compact('livro'));
    }

    public function deletar(Request $request, $livro_id){
        $livro = Livro::findOrFail($livro_id);
        $livro->delete();
        $request->session()->flash('mensagem_sucesso',
            'Livro removido com sucesso');
            return Redirect::to('livro');
        }

    }
