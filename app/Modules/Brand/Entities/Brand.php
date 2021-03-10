<?php

namespace App\Modules\Brand\Entities;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

	const FILE_PATH = '/uploads/brand/';
    
    protected $fillable = [

    	'brand_name',
    	'brand_logo',
    	'type'

    ];
    
    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
}
