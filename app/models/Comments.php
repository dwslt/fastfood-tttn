<?php

namespace App\models;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 

class Comments extends Eloquent
{
    
      //
      protected $connection ="mongodb";

      protected $guarded = [];
      protected $collection = "comment";
      protected $fillable = [
          'blog_id','user_id','content','avatar','name','level'
      ];
}
