<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBolumOgretmenPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bolum_ogretmen', function (Blueprint $table) {
            $table->integer('bolum_id')->unsigned()->index();
            $table->foreign('bolum_id')->references('id')->on('bolums')->onDelete('cascade');
            $table->integer('ogretmen_id')->unsigned()->index();
            $table->foreign('ogretmen_id')->references('id')->on('ogretmens')->onDelete('cascade');
            $table->primary(['bolum_id', 'ogretmen_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bolum_ogretmen');
    }
}
