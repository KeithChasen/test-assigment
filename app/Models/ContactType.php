<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    const WATER_FILLER = 'Water filler';
    const BACKUP_WATER_FILLER = 'Backup water filler/foreman';
    const BACKUP_OF_BACKUP = 'Backup of backup';
    const MAINTENANCE_CONTACT = 'Maintenance contact';
    const MAINTENANCE_CONTACT_AND_WATER_FILLER = 'Maint. contact and water filler';

    public static $labels = [
        self::WATER_FILLER,
        self::BACKUP_WATER_FILLER,
        self::BACKUP_OF_BACKUP,
        self::MAINTENANCE_CONTACT,
        self::MAINTENANCE_CONTACT_AND_WATER_FILLER,
    ];

    protected $fillable = [
        'label'
    ];

    public function maintenance_contact()
    {
        return $this->belongsTo(MaintenanceContact::class);
    }
}
