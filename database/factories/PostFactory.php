<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'preview' => $this->faker->text(50),
            'description' => $this->faker->text(),
            'image' => $this->faker->image('public/storage/posts', 640, 480, null, false),
            'category_id' => rand(1, 3),
        ];
    }
}
