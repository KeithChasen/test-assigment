<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpokenLanguage extends Model
{
    protected $fillable = [
        'label'
    ];

    public function maintenance_contact()
    {
        return $this->belongsTo(MaintenanceContact::class);
    }
}
