<?php

namespace App\models;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 

class History extends Eloquent
{
    protected $connection ="mongodb";

    protected $guarded = [];
    protected $collection = "history";
    protected $fillable = [
        'email','phone','name','id_user','price','status','item'
    ];
}
