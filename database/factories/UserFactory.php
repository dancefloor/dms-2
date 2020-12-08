<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);

        $mobile = $this->faker->e164PhoneNumber;
        $phone = $this->faker->optional()->e164PhoneNumber;
        
        $name = $this->faker->firstNameMale;
        $picture = 'https://randomuser.me/api/portraits/men/' . rand(1,99) . '.jpg';
    
        if ($gender === 'female') {
            $name = $this->faker->firstNameFemale;
            $picture = 'https://randomuser.me/api/portraits/women/' . rand(1,99) . '.jpg';
        }

        return [
            'name'      => $name,
            'lastname'  => $this->faker->lastName,
            'email'     => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'gender'    => $gender,
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),

            'profession'    => $this->faker->optional()->jobTitle,
            'biography'     => $this->faker->paragraph,

            'branch'        => $this->faker->word,
            'aware_of_df'   => $this->faker->randomElement(['Instagram', 'Facebook','Google','Friend','Old Student']),
            'work_status'   => $this->faker->randomElement(['Student', 'Working','Unemployed','Retired','Freelance']),  

            'mobile'        => $mobile,
            'phone'         => $phone,
            'mobile_verified_at' => now(),
            'phone_verified_at'  => now(),
            
            'address'        => $this->faker->streetAddress,            
            'address_info'  => $this->faker->optional()->secondaryAddress,
            'postal_code'   => $this->faker->postcode,
            'city'          => $this->faker->city,
            'state'         => $this->faker->state,
            'country'       => $this->faker->country,
            'lat'           => $this->faker->latitude,
            'lng'           => $this->faker->longitude,
    
            'facebook'      => $this->faker->optional()->url,
            'instagram'     => $this->faker->optional()->url,
            'linkedin'      => $this->faker->optional()->url,
            'twitter'       => $this->faker->optional()->url,
            'pinterest'     => $this->faker->optional()->url,
            'skype'         => $this->faker->optional()->userName,
            'snapchat'      => $this->faker->optional()->userName,
            'tiktok'        => $this->faker->optional()->userName,
            'youtube'       => $this->faker->optional()->url,
        ];
    }
}
