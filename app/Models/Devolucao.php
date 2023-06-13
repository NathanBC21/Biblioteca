<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devolucao extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_pessoa',
        'emprestimo_id',
        // Other fields...
    ];
}
