<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Product;
use App\Models\Quote;
use App\Models\QuoteItem;
use App\Models\Supplier;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Company::factory(100)->create();
        Address::factory(100)->create();
        Department::factory(100)->create();
        Customer::factory(100)->create();
        Supplier::factory(100)->create();
        Product::factory(100)->create();
        Quote::factory(100)->create();
        QuoteItem::factory(100)->create();
        foreach (Quote::all() as $quote){
            $quote->reference = $quote->customer->generateReference();
            $quote->save();
        }
    }
}
