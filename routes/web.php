<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmprestimosController;
use App\Http\Controllers\DevolucoesController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/livro', [LivrosController::class, 'listar']);
    Route::get('/livro/create', [LivrosController::class, 'create'])->name('livro.create');
    Route::get('/livro/report',[LivrosController::class, 'showReport']);
    Route::get('/livro/{livro_id}', [LivrosController::class, 'show'])->name('livro.show');
    Route::post('/livro', [LivrosController::class, 'store']);
    Route::patch('/livro/{livro_id}', [LivrosController::class, 'update']);
    Route::delete('/livro/{livro_id}', [LivrosController::class, 'deletar']);

    Route::resource('cliente', ClientesController::class);
    Route::resource('emprestimo', EmprestimosController::class);

    Route::resource('devolucao', DevolucoesController::class);
    Route::get('devolucoes/{emprestimo}', [DevolucoesController::class, 'create'])->name('devolucoes.create');
    Route::post('devolucoes/{emprestimo}', [DevolucoesController::class, 'store'])->name('devolucoes.store');








;


