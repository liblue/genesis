<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User_message extends Model
{
    //
      
    
      protected $guarded = ['id'];
      
      
        public function user()
    {
        return $this->belongsTo('App\Model\User','comuser_id');
    }
      public function article()
    {
        return $this->belongsTo('App\Model\Article');
    }
      
}
