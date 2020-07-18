<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_jabatan','name','email', 'barcode','password','tgl_lahir','tempat_lahir','alamat','join_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Jabatan(){
        return $this->belongsTo('App\Jabatan','id');
    }

    public function absensi(){
        return $this->hasMany('\App\User','id_karyawan');
    }

    public function punyaRule($namaRule){
        if($this->Jabatan->role->namaRule == $namaRule){
            return true;
        }
        return false;
    }
}
