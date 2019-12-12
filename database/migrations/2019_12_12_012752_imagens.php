<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Imagens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('eventos_id')->unsigned();
            $table->integer('noticias_id')->unsigned();
            $table->foreign('eventos_id')->references('id')->on('eventos')->onDelete('cascade');
            $table->foreign('noticias_id')->references('id')->on('noticias')->onDelete('cascade');
            $table->timestamp('created_at')->nullable();
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
