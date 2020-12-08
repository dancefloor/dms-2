<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Course;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

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
            'excerpt' => $this->faker->text,
            'description' => $this->faker->text,
            'online_description' => $this->faker->text,
            'tagline' => $this->faker->word,
            'keywords' => $this->faker->word,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'monday' => $this->faker->boolean,
            'start_time_mon' => $this->faker->time(),
            'end_time_mon' => $this->faker->time(),
            'tuesday' => $this->faker->boolean,
            'start_time_tue' => $this->faker->time(),
            'end_time_tue' => $this->faker->time(),
            'wednesday' => $this->faker->boolean,
            'start_time_wed' => $this->faker->time(),
            'end_time_wed' => $this->faker->time(),
            'thursday' => $this->faker->boolean,
            'start_time_thu' => $this->faker->time(),
            'end_time_thu' => $this->faker->time(),
            'friday' => $this->faker->boolean,
            'start_time_fri' => $this->faker->time(),
            'end_time_fri' => $this->faker->time(),
            'saturday' => $this->faker->boolean,
            'start_time_sat' => $this->faker->time(),
            'end_time_sat' => $this->faker->time(),
            'sunday' => $this->faker->boolean,
            'start_time_sun' => $this->faker->time(),
            'end_time_sun' => $this->faker->time(),
            'level' => $this->faker->word,
            'level_number' => $this->faker->word,
            'teaser_video_1' => $this->faker->text,
            'teaser_video_2' => $this->faker->text,
            'teaser_video_3' => $this->faker->text,
            'full_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'reduced_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'promo_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'live_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'online_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'thumbnail' => $this->faker->word,
            'portrait' => $this->faker->word,
            'focus' => $this->faker->word,
            'type' => $this->faker->word,
            'is_online' => $this->faker->boolean,
            'status' => $this->faker->word,
            'online_link' => $this->faker->word,
            'to_waiting' => $this->faker->boolean,
        ];
    }
}
