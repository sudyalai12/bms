<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;
    protected $table = 'taxes';
    protected $guarded = [];

    public static $taxTypes = ['GST', 'CGST', 'SGST', 'IGST', 'UTST'];

    public function contactPersons()
}
