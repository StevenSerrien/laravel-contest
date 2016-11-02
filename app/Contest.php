<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contest extends Model
{

  protected $fillable = [
      'name', 'description', 'start_date', 'end_date'
  ];

  public function scopeContestsUntilToday ($query) {
    $query->where('end_date', '<=', Carbon::now()->addDays(1));
  }
  public function questions()
  {
          return $this->hasMany('App\Question');
  }

  public function users() {
    return $this->belongsToMany('App\Contest');
  }

}
