<?php

namespace App\models;

// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 

class Rate extends Eloquent
{
    //
    protected $connection ="mongodb";

    protected $guarded = [];
    protected $collection = "rate";
    protected $fillable = [
        'blog_id','qty'
    ];
}
