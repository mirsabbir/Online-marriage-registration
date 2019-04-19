<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marriage extends Model
{
    public function groom(){
        return $this->hasOne('App\Nid','id','groom_id');
    }
    public function bride(){
        return $this->hasOne('App\Nid','id','bride_id');
    }
    public function witness1(){
        return $this->hasOne('App\Nid','id','witness1_id');
    }
    public function witness2(){
        return $this->hasOne('App\Nid','id','witness2_id');
    }
    public function admin(){
        return $this->hasOne('App\Nid','id','admin_id');
    }
    public function prv_groom(){
        return $this->hasOne('App\Nid','id','prv_groom_id');
    }
    public function prv_bride(){
        return $this->hasOne('App\Nid','id','prv_bride_id');
    }
}
