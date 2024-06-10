<?php

namespace Database\Factories;

use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserProfile::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $user_id = 1;
        return [
            'user_id' => $user_id++,
            'phone_number' => $this->faker->phoneNumber,
            'CIN' => strtoupper($this->faker->randomLetter() . $this->faker->randomLetter() . $this->faker->randomNumber(5)),
            'street_addr_1' => $this->faker->address,
            'pin_code' => $this->faker->randomNumber(8),
        ];
    }
}
