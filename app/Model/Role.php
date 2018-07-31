<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    
     protected $guarded = ['id'];
     
     
      public function user()
    {
        return $this->hasMany('App\Model\User');
    }
    
      public function department()
    {
        return $this->belongsTo('App\Model\Department');
    }
}
