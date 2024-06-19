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
}
