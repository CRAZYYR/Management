<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User_Cache extends Model
{
    	 protected $guarded = [];
      protected $table = 'user_cache';
      protected $primaryKey = 'ucid';
      public $timestamps = false;
}
