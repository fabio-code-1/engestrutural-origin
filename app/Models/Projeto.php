<?php

namespace App\Models;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projeto extends Model
{
    use HasFactory;

    protected $table = 'projetos';

    protected $fillable = [
        'nome',
        'descricao',
        'valor_arquitetonico',
        'valor_estrutural',
        'valor_hidraulica',
        'valor_eletrica',
        'status',
        'id_cliente',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function arquivos()
    {
        return $this->hasMany('App\Models\Arquivo', 'id_projeto', 'id');
    }
    
    
}
