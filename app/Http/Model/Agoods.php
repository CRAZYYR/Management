<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Agoods extends Model
{
           protected $guarded = [];
      protected $table = 'agoods';
      protected $primaryKey = 'agid';
      public $timestamps = false;
}
