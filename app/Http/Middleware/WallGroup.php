<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WallGroup extends Model
{
    protected $fillable = [
        'name',
        'street',
        'street2',
        'city',
        'state',
        'zipcode',
        'country',
        'service_team'
    ];
}
