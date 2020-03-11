<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Couch extends Model
{
  protected $fillable =['name','last_name','idactivity','phone','email','comments'];

  public function activity()
  {
    return $this->belongsTo('App/Activity');
  }
}
