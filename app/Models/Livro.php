<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
    'titulo',
    'autor',
    'ano_publicacao',
    'quantidade_paginas',
    'edicao',
    'editora',
    'ano_edicao',
    'valor', 8, 2   
];
}
