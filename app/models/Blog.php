<?php

namespace App\models;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 
class Blog extends Eloquent
{
    protected $connection ="mongodb";

    protected $guarded = [];
    protected $collection = "blog";
    protected $fillable = [
        'title','image','description','content'
    ];
}
