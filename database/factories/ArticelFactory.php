<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articel>
 */
class ArticelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'content' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['draft', 'published', 'archived']),
            'categories_id' => Category::factory(), // assuming categories table has some data
            'views' => $this->faker->numberBetween(0, 1000),
            'publis_data' => $this->faker->date(),
            'img' => $this->faker->imageUrl(640, 480, 'articles', true),
        ];
    }
}
