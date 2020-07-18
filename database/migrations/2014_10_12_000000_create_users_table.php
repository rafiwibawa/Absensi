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
        

        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('id_jabatan')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('tgl_lahir');
            $table->string('tempat_lahir');
            $table->string('barcode')->unique();
            $table->string('alamat');
            $table->string('join_date');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('jabatan', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('jabatan');
            $table->unsignedInteger('level')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('absen', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('id_karyawan')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('detail_absensi', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('id_absensi')->nullable();
            $table->dateTime('time_in');
            $table->dateTime('time_out')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('roles',function (Blueprint $table){
            $table->Increments('id');
            $table->string('namaRule');
        });

        Schema::table('jabatan', function (Blueprint $table) {
            $table->foreign('level')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('absen', function (Blueprint $table){
            $table->foreign('id_karyawan')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('users', function (Blueprint $table){
            $table->foreign('id_jabatan')->references('id')->on('jabatan')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('detail_absensi', function (Blueprint $table){
            $table->foreign('id_absensi')->references('id')->on('absen')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('jabatan');
        Schema::dropIfExists('absen');
        Schema::dropIfExists('detail_absensi');
        Schema::dropIfExists('roles');
    }
}
