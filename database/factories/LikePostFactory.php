<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LikePost>
 */
class LikePostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $array_user = array();
        foreach (User::all() as $item) {
            array_push($array_user, $item->id);
        }

        $array_post = array();
        foreach (Post::all() as $item) {
            array_push($array_post, $item->id);
        }
        return [
            'post_id' => Arr::random($array_post),
            'user_id' => Arr::random($array_user),
        ];
    }
}
