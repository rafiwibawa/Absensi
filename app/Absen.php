<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table ='absen';

    protected $fillable = [
        'id_karyawan',    
    ];

    public function absensi(){
        return $this->belongsTo('App\User','id_karyawan');
    }

    public function Detail_absensi(){
        return $this->hasMany(Detail_absensi::class,'id');
    }
}
