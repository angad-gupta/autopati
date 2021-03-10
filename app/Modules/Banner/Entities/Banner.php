<?php

namespace App\Modules\Banner\Entities;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{

	const FILE_PATH = '/uploads/banner/';
    protected $fillable = [

    	'banner_title',
    	'short_content',
    	'banner_image',
    	'add_to_luxury',
    	'status',
    	'banner_link'

    ];
    
    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
}
