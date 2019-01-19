<?php

namespace App\Models;

use App\WallGroup;
use Illuminate\Database\Eloquent\Model;

class MaintenanceContact extends Model
{
    protected $fillable = [
        'wall_group_id',
        'name',
        'title',
        'phone',
        'mobile_phone',
        'email',
        'contact_type_id',
        'priority_contact_method_id',
        'secondary_contact_method_id',
        'spoken_language_id',
        'street',
        'street2',
        'city',
        'state',
        'zipcode',
        'country'
    ];

    public function wall_group()
    {
        return $this->belongsTo(WallGroup::class);
    }


    public function contact_type()
    {
        return $this->belongsTo(ContactType::class);
    }

    public function priority_contacting_method()
    {
        return $this->belongsTo(PriorityContactingMethod::class);
    }

    public function secondary_contacting_method()
    {
        return $this->belongsTo(SecondaryContactingMethod::class);
    }

    public function spoken_language()
    {
        return $this->belongsTo(SpokenLanguage::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
