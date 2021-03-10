<?php

namespace App\Modules\Spec\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spec extends Model
{

    protected $fillable = [

    	'spec_title',
    	'automobile'

    ];

}
