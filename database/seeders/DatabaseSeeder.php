<?php

namespace Database\Seeders;

use App\Models\Quote;
use App\Models\QuoteItem;
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
        QuoteItem::factory(50)->create();
        foreach (Quote::all() as $quote){
            $quote->reference = $quote->customer->generateReference();
            $quote->save();
        }
    }
}
