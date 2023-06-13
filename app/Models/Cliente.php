<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

protected $fillable = [
'nome',
'sobrenome',
'data_nascimento',
'cpf',
'email',
'senha'
];


}
