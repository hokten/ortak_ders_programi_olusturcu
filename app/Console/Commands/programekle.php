<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Bolum;
use App\Program;
use App\Sinif;
use App\Salon;
use App\Ogretmen;
use App\Ders;

class programekle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ekle:program';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $blm_elo = Bolum::create(['bolum' => 'Elektronik ve Otomasyon']);
       $blm_bil = Bolum::create(['bolum' => 'Bilgiayar Teknolojileri']);

       // Programlar ekleniyor
       $pro_etp = $blm_elo->programlar()->create(['program' => 'Elektronik Teknolojisi']);
       $pro_eht = $blm_elo->programlar()->create(['program' => 'Elektronik Haberleşme Teknolojisi']);
       $pro_oto = $blm_elo->programlar()->create(['program' => 'Kontrol ve Otomasyon Teknolojisi']);
       $pro_bil = $blm_bil->programlar()->create(['program' => 'Bilgisayar Programcılığı']);

       // Ogretmenler ekleniyor
       $ogr_hho = $blm_bil->ogretmenler()->create(['unvani' => 'Yrd. Doç. Dr.', 'adsoyadi' => 'H. Hüseyin ÖKTEN']);
       $ogr_sst = $blm_bil->ogretmenler()->create(['unvani' => 'Öğr. Gör.', 'adsoyadi' => 'Sabri Serkan TAN']);
       $ogr_ait = $blm_bil->ogretmenler()->create(['unvani' => 'Öğr. Gör. Dr.', 'adsoyadi' => 'Aslıhan BABUR']);
       $ogr_na = $blm_elo->ogretmenler()->create(['unvani' => 'Öğr. Gör.', 'adsoyadi' => 'Nail ALTINTAŞ']);
       $ogr_at = $blm_elo->ogretmenler()->create(['unvani' => 'Öğr. Gör.', 'adsoyadi' => 'Ayhan TETİK']);
       $ogr_ip = $blm_elo->ogretmenler()->create(['unvani' => 'Öğr. Gör.', 'adsoyadi' => 'İsmail PEKGÖZ']);

       // Salonlar ekleniyor
       $sln_502 = Salon::create(['salonadi' => '502']);
       $sln_503 = Salon::create(['salonadi' => '503']);

       // Siniflar ekleniyor
       $snf_etp_1_1 = $pro_etp->siniflar()->create(['sinif' => 1, 'ogretim'=> 1]);
       $snf_etp_2_1 = $pro_etp->siniflar()->create(['sinif' => 2, 'ogretim'=> 1]);
       $snf_bil_1_1 = $pro_bil->siniflar()->create(['sinif' => 1, 'ogretim'=> 1]);
       $snf_bil_1_2 = $pro_bil->siniflar()->create(['sinif' => 1, 'ogretim'=> 2]);
       $snf_bil_2_1 = $pro_bil->siniflar()->create(['sinif' => 2, 'ogretim'=> 1]);
       $snf_bil_2_2 = $pro_bil->siniflar()->create(['sinif' => 2, 'ogretim'=> 2]);

       //Dersler ekleniyor
       $drs_bil202 = Ders::create(['derskodu' => 'BIL202', 'dersadi' => 'İnternet Programcılığı-II', 'derssaati' =>4]);
       $drs_bil202->sinif()->associate($snf_bil_2_1);
       $drs_bil202->ogretmen()->associate($ogr_hho);
       $drs_bil202->save();



    }
}
