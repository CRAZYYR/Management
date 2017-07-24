<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Pz extends Model
{
               protected $guarded = [];
      protected $table = 'pz';
      protected $primaryKey = 'pzid';
      public $timestamps = false;
}
