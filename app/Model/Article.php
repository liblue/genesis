<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    
    public $timestamps = true;//只有created_at被填充当前时间
    protected $guarded = ['id'];
    
    
     public function comment()
    {
        return $this->hasMany('App\Model\Comment');
    }
    
        public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
       public function admin()
    {
        return $this->belongsTo('App\Model\Admin');
    }
    
     public function user_message()
    {
        return $this->belongsTo('App\Model\User_message');
    }
}
