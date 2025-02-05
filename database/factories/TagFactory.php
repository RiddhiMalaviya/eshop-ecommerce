<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tag_name = $this->faker->unique()->words($nb=2,$asText=true);
        $slug = Str::slug($tag_name);
        return [
            'name' => Str::title($tag_name),
            'slug'=>$slug,
        ];
    }
}
