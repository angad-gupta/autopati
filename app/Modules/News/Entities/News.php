<?php

namespace App\Modules\News\Entities;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    const FILE_PATH = '/uploads/news/';
    protected $fillable = [

    	'title',
    	'sub_content',
    	'content',
    	'news_image',
    	'status',
    	'date'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
    
}
