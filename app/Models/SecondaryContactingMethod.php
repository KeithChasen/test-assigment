<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecondaryContactingMethod extends Model
{
    protected $fillable = [
        'label'
    ];

    public function maintenance_contact()
    {
        return $this->belongsTo(MaintenanceContact::class);
    }
}
