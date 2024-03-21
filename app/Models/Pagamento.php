<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $table = 'pagamentos';

    protected $fillable = [
        'pagamento', 
        'categoria_pagamento',
        'forma_pagamento',
        'projeto_id',
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }
}
