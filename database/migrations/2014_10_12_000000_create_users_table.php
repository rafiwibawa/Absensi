<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabtan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jabatan');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_jabatan');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('tgl_lahir');
            $table->date('tempat_lahir');
            $table->string('alamat');
            $table->string('join_date');
            $table->string('barcode');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('absen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_karyawan');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('detail_absensi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_absensi');
            $table->dateTime('time_in');
            $table->dateTime('time_out');
            $table->dateTime('keterangan');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
