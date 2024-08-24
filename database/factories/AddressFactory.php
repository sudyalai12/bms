<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => fake()->randomNumber(2, true),
            'address1' => fake()->address(),
            'address2' => fake()->address(),
            'city' => fake()->city(),
            'pincode' => fake()->postcode(),
            'state' => fake()->state(),
        ];
    }
}
