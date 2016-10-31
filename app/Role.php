<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];



    // A role can have many users
    public function users() {
      return $this->belongsToMany('App\User');
    }
}
