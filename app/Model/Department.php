<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
     protected $guarded = ['id'];
     
     public function user()
    {
        return $this->hasMany('App\Model\User');
    }
    
    public function role()
    {
        return $this->hasMany('App\Model\Role');
    }
    
}
