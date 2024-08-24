<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $guarded = [];
 

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function generateReference()
    {
        $customername = preg_replace('/[^A-Za-z0-9]/', '', substr($this->name, 0, 4));
        date_default_timezone_set('Asia/Kolkata');
        $nextyear = date('y') + 1;
        return sprintf(
            "NEPL/%s/Q-%s/%s-%s/%s",
            strtoupper($customername),
            date('md'),
            date('Y'),
            $nextyear,
            date('his')
        );
    }
}
