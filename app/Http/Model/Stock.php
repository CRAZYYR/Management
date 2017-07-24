<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
           protected $guarded = [];
      protected $table = 'stock';
      protected $primaryKey = 'sid';
      public $timestamps = false;
}
