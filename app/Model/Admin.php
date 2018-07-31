<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    public $timestamps = true;
    protected $guarded = ['id'];
    
    
    
    
     public function scopeActive($query)
    {
         
      
        return $query->where('active', 1);  //$users = App\User::popular()->active()->orderBy('created_at')->get();在控制器中使用时不需要加scope前缀
    }
    
    public function scopeOfType($query, $type)//甚至可以接受参数 $users = App\User::ofType('admin')->get();  调用时要带上参数
    {
        return $query->where('type', $type);
    }
      public function scopeType($query)//甚至可以接受参数 $users = App\User::ofType('admin')->get();  调用时要带上参数
    {
        return $query->where('type', '普通管理员');
    }
       public function article()
    {
        return $this->hasMany('App\Model\Article');
    }
     
       
}
