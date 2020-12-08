<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Payment;
use App\User;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->word,
            'provider' => $this->faker->word,
            'method' => $this->faker->word,
            'amount' => $this->faker->word,
            'amount_received' => $this->faker->word,
            'currency' => $this->faker->word,
            'molley_payment_id' => $this->faker->word,
            'status' => $this->faker->randomElement(["paid","partial","processing","overpaid","failed","open","canceled","expired"]),
            'received_date' => $this->faker->date(),
            'comments' => $this->faker->text,
            'user_id' => User::factory(),
        ];
    }
}
