<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Following>
 */
class FollowingFactory extends Factory
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
        return [
            'user_id' => Arr::random($array_user),
            'following_id' => Arr::random($array_user),
        ];
    }
}
