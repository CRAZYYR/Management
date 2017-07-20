<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
           protected $guarded = [];
      protected $table = 'customer';
      protected $primaryKey = 'cid';
      public $timestamps = false;

}
