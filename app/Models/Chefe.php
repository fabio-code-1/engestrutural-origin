<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chefe extends Model
{
    use HasFactory;

    protected $table = 'chefes';

    protected $fillable = [
        'user_id',
        'cargo',
    ];

    // Relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class, 'chefe_id');
    }

     // Relacionamento com tarefas
     public function tarefas()
     {
         return $this->hasMany(Tarefa::class);
     }
}
