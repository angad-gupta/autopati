<?php

namespace App\Modules\VehicleModel\Entities;

use Illuminate\Database\Eloquent\Model;

use App\Modules\Brand\Entities\Brand;
use App\Modules\VehicleModel\Entities\ModelVariant;

class VehicleModel extends Model
{
       protected $fillable = [

    	'brand_id',
    	'model_name'
    ];
    
    public function BrandInfo(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function mVariantInfo()
    {
        return $this->hasMany(ModelVariant::class, 'vehicle_model_id');
    }

}
