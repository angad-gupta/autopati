<?php

namespace App\Modules\Cars\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Cars\Entities\CarGalleryDetail;
class CarGallery extends Model
{

    protected $fillable = [

    	'car_id',
    	'gallery_title'

    ];

    public function galleryDetail()
    {
        return $this->hasMany(CarGalleryDetail::class, 'car_gallery_id');
    }
    
}
