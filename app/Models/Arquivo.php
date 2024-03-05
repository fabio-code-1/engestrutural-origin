<?php

namespace App\Models;

use App\Models\Projeto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Arquivo extends Model
{
    use HasFactory;
    protected $table = 'arquivos';

    protected $fillable = ['nome', 'descricao', 'files', 'id_projeto', 'id_user', 'categoria'];
    
    public function projeto()
    {
        return $this->belongsTo(Projeto::class, 'id_projeto');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
