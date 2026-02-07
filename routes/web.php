<?php

use App\Http\Controllers\NoticiaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NoticiaController::class, 'index'])->name('noticias.index');
Route::get('/noticias/{noticia}', [NoticiaController::class, 'show'])->name('noticias.show');
