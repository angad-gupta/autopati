<?php

namespace App\Modules\Cars\Entities;

use Illuminate\Database\Eloquent\Model;

class CarColor extends Model
{

    const FILE_PATH = '/uploads/car/color';
    protected $fillable = [

    	'car_id',
    	'color_title',
    	'color_code',
    	'car_image'

    ];
    
   	public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
}
