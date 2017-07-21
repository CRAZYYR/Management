<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
         protected $guarded = [];
      protected $table = 'sales';
      protected $primaryKey = 'sid';
      public $timestamps = false;
}
