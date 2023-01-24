<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comic>
 */
class ComicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(mt_rand(3, 8)),
            'slug' => fake()->slug(),
            'excerpt' => fake()->paragraph(),
            // 'body' => collect(fake()->paragraphs(mt_rand(10, 20))->map(fn($p) => "<p>$p</p>")->implode('    ')),
            // 'body' => '<p>' . implode('</p><p>', fake()->paragraphs(mt_rand(50, 100) . '</p>')),
            'pages' => mt_rand(5, 20),
            'user_id' => mt_rand(1, 5),
            'category_id' => mt_rand(1, 3)
        ];
    }
}
