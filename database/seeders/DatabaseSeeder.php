<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Company;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Product;
use App\Models\Quote;
use App\Models\QuoteItem;
use App\Models\Supplier;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('countries')->insert(Country::$countries);
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
