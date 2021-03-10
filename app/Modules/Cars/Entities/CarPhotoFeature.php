<?php

namespace App\Modules\Cars\Entities;

use Illuminate\Database\Eloquent\Model;

class CarPhotoFeature extends Model
{

	const FILE_PATH = '/uploads/car/feature';

    protected $fillable = [

    	'car_id',
    	'highlighted_feature',
    	'feature_image'

    ];
    
    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

}
