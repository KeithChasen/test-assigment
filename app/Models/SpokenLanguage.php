<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpokenLanguage extends Model
{
    const FINNISH = 'Finnish';
    const ENGLISH = 'English';
    const RUSSIAN = 'Russian';
    const SWEDISH = 'Swedish';
    const KOREAN = 'Korean';
    const GERMAN = 'German';

    public static $labels = [
        self::FINNISH,
        self::ENGLISH,
        self::RUSSIAN,
        self::SWEDISH,
        self::KOREAN,
        self::GERMAN,
    ];

    protected $fillable = [
        'label'
    ];

    public function maintenance_contact()
    {
        return $this->belongsTo(MaintenanceContact::class);
    }
}
