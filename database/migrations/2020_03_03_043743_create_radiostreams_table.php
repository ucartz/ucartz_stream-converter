<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRadiostreamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radioStreams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stream_name', 100);
            $table->string('server', 100);
            $table->integer('port'); 
            $table->string('mount', 100);
            $table->string('public_private', 100);
            $table->string('url', 250);
            $table->integer('userId')->unsigned();
            $table->foreign('userId')->references('userId')->on('users')->onDelete('cascade');
            $table->integer('status');
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
        Schema::dropIfExists('radioStreams');
    }
}
