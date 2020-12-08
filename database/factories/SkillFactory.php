<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Skill;

class SkillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Skill::class;

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
            'difficulty' => $this->faker->word,
            'description' => $this->faker->text,
            'image' => $this->faker->word,
            'portrait' => $this->faker->word,
            'video' => $this->faker->text,
        ];
    }
}
