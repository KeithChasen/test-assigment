<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const USER_ROLE = 'user';
    const CUSTOMER_ROLE = 'customer';

    public static $roles = [
        self::USER_ROLE,
        self::CUSTOMER_ROLE
    ];

    protected $fillable = [
        'role'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
