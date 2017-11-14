<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_owner')->unsigned();
            $table->string('route');
            $table->string('description');
            $table->string('title',50);
            $table->string('comments');
            $table->timestamps();

            $table->foreign('id_owner')->references('id')->on('users')->onDelete('cascade');

        });

        //album & image = album_image
        Schema::create('album_image',function(Blueprint $table){
            $table->integer('orderNumber')->unsigned();
            $table->integer('id_image')->unsigned();
            $table->integer('id_album')->unsigned();

            $table->foreign('id_image')->references('id')->on('image')->onDelete('cascade');
            $table->foreign('id_album')->references('id')->on('album')->onDelete('cascade');

            $table->timestamps();

            $table->primary(['orderNumber', 'id_album']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('image');
    }
}
