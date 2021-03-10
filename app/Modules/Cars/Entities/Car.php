<?php

namespace App\Modules\Cars\Entities;

use Illuminate\Database\Eloquent\Model;

use App\Modules\Brand\Entities\Brand;
use App\Modules\VehicleModel\Entities\VehicleModel;
use App\Modules\VehicleModel\Entities\ModelVariant;

class Car extends Model
{

    const FILE_PATH = '/uploads/car/';
    protected $fillable = [

    	'brand_id',
    	'model_id',
    	'variant_id',
    	'short_quote',
    	'short_content',
    	'description',
        'car_image',
    	'year_of_manufacture',
    	'is_offer_available',
        'starting_price',
    	'discount_percent',
        'discount_amount',
    	'flat_amount',
    	'is_luxury',
    	'is_deal_of_the_month',
    	'is_popular',
    	'is_electric',
    	'is_launch',
    	'currently_launch',
    	'expected_launch_date',
    	'is_top_car'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

    public function BrandInfo(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function ModelInfo(){
        return $this->belongsTo(VehicleModel::class,'model_id','id');
    }

    public function VariantInfo(){
        return $this->belongsTo(ModelVariant::class,'variant_id','id');
    }
    
}
