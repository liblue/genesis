<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    public $timestamps = true;
    protected $guarded = ['id'];
    
    
      public function scopeIs_stop($query)
    {
        return $query->where('is_stop', "已启用");  //$users = App\User::popular()->active()->orderBy('created_at')->get();在控制器中使用时不需要加scope前缀
    }
     public function comment()
    {
        return $this->hasMany('App\Model\Comment');
    }
     public function article()
    {
        return $this->hasMany('App\Model\Article');
    }
    
        public function department()
    {
        return $this->belongsTo('App\Model\Department');
    }
      public function role()
    {
        return $this->belongsTo('App\Model\Role');
    }
     public function user_message()
    {
        return $this->belongsTo('App\Model\User_message');
    }
}
