<?php

namespace App\Modules\Cars\Entities;

use Illuminate\Database\Eloquent\Model;

class CarGalleryDetail extends Model
{

	const FILE_PATH = '/uploads/car/gallery';
    protected $fillable = [

    	'car_gallery_id',
    	'car_image_path'
    ];
    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
}
