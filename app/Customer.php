<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    public function scopeSearch($query, $search)
      {
      return $query->where('firstname' , 'like', '%' . $search. '%')
                  ->orwhere('lastname' , 'like', '%' . $search. '%');

      }
}
