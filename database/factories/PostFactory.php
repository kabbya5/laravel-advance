<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $post_title = rtrim($this->faker->text(rand(8, 30)),'.');
        $img = [
            "https://placeimg.com/500/500/any?1",

            "https://placeimg.com/500/500/any?2",

            "https://placeimg.com/500/500/any?3",

            "https://placeimg.com/500/500/any?4",
            "https://placeimg.com/500/500/any?5",
            "https://placeimg.com/500/500/any?6",
            "https://placeimg.com/500/500/any?7",
            'https://source.unsplash.com/random',
        ];
        return [
            'post_title' => $post_title,
            'slug' => str_slug($post_title),
            'author_id' => User::all()->random()->id,
            'view_count' => rand(30, 500),
            'post_excerpt' => $this->faker->paragraphs(rand(3,6),true),
            'post_body' => $this->faker->paragraphs(rand(6,10),true),
            'published_at' => $this->faker->dateTimeBetween('-1 year', '+6 months'),
            'post_img' => $img[rand(0,7)],
        ];
    }
}
