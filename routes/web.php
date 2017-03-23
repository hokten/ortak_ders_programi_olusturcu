<?php
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Bolum;
use App\Program;
use App\Sinif;
use App\Ders;
use App\Ogretmen;
use App\Aktivite;
use App\Gun;
use App\Saat;
use App\Salon;
use App\User;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bolum', function () {
   $bolumler = Bolum::all();
   $kullanicilar = User::all();
   return view('bolum', ['bolumler'=>$bolumler, 'baskanlar'=>$kullanicilar]);
});

Route::post('/bolum', function (Request $request) {
  //Log::info(print_r($request, true));
  $bolum = Bolum::create($request->all());
  return response()->json($bolum);
});

Route::delete('/bolum/{bolum_id?}',function($bolum_id){
  $bolum = Bolum::destroy($bolum_id);
  return response()->json($bolum);
});



// Program ekleme bölümü
Route::get('/program', function () {
   $bolumler = Bolum::all();
  return view('program', ['bolumler'=>$bolumler]);
});

Route::post('/program', function (Request $request) {
   //Log::info(print_r($request, true));
   $bolum = Bolum::find($request->input('bolum'));
   $program = $bolum->programlar()->create(['program' => $request->input('program')]);
   return response()->json($program);
});

Route::delete('/program/{program_id?}',function($program_id){
   $program = Program::destroy($program_id);
   return response()->json($program);
});





Route::get('/sinif/{sinif_id?}',function($sinif_id){
   $sinif = Sinif::find($sinif_id);
   return view('sinif', ['sinif'=>$sinif]);
});

Route::get('/siniflar', function () {
  $bolumler = Bolum::all();
  return view('siniflar', ['bolumler'=>$bolumler]);
});

Route::post('/ders',function(Request $request){
   $ders = Ders::create(['derskodu' => $request->input('derskodu'), 'dersadi' => $request->input('dersadi'), 'derssaati' =>$request->input('derssaati')]);
   $sinif = Sinif::find($request->input('sinif'));
   $ogretmen_id = explode('_', $request->input('ogretmen'))[1];
   $ogretmen = Ogretmen::find($ogretmen_id);
   $ders->sinif()->associate($sinif);
   $ders->ogretmen()->associate($ogretmen);
   $ders->save();
   for($i=1; $i<=$request->input('derssaati'); $i++) {
      $aktivite = Aktivite::create();
      $aktivite->sinif()->associate($sinif);
      $aktivite->ogretmen()->associate($ogretmen);
      $aktivite->ders()->associate($ders);
      $aktivite->save();
   }
   $cevap = array(
      'derskodu' => $ders->derskodu,
      'dersadi' => $ders->dersadi,
      'ogretmen' => $ders->ogretmen->adsoyadi,
      'derssaati' => $ders->derssaati,
      'program' => $ders->sinif->program->program,
      'sinif' => $ders->sinif->sinif,
      'ogretim' => $ders->ogretim
   );
   return response()->json($cevap);

});

Route::delete('/ders/{ders_id?}', function($ders_id){
   $ders = Ders::destroy($ders_id);
   return response()->json($ders);
});












Route::get('/programekle', function () {
  $bolumler = Bolum::all();
  return view('programekle', ['bolumler'=>$bolumler]);
});

Route::post('/programekle', function (Request $request) {
  //Log::info(print_r(dd($request->all()), true));
  $bolumler = Bolum::all();
  $bolum_id = $request->frm_bolum;
  $program = $request->frm_program;

  $bolum = Bolum::findOrFail($bolum_id);
  $dizi = array('bolumler'=>$bolumler, 'bolum'=>$bolum);

  //Log::info(dd($dizi));
  Program::create(['program'=>$program, 'bolum_id'=>$bolum_id]);
  return view('programekle', $dizi);
});


Route::get('/programolustur/{sinif_id?}', function ($sinif_id) {
   $sinif = Sinif::find($sinif_id);
   $gunler = Gun::all();
   $saatler = Saat::all();
   $salonlar = Salon::all();
   return view('programolustur', ['gunler'=>$gunler, 'saatler' => $saatler, 'sinif' => $sinif, 'salonlar' => $salonlar]);
});

