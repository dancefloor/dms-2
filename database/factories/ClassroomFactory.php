<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Classroom;
use App\Location;

class ClassroomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classroom::class;

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
            'm2' => $this->faker->randomFloat(0, 0, 9999999999.),
            'capacity' => $this->faker->numberBetween(-10000, 10000),
            'limit_couples' => $this->faker->numberBetween(-10000, 10000),
            'price_hour' => $this->faker->randomFloat(0, 0, 9999999999.),
            'price_month' => $this->faker->randomFloat(0, 0, 9999999999.),
            'dance_shoes' => $this->faker->boolean,
            'comments' => $this->faker->text,
            'color' => $this->faker->word,
            'location_id' => Location::factory(),
        ];
    }
}
