<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NumberFormatter;

class BaseModel extends Model
{
    use HasFactory;
    public static function currencyConveter($price)
    {
        $currencies = [
            'USD' => ['formatter' => 'en_US', 'code' => 'USD'], // US Dollar
            'EUR' => ['formatter' => 'fr-FR', 'code' => 'EUR'], // Euro
            'GBP' => ['formatter' => 'en_GB', 'code' => 'GBP'], // Pound Sterling
            'INR' => ['formatter' => 'en_IN', 'code' => 'INR'], // Indian Rupee
        ];

        // Determine the currency to use based on the selected currency cookie. If no currency is selected, default to INR (Indian Rupee).
        $currency = $currencies['INR'];

        // Create a formatter object for the selected currency.
        $formatter = new NumberFormatter($currency['formatter'], \NumberFormatter::CURRENCY);

        // Format and return the currency value.
        // with one space between the currency sign and currency value
        return $formatter->formatCurrency($price, $currency['code']);
    }
}
