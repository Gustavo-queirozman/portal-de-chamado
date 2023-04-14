<?php

namespace App\Models\solicitante;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalhesChamado extends Model
{
    protected $table = 'respostachamado';
    protected $fillable = ['fkUsuario', 'fkChamado', 'resposta'];
    public $timestamps = false;
}
