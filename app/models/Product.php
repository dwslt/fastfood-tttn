<?php

namespace App\models;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 

class Product extends Eloquent
{
    protected $connection ="mongodb";

    protected $guarded = [];
    protected $collection = "product";
    protected $fillable = [
        'id_user','id_category','id_brand','name','price','status','sale','company','image','detail'
    ];
}
