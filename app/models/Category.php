<?php

namespace App\models;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 
class Category extends Eloquent
{
    protected $connection ="mongodb";

    protected $guarded = [];
    protected $collection = "categories";
    protected $fillable = [
        'name'
    ];
}
