<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Style;

class StyleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Style::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'icon' => $this->faker->word,
            'color' => $this->faker->word,
            'image' => $this->faker->word,
            'origin' => $this->faker->word,
            'family' => $this->faker->word,
            'music' => $this->faker->word,
            'year' => $this->faker->word,
            'video' => $this->faker->word,
            'portrait' => $this->faker->word,
            'description' => $this->faker->text,
        ];
    }
}
