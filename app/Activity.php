<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable=['name','description','price_membership','price_individual','status'];

    public function couches()
    {
      return $this->hasMany('App/Couch');
    }
}
