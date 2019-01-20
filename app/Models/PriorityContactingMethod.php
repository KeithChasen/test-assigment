<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriorityContactingMethod extends Model
{
    const SMS = 'SMS';
    const EMAIL = 'Email';
    const PHONE = 'Phone';
    const MOBILE = 'Mobile';
    const PUSHOVER_SERVICE = 'Pushover service';

    public static $labels = [
        self::SMS,
        self::EMAIL,
        self::PHONE,
        self::MOBILE,
        self::PUSHOVER_SERVICE,
    ];

    protected $fillable = [
        'label'
    ];

    public function maintenance_contact()
    {
        return $this->belongsTo(MaintenanceContact::class);
    }
}
