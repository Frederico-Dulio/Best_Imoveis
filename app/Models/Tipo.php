<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    public function imoveis()
    {
        return $this->hasMany(Imovel::class);
    }

    public function finalidade()
    {
        return $this->belongsTo(Finalidade::class);
    }
}
