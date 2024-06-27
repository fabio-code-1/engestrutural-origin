<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financeiro extends Model
{
    use HasFactory;

    protected $table = 'financeiros'; 

    protected $fillable = [
        'cliente',
        'projeto',
        'categoria_pagamento',
        'forma_pagamento',
        'pagamento',
        'data_pagamento',
        'parcela',
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class, 'projeto_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
 

}
