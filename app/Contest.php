<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contest extends Model
{

  protected $fillable = [
      'name', 'description', 'start_date', 'end_date'
  ];

  public function scopeContestsStartingFromToday ($query) {
    $query->where('start_date', '>=', Carbon::today());
  }
  public function questions()
  {
          return $this->hasMany('App\Question');
  }

  public function users() {
    return $this->belongsToMany('App\User');
  }

}
