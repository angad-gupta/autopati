<?php

namespace App\Modules\Spec\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Modules\Configuration\Entities\Configuration;
use App\Modules\Configuration\Entities\ConfigurationValue;

class Spec extends Model
{

    protected $fillable = [

    	'spec_title',
    	'automobile'

    ];

    public function config()
    {
        return $this->hasMany(Configuration::class, 'spec_id');
    }

    public function configValues()
    {
        return $this->hasManyThrough('App\Modules\Configuration\Entities\ConfigurationValue', 'App\Modules\Configuration\Entities\Configuration');
    }

}
