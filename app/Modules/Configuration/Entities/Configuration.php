<?php

namespace App\Modules\Configuration\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Modules\Configuration\Entities\ConfigurationValue;
use App\Modules\Spec\Entities\Spec;

class Configuration extends Model
{

    protected $fillable = [

    	'spec_id',
    	'title'

    ];

    public function spec(){
        return $this->belongsTo(Spec::class,'spec_id','id');
    }

    public function ConfigVal()
    {
        return $this->hasMany(ConfigurationValue::class, 'configuration_id');
    }
    
}
