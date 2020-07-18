<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    public function Jabatan(){
        return $this->hasMany(Jabatan::class);
    }
}
