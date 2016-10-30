<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
}

public function contest() {
  return $this->belongsTo('App\Contest')
}
