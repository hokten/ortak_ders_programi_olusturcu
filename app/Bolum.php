<?php

   namespace App;

   use Illuminate\Database\Eloquent\Model;

   class Bolum extends Model
   {
      protected $fillable = ['bolum','user_id'];

      public function programlar()
      {
         return $this->hasMany('App\Program');
      }
      public function ogretmenler()
      {
         return $this->belongsToMany('App\Ogretmen');
      }
      public function user()
      {
         return $this->belongsTo('App\User');
      }
   }
