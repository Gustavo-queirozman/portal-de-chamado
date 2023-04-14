<?php

namespace App\Models\adm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'users';
    protected $fillable = ['name','email', 'username', 'password', 'setor','ramal', 'codAnydesk'];
    public $timestamps = false;
}
