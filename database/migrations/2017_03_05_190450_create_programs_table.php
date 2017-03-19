<?php

   use Illuminate\Support\Facades\Schema;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Database\Migrations\Migration;
   use App\Program;

   class CreateProgramsTable extends Migration
   {
      /**
      * Run the migrations.
      *
      * @return void
      */
      public function up()
      {
         Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('program');
            $table->integer('bolum_id')->unsigned()->nullable();
            $table->foreign('bolum_id')->references('id')->on('bolums')->onDelete('cascade');
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
         Schema::dropIfExists('programs');
      }
   }
