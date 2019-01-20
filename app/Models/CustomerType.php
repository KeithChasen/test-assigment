<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
    const COMPANY = 'company';
    const PRIVATE_HOUSEHOLD = 'private household';

    public static $types = [
        self::COMPANY,
        self::PRIVATE_HOUSEHOLD
    ];

    protected $fillable = [
        'type'
    ];

    public function customers()
    {
        return $this->belongsToMany(User::class);
    }
}
