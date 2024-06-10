<?php

namespace Database\Factories;
use App\Models\Document;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

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
            'type' => $this->faker->randomElement(['Attestation de scolarité', 'Relevé de notes', 'Convention de stage']),
            'status' => $this->faker->randomElement(['accepted', 'pending', 'refused']),
        ];
    }
}
