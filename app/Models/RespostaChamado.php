<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespostaChamado extends Model
{
    protected $table = 'respostachamado';
    protected $fillable = ['fkUsuario', 'fkChamado', 'resposta', 'dataHora'];
    public $timestamps = false;
}
