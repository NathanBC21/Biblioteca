<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $fillable = [
        'livro_id',
        'cliente_id',
        'data_emprestimo',
        'quantidade_dias'
    ];

    public function livro(){
        return $this->belongsTo(Livro::class);

    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);

    }

    public function devolucao()
    {
        return $this->hasOne(Devolucao::class);
    }

}
