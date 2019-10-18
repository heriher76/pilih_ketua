<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdCalonToSuarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { Schema::table('suaras', function(Blueprint $table){
        $table->foreign('id_calon') // foreignKey 
              ->references('id') // dari kolom id 
              ->on('calons') // di tabel users
              ->onUpdate('cascade') // ketika terjadi perubahan di tabel users maka akan update
              ->onDelete('cascade'); 
               });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
