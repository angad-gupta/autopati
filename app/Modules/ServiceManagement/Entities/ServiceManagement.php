<?php

namespace App\Modules\ServiceManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Modules\ServiceCategory\Entities\ServiceCategory;

class ServiceManagement extends Model
{
    // use HasFactory;

    protected $table = 'service_managements';
    const FILE_PATH = '/uploads/service_management/';

    protected $fillable = [
        'category_id',
        'title',
        'location',
        'status',
        'cover_image',
        'description',
    ];
    
    protected static function newFactory()
    {
        return \App\Modules\ServiceManagement\Database\factories\ServiceManagementFactory::new();
    }

    public function category(){
        return $this->belongsto(ServiceCategory::class);
    }

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
}
