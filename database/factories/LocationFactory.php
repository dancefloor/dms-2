<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Location;

class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

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
            'shortname' => $this->faker->word,
            'address' => $this->faker->word,
            'address_info' => $this->faker->word,
            'postal_code' => $this->faker->postcode,
            'city' => $this->faker->city,
            'neighborhood' => $this->faker->word,
            'state' => $this->faker->word,
            'country' => $this->faker->country,
            'comments' => $this->faker->text,
            'contact' => $this->faker->word,
            'email' => $this->faker->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'contract' => $this->faker->text,
            'video' => $this->faker->text,
            'entry_code' => $this->faker->word,
            'google_maps_shortlink' => $this->faker->word,
            'google_maps' => $this->faker->text,
            'public_transportation' => $this->faker->word,
        ];
    }
}
