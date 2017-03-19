<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinifsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('sinifs', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('sinif');
      $table->integer('ogretim');
      $table->integer('program_id')->unsigned()->nullable();
      $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
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
    Schema::dropIfExists('sinifs');
  }
}
