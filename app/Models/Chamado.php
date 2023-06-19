<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    protected $table = 'chamado';
    protected $fillable = ['tipo', 'categoria', 'subcategoria', 'prioridade', 'setor', 'titulo', 'descricao', 'atendente', 'fkUsuario'];
    public $timestamps = false;
}
