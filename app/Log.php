<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
  protected $fillable = [
      'user_id', 'ipaddress'
  ];

  public function user()
  {
          return $this->hasOne('App\User');
  }

}
