<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
      public $updated_at = true;//只有created_at被填充当前时间
      protected $guarded = ['id'];
      
      
       public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
      public function article()
    {
        return $this->belongsTo('App\Model\Article');
    }
    public function scopeis_del($query){
        return $query->where('is_del', "未删除");  //
   
        
    }
      
    
    
}
