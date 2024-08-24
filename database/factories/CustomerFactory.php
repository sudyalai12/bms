<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Company;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Department;
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
            'company_id' => Company::all()->random()->id,
            'department_id' => Department::all()->random()->id,
            'address_id' => Address::all()->random()->id,
            'country_id' => Country::all()->random()->id,
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'mobile' => fake()->phoneNumber(),
            'tax_type' => fake()->randomElement(Customer::$taxTypes),
            'gstn' => fake()->regexify('[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}[Z]{1}[0-9A-Z]{1}'),
            'pan' => fake()->regexify('[A-Z]{5}[0-9]{4}[A-Z]{1}'),
        ];
    }
}
