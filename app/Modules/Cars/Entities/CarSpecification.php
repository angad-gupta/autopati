<?php

namespace App\Modules\Cars\Entities;

use Illuminate\Database\Eloquent\Model;

class CarSpecification extends Model
{
    protected $fillable = [

    	'car_id',
    	'spec_id',
    	'config_id',
    	'config_feature_id'

    ];

}
