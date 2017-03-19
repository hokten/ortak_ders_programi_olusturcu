<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('ders', function (Blueprint $table) {
      $table->increments('id');
      $table->string('derskodu');
      $table->string('dersadi');
      $table->string('derssaati');
      $table->integer('sinif_id')->unsigned()->nullable();
      $table->foreign('sinif_id')->references('id')->on('sinifs')->onDelete('cascade');
      $table->integer('ogretmen_id')->unsigned()->nullable();
      $table->foreign('ogretmen_id')->references('id')->on('ogretmens');
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
    Schema::dropIfExists('ders');
  }
}
