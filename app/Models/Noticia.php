<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'subtitulo',
        'conteudo',
        'autor',
        'imagem',
        'categoria',
        'data_publicacao'
    ];

    protected $casts = [
        'data_publicacao' => 'datetime',
    ];

    public function getResumoAttribute(): string
    {
        return substr($this->conteudo, 0, 150) . '...';
    }
}
