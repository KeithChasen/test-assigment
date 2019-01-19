<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'user_id', 'maintenance_contact_id', 'note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function maintenance_contact()
    {
        return $this->belongsTo(MaintenanceContact::class);
    }
}
