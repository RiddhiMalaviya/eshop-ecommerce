<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'=> $this->faker->firstname,
            'last_name'=> $this->faker->lastname,
            'email'=> $this->faker->unique()->safeEmail,
            'comment'=> $this->faker->paragraph,
        ];
    }
}
