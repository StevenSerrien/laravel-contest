<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

  protected $fillable = [
      'question', 'answer', 'contest_id'];

  public function contest() {
    return $this->belongsTo('App\Contest');
  }
}
