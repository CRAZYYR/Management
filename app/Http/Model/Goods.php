<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
       protected $guarded = [];
      protected $table = 'goods';
      protected $primaryKey = 'gid';
      public $timestamps = false;
}
