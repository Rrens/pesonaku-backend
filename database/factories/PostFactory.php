<?php

namespace Database\Factories;

use App\Models\Products;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
    public function definition(): array
    {
        $array_user = array();
        foreach (User::all() as $item) {
            array_push($array_user, $item->id);
        }

        $array_product = array();
        foreach (Products::all() as $item) {
            array_push($array_product, $item->id);
        }
        return [
            'id' => $this->faker->uuid(),
            'user_id' => Arr::random($array_user),
            'product_id' => Arr::random($array_product),
            'caption' => $this->faker->word(),
        ];
    }
}
