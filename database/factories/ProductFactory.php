<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = rtrim($this->faker->text(rand(20,40),'.'));
        $img = [
            "https://placeimg.com/500/500/any?1",

            "https://placeimg.com/500/500/any?2",

            "https://placeimg.com/500/500/any?3",
            "https://placeimg.com/500/500/any?5",
            "https://placeimg.com/500/500/any?6",

            "https://placeimg.com/500/500/any?4",
            'https://source.unsplash.com/random',
        ];
        return [
            'title' => $title,
            'slug' => str_slug($title),
            'body' => $this->faker->paragraphs(rand(10, 20), true),
            'price' => rand(40, 500),
            'seller_id' => User::all()->random()->id,
            'img' => $img[rand(0,6)],
        ];
    }
}
