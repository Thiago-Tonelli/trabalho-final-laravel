<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hamburguer extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'preco', 'categoria_id', 'imagem'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
