<?php

namespace App\models;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 
class Country extends Eloquent
{
    protected $connection ="mongodb";

    protected $guarded = [];
    protected $collection = "country";
    protected $fillable = [
        'name'
    ];
}
