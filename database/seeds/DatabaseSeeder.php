<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::insert([
            [
                'namaRule'=> 'Admin'
            ],
            [
                'namaRule'=> 'User'
            ],
        ]);

        \App\Jabatan::insert([
            [
                'jabatan'=> 'Manager',
                'level'=> '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan'=> 'HRD',
                'level'=> '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        \App\User::insert([
            [
                'id_jabatan'=> '1',
                'name'=>'Rafi Wibawa Aruan',
                'email'=> 'rafinew1997@gmail.com',
                'password'=> Hash::make('1234qwer'),
                'tgl_lahir'=> date('Y-m-d',strtotime(now())),
                'tempat_lahir'=> 'Kabun',
                'alamat'=> 'Kabun',
                'join_date'=> date('Y-m-d',strtotime(now())),
                'barcode'=>"1".date('m',strtotime(now())).date('Y',strtotime(now()))."1",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jabatan'=> '2',
                'name'=>'Tiyas Oktober',
                'email'=> 'TiyasOktyarini@gmail.com',
                'password'=> Hash::make('1234qwer'),
                'tgl_lahir'=> date('Y-m-d',strtotime(now())),
                'tempat_lahir'=> 'Kabun',
                'alamat'=> 'Kabun',
                'join_date'=> date('Y-m-d',strtotime(now())),
                'barcode'=>"2".date('m',strtotime(now())).date('Y',strtotime(now()))."2",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
