<?php

namespace App\Modules\Subscription\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    // use HasFactory;

    protected $fillable = [

        'email',
    	'status',
    ];
    
    protected static function newFactory()
    {
        return \App\Modules\Subscription\Database\factories\SubscriptionFactory::new();
    }
}
