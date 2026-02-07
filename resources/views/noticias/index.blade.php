@extends('layouts.app')

@section('title', 'Portal de Notícias - Últimas notícias')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="mb-3"><i class="fas fa-newspaper"></i> Últimas Notícias</h1>
            
            <div class="mb-4">
                <a href="{{ route('noticias.index') }}" class="btn btn-sm {{ !$categoria ? 'btn-primary' : 'btn-outline-primary' }}">
                    Todas
                </a>
                @foreach($categorias as $cat)
                    <a href="{{ route('noticias.index', ['categoria' => $cat]) }}" 
                       class="btn btn-sm {{ $categoria == $cat ? 'btn-primary' : 'btn-outline-primary' }}">
                        {{ ucfirst($cat) }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row g-4">
        @forelse($noticias as $noticia)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="position-relative">
                        <span class="badge bg-{{ $noticia->categoria == 'tecnologia' ? 'info' : ($noticia->categoria == 'esportes' ? 'success' : 'secondary') }} categoria-badge">
                            {{ ucfirst($noticia->categoria) }}
                        </span>
                        <img src="{{ $noticia->imagem }}" class="card-img-top" alt="{{ $noticia->titulo }}">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $noticia->titulo }}</h5>
                        <p class="card-text text-muted small">
                            <i class="far fa-calendar"></i> {{ $noticia->data_publicacao->format('d/m/Y H:i') }} |
                            <i class="far fa-user"></i> {{ $noticia->autor }}
                        </p>
                        @if($noticia->subtitulo)
                            <p class="card-text">{{ $noticia->subtitulo }}</p>
                        @endif
                        <a href="{{ route('noticias.show', $noticia->id) }}" class="btn btn-primary mt-auto">
                            Ler mais <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> Nenhuma notícia encontrada.
                </div>
            </div>
        @endforelse
    </div>

    <div class="row mt-5">
        <div class="col-12">
            {{ $noticias->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
