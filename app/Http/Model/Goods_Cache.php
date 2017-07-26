<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Goods_Cache extends Model
{
           protected $guarded = [];
      protected $table = 'goods_cache';
      protected $primaryKey = 'gid';
      public $timestamps = false;
}
