<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_absensi extends Model
{
    protected $table ='detail_absensi';

    protected $fillable = [
        'id_absensi','time_in','time_out','keterangan',    
    ];

    public function Detail_absensi(){
        return $this->belongsTo(Absen::class,'id_absensi');
    }
}
