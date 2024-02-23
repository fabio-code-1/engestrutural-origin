<?php

namespace App\Models;

use App\Models\User;
use App\Models\Chefe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'salario',
        'cargo',
        'chefe_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chefe()
    {
        return $this->belongsTo(Chefe::class);
    }

}
