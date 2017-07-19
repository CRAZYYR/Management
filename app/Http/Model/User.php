<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	 protected $guarded = [];
      protected $table = 'user';
      protected $primaryKey = 'uid';
      public $timestamps = false;
}
