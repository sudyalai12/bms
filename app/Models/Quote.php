<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    protected $table = 'quotes';
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function items()
    {
        return $this->hasMany(QuoteItem::class, 'quote_id');
    }

    public function total()
    {
        return $this->items->sum->total();
    }

    public function totalWithTax($tax = 0.18)
    {
        return $this->total() * $tax;
    }

    public function grandTotal()
    {
        return $this->total() + $this->totalWithTax();
    }
}