Route::get('/dersprogrami/{tip}/{kimlik}', function ($tip, $kimlik) {
   //$fff = array_column(Aktivite::where('salon_id', $kimlik)->distinct()->get(['ders_id'])->toArray(), 'ders_id');
   //dd(Ders::find($fff));
   $bolum_id = Auth::user()->bolum->id;
   $blme_ait_prglar = collect(Auth::user()->bolum->programlar()->get(['id'])->toArray())->pluck('id')->toArray();
   $blme_ait_snflar = Sinif::whereIn('program_id', $blme_ait_prglar)->get(['id'])->toArray();
   $nesne = null;
   if($tip == 'ogretmen') {
      $nesne = Ogretmen::find($kimlik);
      $dersler = Ogretmen::find($kimlik)->dersler;
   }
   elseif($tip == 'salon') {
      $nesne = Salon::find($kimlik);
      $dersler = Salon::find($kimlik)->ayrik();
   }
   $gunler = Gun::all();
   $saatler = Saat::all();
   $salonlar = Salon::all();
   return view('dersprogrami', ['gunler'=>$gunler, 'saatler' => $saatler, 'nesne' => $nesne, 'salonlar' => $salonlar, 'dersler' => $dersler]);
})->middleware('auth');










Route::post('/aktivitedenetle', function (Request $request) {
   //Log::info(print_r($request, true));
   $cksn_aktvt_sayisi_ogrt = 0;
   $cksn_aktvt_sayisi_sln = 0;
   $mesajlar = array();
   $durum = null;

   $aktivite_id = $request->input('aktiviteid');
   $gun_id = $request->input('gunid');
   $saat_id = $request->input('saatid');
   $salon_id = $request->input('salonid');
   if($salon_id == 0) {
      $durum = false;
      $mesajlar[] = "Dersin yapılacağı salonu seçmelisiniz";
      $dizi = array("durum" => $durum, "mesajlar" => $mesajlar );
      return response()->json($dizi);
   }

   // Aktivite sahibi ogretmenin o gün ve saatte başka dersi olup olmadığı kontrol ediliyor
   $cksn_aktvt_sayisi_ogrt += Aktivite::find($aktivite_id)->ogretmen->aktvt_sayisi($gun_id, $saat_id);
   $cksn_aktvt_sayisi_sln += Salon::find($salon_id)->aktvt_sayisi($gun_id, $saat_id);

   if($cksn_aktvt_sayisi_ogrt > 0) {
      $mesajlar[] = "Öğretmenin o gün ve saatte başka dersi var.";
      $durum = false;
      $dizi = array("durum" => $durum, "mesajlar" => $mesajlar );
      return response()->json($dizi);
   }

   if($cksn_aktvt_sayisi_sln > 0) {
      $mesajlar[] = "Salonda o gün ve saatte başka bir ders var.";
      $durum = false;
      $dizi = array("durum" => $durum, "mesajlar" => $mesajlar );
      return response()->json($dizi);
   }
   $aktf_aktivite = Aktivite::find($aktivite_id);
   $aktf_aktivite->gun_id = $gun_id;
   $aktf_aktivite->saat_id = $saat_id;
   $aktf_aktivite->salon_id = $salon_id;
   $aktf_aktivite->save();
   $mesajlar[] = "Aktivite başarı ile eklendi";
   $durum = true;

   $dizi = array("durum" => $durum, "mesajlar" => $mesajlar );
   return response()->json($dizi);
});

Route::put('/aktivitesifirla/{aktivite_id?}', function($aktivite_id){
   $aktivite = Aktivite::find($aktivite_id);
   $aktivite->gun_id = null;
   $aktivite->saat_id = null;
   $aktivite->save();
   return response()->json($aktivite);
});




Auth::routes();

Route::get('/home', 'HomeController@index');
