<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment',255);
            $table->integer('id_owner')->unsigned();
            $table->integer('id_album')->unsigned();
            $table->integer('orderNumber')->unsigned();
           
            $table->timestamps();

            $table->foreign('id_owner')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign(['orderNumber','id_album'])->references(['orderNumber','id_album'])->on('album_image')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
