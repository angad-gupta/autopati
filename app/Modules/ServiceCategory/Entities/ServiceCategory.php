<?php

namespace App\Modules\ServiceCategory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceCategory extends Model
{
    // use HasFactory;

    protected $fillable = [
        'title',
    	'status',
    ];
    
    protected static function newFactory()
    {
        return \App\Modules\ServiceCategory\Database\factories\ServiceCategoryFactory::new();
    }

    public function service(){
        return $this->hasMany(ServiceManagememnt::class);
    }
}
