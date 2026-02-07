<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index(Request $request)
    {
        $categoria = $request->get('categoria');
        
        $noticias = Noticia::query()
            ->when($categoria, function ($query, $categoria) {
                return $query->where('categoria', $categoria);
            })
            ->orderBy('data_publicacao', 'desc')
            ->paginate(12);

        $categorias = Noticia::distinct()->pluck('categoria');

        return view('noticias.index', compact('noticias', 'categorias', 'categoria'));
    }

    public function show(Noticia $noticia)
    {
        $relacionadas = Noticia::where('categoria', $noticia->categoria)
            ->where('id', '!=', $noticia->id)
            ->orderBy('data_publicacao', 'desc')
            ->limit(3)
            ->get();

        return view('noticias.show', compact('noticia', 'relacionadas'));
    }
}
