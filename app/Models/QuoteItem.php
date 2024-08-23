<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteItem extends Model
{
    use HasFactory;
    protected $table = 'quote_items';
    protected $guarded = [];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function total()
    {
        return $this->quantity * $this->product->price;
    }

    public function totalWithTax($tax = 0.18)
    {
        return $this->total() * $tax;
    }

    // public function remove()
    // {
    //     $this->delete();
    // }

    // public function updateQuantity($quantity)
    // {
    //     $this->update(['quantity' => $quantity]);
    // }

    // public function updatePrice($price)
    // {
    //     $this->update(['price' => $price]);
    // }

    // public function updateTotal()
    // {
    //     $this->update(['total' => $this->total()]);
    // }
}
