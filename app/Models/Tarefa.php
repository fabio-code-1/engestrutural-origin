<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $table = 'tarefas';

    protected $fillable = [
        'funcionario_id',
        'chefe_id',
        'titulo',
        'descricao',
        'prazo',
        'prioridade',
        'status',
    ];

    // Relacionamento com Chefe
    public function chefe()
    {
        return $this->belongsTo(Chefe::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

}
