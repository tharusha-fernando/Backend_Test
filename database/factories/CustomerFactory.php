<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'=>fake()->name(),
            'last_name'=>fake()->name(),
            'email'=>fake()->email(),
            'address'=>fake()->address(),
            'nic'=>fake()->unique()->word()
            //
        ];
    }
}
