<?php

namespace App\Modules\Configuration\Entities;

use Illuminate\Database\Eloquent\Model;

class ConfigurationValue extends Model
{

    protected $fillable = [

    	'configuration_id',
    	'config_value'

    ];
    
}
