<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Usermonth extends Model
{
    	 protected $guarded = [];
      protected $table = 'usermonth';
      protected $primaryKey = 'umid';
      public $timestamps = false;
}
