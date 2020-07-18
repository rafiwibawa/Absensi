<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Jabatan   as Authenticatable;

class Jabatan extends Model
{
    protected $table ='jabatan';

    protected $fillable = [
        'jabatan',    
    ];

    public function Jabatan(){
        return $this->hasMany('App\User','id_jabatan');
    }

    public function role(){
        return $this->belongsTo(Role::class,'level');
    }
  
}
