<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemilihsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
A     */
     public function up()
    {
        Schema::create('pemilihs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->bigInteger('nik')->nullable();
            $table->string('nama')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('alamat')->nullable();
            $table->string('agama')->nullable();
            $table->string('status')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('masa_berlaku')->nullable();
            $table->string('tanggal_pembuatan')->nullable();
            $table->string('tempat_pembuatan')->nullable();
            $table->string('selesai_milih')->nullable();
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
        Schema::dropIfExists('pemilihs');
    }
}
