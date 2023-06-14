<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devolucao extends Model
{
    use HasFactory;

    protected $fillable = [
        'emprestimo_id',
        'multa'
        // Other fields...
    ];

    public function emprestimo(){
        return $this->belongsTo(Emprestimo::class);

    }
}
