<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Document;
use App\Models\reclamation;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reclamation>
 */
class ReclamationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reclamation::class;

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
            'object' => $this->faker->word,
            'subject' => $this->faker->sentence,
        ];
    }
}
