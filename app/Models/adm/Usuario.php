<?php

namespace App\Models\adm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'users';
    protected $fillable = ['tipo', 'categoria', 'prioridade', 'titulo', 'descricao'];
    public $timestamps = false;
}
