<?php

namespace App\Modules\Cars\Entities;

use Illuminate\Database\Eloquent\Model;

use App\Modules\Configuration\Entities\Configuration;
use App\Modules\Configuration\Entities\ConfigurationValue;
use App\Modules\Spec\Entities\Spec;
use App\Modules\Car\Entities\Car;
class CarSpecification extends Model
{
    protected $fillable = [

    	'car_id',
    	'spec_id',
    	'config_id',
    	'config_feature_id'

    ];

    public function carInfo(){
        return $this->belongsTo(Car::class,'car_id','id');
    }

    public function specInfo(){
        return $this->belongsTo(Spec::class,'spec_id','id');
    }

    public function configInfo(){
        return $this->belongsTo(Configuration::class,'config_id','id');
    }

    public function confFeatureInfo(){
        return $this->belongsTo(ConfigurationValue::class,'config_feature_id','id');
    }
}
