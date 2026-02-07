<?php

namespace Database\Factories;

use App\Models\Noticia;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticiaFactory extends Factory
{
    protected $model = Noticia::class;

    public function definition(): array
    {
        $categorias = ['tecnologia', 'esportes', 'política', 'economia', 'entretenimento', 'saúde'];
        
        return [
            'titulo' => fake()->sentence(6),
            'subtitulo' => fake()->sentence(10),
            'conteudo' => fake()->paragraphs(5, true),
            'autor' => fake()->name(),
            'imagem' => 'https://picsum.photos/800/400?random=' . fake()->numberBetween(1, 1000),
            'categoria' => fake()->randomElement($categorias),
            'data_publicacao' => fake()->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
