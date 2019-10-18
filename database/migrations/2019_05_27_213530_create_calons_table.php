<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nama")->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('agama')->nullable();
            $table->string("status")->nullable();
            $table->string('ttl')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->integer('umur')->nullable();
            $table->text('visi')->nullable();
            $table->text("misi")->nullable();
            $table->string("foto")->nullable();
            $table->boolean("verif_calon")->nullable();
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
        Schema::dropIfExists('calons');
    }
}
