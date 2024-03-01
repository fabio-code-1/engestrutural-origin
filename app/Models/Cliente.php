<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'email',
        'rg',
        'cpf',
        'telefone',
    ];

    public function projetos()
    {
        return $this->hasMany(Projeto::class, 'id_cliente');
    }
}
