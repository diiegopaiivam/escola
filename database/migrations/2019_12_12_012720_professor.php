<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Professor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('date');
            $table->string('email')->unique();
            $table->string('image', 100)->nullable();
            $table->string('phone1');
            $table->string('phone2');
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
