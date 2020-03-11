<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailsale extends Model
{
    protected $fillable = [
      'idsale',
      'idactivity',
      'idcouch',
      'idcost',
      'idschedule',
      'coach_fee',
      'membership_fee',
      'individual_fee',
      'cost_expense'
    ];

    public $timestamps = false;
}
