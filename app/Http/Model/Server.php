<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
     protected $guarded = [];
      protected $table = 'server';
      protected $primaryKey = 'sid';
      public $timestamps = false;
}
