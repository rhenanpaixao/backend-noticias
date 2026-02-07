@extends('layouts.app')

@section('title', $noticia->titulo . ' - Portal de Notícias')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('noticias.index') }}">Início</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('noticias.index', ['categoria' => $noticia->categoria]) }}">{{ ucfirst($noticia->categoria) }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Notícia</li>
                </ol>
            </nav>

            <article class="bg-white p-4 rounded shadow-sm">
                <span class="badge bg-primary mb-3">{{ ucfirst($noticia->categoria) }}</span>
                
                <h1 class="mb-3">{{ $noticia->titulo }}</h1>
                
                @if($noticia->subtitulo)
                    <h5 class="text-muted mb-4">{{ $noticia->subtitulo }}</h5>
                @endif

                <div class="mb-4 text-muted">
                    <i class="far fa-calendar"></i> {{ $noticia->data_publicacao->format('d/m/Y \à\s H:i') }} |
                    <i class="far fa-user"></i> Por {{ $noticia->autor }}
                </div>

                @if($noticia->imagem)
                    <img src="{{ $noticia->imagem }}" class="img-fluid rounded mb-4 w-100" alt="{{ $noticia->titulo }}">
                @endif

                <div class="noticia-content" style="line-height: 1.8; font-size: 1.1rem;">
                    {!! nl2br(e($noticia->conteudo)) !!}
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('noticias.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                    <div>
                        <span class="text-muted">Compartilhar:</span>
                        <a href="#" class="btn btn-sm btn-outline-primary ms-2"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-info"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-success"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </article>
        </div>

        <div class="col-lg-4">
            <div class="bg-white p-4 rounded shadow-sm mb-4">
                <h5 class="mb-3"><i class="fas fa-newspaper"></i> Notícias Relacionadas</h5>
                
                @forelse($relacionadas as $rel)
                    <div class="mb-3 pb-3 border-bottom">
                        <a href="{{ route('noticias.show', $rel->id) }}" class="text-decoration-none">
                            @if($rel->imagem)
                                <img src="{{ $rel->imagem }}" class="img-fluid rounded mb-2" alt="{{ $rel->titulo }}">
                            @endif
                            <h6 class="text-dark">{{ $rel->titulo }}</h6>
                            <small class="text-muted">
                                <i class="far fa-calendar"></i> {{ $rel->data_publicacao->format('d/m/Y') }}
                            </small>
                        </a>
                    </div>
                @empty
                    <p class="text-muted">Nenhuma notícia relacionada.</p>
                @endforelse
            </div>

            <div class="bg-primary text-white p-4 rounded shadow-sm">
                <h5 class="mb-3"><i class="fas fa-info-circle"></i> Sobre</h5>
                <p class="mb-0">Portal de notícias desenvolvido com Laravel 12, trazendo as últimas informações em diversas categorias.</p>
            </div>
        </div>
    </div>
</div>
@endsection
