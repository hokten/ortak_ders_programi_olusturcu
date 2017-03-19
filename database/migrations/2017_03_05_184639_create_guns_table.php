<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Gun;

class CreateGunsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('guns', function (Blueprint $table) {
      $table->increments('id');
      $table->string('gun');
      $table->timestamps();
    });
    $gunler = array('Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma');
    foreach($gunler as $gun) {
      Gun::create([
        'gun' => $gun
      ]);
    }
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('guns');
  }
}
