<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAktivitesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('aktivites', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('gun_id')->unsigned()->nullable();
      $table->integer('saat_id')->unsigned()->nullable();
      $table->integer('salon_id')->unsigned()->nullable();
      $table->integer('sinif_id')->unsigned()->nullable();
      $table->integer('ogretmen_id')->unsigned()->nullable();
      $table->integer('ders_id')->unsigned()->nullable();
      $table->foreign('gun_id')->references('id')->on('guns')->onDelete('cascade');
      $table->foreign('saat_id')->references('id')->on('saats')->onDelete('cascade');
      $table->foreign('salon_id')->references('id')->on('salons')->onDelete('cascade');
      $table->foreign('sinif_id')->references('id')->on('sinifs')->onDelete('cascade');
      $table->foreign('ogretmen_id')->references('id')->on('ogretmens')->onDelete('cascade');
      $table->foreign('ders_id')->references('id')->on('ders')->onDelete('cascade');
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
    Schema::dropIfExists('aktivites');
  }
}
