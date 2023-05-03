<?php

namespace App\models;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 

class Brand extends Eloquent
{
    protected $connection ="mongodb";

    protected $guarded = [];
    protected $collection = "brands";
    protected $fillable = [
        'name'
    ];
}
