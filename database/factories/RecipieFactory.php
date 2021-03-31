<?php

namespace Database\Factories;

use App\Models\Recipie;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->randomElement(Recipie::STATUS_CHOICES),
            'thumbnail' => $this->faker->imageUrl(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(5),
            'cook_time' => $this->faker->numberBetween(10, 60),
            'difficulty' => $this->faker->randomElement(Recipie::DIFFICULTY_CHOICES),
            'rating' => $this->faker->randomFloat(1, 0, 5),
            'portions' => $this->faker->randomDigit,
        ];
    }
}
