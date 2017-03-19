<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Bolum;

  class CreateBolumsTable extends Migration
  {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bolums', function (Blueprint $table) {
        $table->increments('id');
        $table->string('bolum');
        $table->integer('user_id')->unsigned()->nullable();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
      Schema::dropIfExists('bolums');
    }
  }
