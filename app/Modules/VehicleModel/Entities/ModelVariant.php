<?php

namespace App\Modules\VehicleModel\Entities;

use Illuminate\Database\Eloquent\Model;

class ModelVariant extends Model
{
	protected $fillable = [

    	'vehicle_model_id',
		'variant_name'
    ];

	
}
