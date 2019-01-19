<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_id',
        'street',
        'street2',
        'city',
        'state',
        'zipcode',
        'country',
        'business_id',
        'service_team',
        'customer_type_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer_type()
    {
        return $this->belongsTo(CustomerType::class);
    }
}
