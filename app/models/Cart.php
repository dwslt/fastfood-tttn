<?php

namespace App\models;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 

class Cart extends Eloquent
{
    protected $connection ="mongodb";

    protected $guarded = [];
    protected $collection = "carts";
    protected $fillable = [
        'image','name','price','qty','id_product','id_user'
    ];
}
