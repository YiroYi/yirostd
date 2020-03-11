<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $fillable = ['name','description','status'];

    public function users()
    {
      return $this->hasMany('App\User');
    }
}
