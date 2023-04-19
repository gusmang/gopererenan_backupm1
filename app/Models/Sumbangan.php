<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bank;

use App\Models\Usaha;
use DB;

class Sumbangan extends Model
{   
    //public $timestamps = false; 
    //
    protected $fillable = ['id_sumbangan_sukarela', 'id_usaha', 'id_karyawan','aktif'];
    protected $table='tb_sumbangan_sukarela';

    public static function get_datasumbangan($request){

        $tgl_awal = "";
        $tgl_akhir = "";
        $data = array();

        if(isset($_GET['dateawal']) && !isset($_GET['dateakhir'])){
            $tgl_awal = $_GET['dateawal'];
            $data = Sumbangan::join("tb_bank", "tb_bank.id_bank" , "tb_sumbangan_sukarela.id_bank")->where("tb_sumbangan_sukarela.tanggal","=",$tgl_awal)->where("tb_sumbangan_sukarela.aktif","1")->orderBy("tb_sumbangan_sukarela.id_sumbangan_sukarela" , "desc")->get();
        }
        else if(isset($_GET['dateakhir'])){
            $tgl_awal = $_GET['dateawal'];
            $tgl_akhir = $_GET['dateakhir'];
            $data = Sumbangan::join("tb_bank", "tb_bank.id_bank" , "tb_sumbangan_sukarela.id_bank")->where("tb_sumbangan_sukarela.tanggal",">=",$tgl_awal)->where("tb_sumbangan_sukarela.tanggal","<=",$tgl_akhir)->where("tb_sumbangan_sukarela.aktif","1")->orderBy("tb_sumbangan_sukarela.id_sumbangan_sukarela" , "desc")->get();
        }
        else{
            $data = Sumbangan::join("tb_bank", "tb_bank.id_bank" , "tb_sumbangan_sukarela.id_bank")->where("tb_sumbangan_sukarela.aktif","1")->orderBy("tb_sumbangan_sukarela.id_sumbangan_sukarela" , "desc")->get();
        }

        return $data;

    }

    public static function approve_pembayaran_baru($request){
        $originalImage= $request->file('f_upload_news');
        $menu_name = "";

        if($originalImage != ""){
            $menu_name = time().str_shuffle("abcdefghijklmnopqrstuvwxyz").".".$originalImage->getClientOriginalExtension();
        
            $thumbnailImage = \Intervention\Image\Facades\Image::make($originalImage);
            $thumbnailPath = public_path()."/sumbangan/thumbnail/";
            $originalPath = public_path()."/sumbangan/";
            $thumbnailImage->save($originalPath.$menu_name);
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$menu_name); 
        }

        $data = Sumbangan::where("id_sumbangan_sukarela" , $request->t_hidden_index)->update(array("approved" => "1" , "bukti_pembayaran" => $menu_name));

        return $request->t_hidden_index;
    }

    public static function validasi_tanggal_sumbangan(){
        // echo date("Y-m-d H:i:s");
        // return;
        $sumb = Sumbangan::where("tanggal_jatuh_tempo" , "<=" , date("Y-m-d H:i:s"))->where("approved" , "=" , "0")->update(array("aktif" => "0"));

        return $sumb;
        // Sumbangan::where("id_sumbangan_sukarela" , $indexlast)->update(array("kode_invoice" => $sumb));
    }

    

    public static function get_data_pembayaran_detail($request,$index){
        $data = Sumbangan::where("id_sumbangan_sukarela" , $index)->firstOrfail();

        return $data;
    }

    public static function get_totalSumbangan_inRange($awal,$akhir,$status){
        $data = Sumbangan::select(DB::raw("SUM(nominal) as paidsum"))->where("aktif","$status")->where("tanggal",">=",$awal)->where("tanggal","<=",$akhir)->get();

        return $data[0]->paidsum;
    }

    public static function get_totalSumbangan_inYear($request){ 
        $awal = date("Y")."-01-01";
        $akhir = date("Y")."-12-31";

        $data = Sumbangan::select(DB::raw("SUM(nominal) as paidsum"))->where("aktif","1")->where("tanggal",">=",$awal)->where("tanggal","<=",$akhir)->get();

        return $data[0]->paidsum;
    }

    public static function get_countSumbangan_inYear($request){ 
        $awal = date("Y")."-01-01";
        $akhir = date("Y")."-12-31";

        $data = Sumbangan::where("aktif","1")->where("tanggal",">=",$awal)->where("tanggal","<=",$akhir)->count();

        return $data;
    }

    public static function get_dataSumbangan_inYear($request){ 
        $awal = date("Y")."-01-01";
        $akhir = date("Y")."-12-31";

        $data = Sumbangan::where("aktif","1")->where("tanggal",">=",$awal)->where("tanggal","<=",$akhir)->paginate(10);

        return $data;
    }

    public static function get_dataSumbangan_inYear_nolimit($request){ 
        $awal = date("Y")."-01-01";
        $akhir = date("Y")."-12-31";

        $data = Sumbangan::where("aktif","1")->where("tanggal",">=",$awal)->where("tanggal","<=",$akhir)->get();

        return $data;
    }


    public static function get_detailUsaha($request,$index){
        $data = Sumbangan::join("tb_bank", "tb_bank.id_bank" , "tb_sumbangan_sukarela.id_bank")->where("tb_sumbangan_sukarela.id_usaha",$index)->where("tb_sumbangan_sukarela.aktif","1")->orderBy("tb_sumbangan_sukarela.id_sumbangan_sukarela" , "desc")->get();

        return $data;
    }

    public static function get_datasumbangan_anonim($request,$status){

        if(isset($_GET['dateawal']) && !isset($_GET['dateakhir'])){
            $tgl_awal = $_GET['dateawal'];
            $data = Sumbangan::select([\DB::raw('sum(nominal) as totals')])->where("tanggal","=",$tgl_awal)->where("aktif","1")->where("status_donatur","=" ,"1")->where("approved","=" , $status)->orderBy("id_sumbangan_sukarela" , "desc")->get();
        }
        else if(isset($_GET['dateakhir'])){
            $tgl_awal = $_GET['dateawal'];
            $tgl_akhir = $_GET['dateakhir'];
            $data = Sumbangan::select([\DB::raw('sum(nominal) as totals')])->where("tanggal",">=",$tgl_awal)->where("tanggal","<=",$tgl_akhir)->where("approved","=" , $status)->where("aktif","1")->where("status_donatur","=" ,"1")->orderBy("id_sumbangan_sukarela" , "desc")->get();
        }
        else{
            //$data = Sumbangan::where("aktif","1")->orderBy("id_sumbangan_sukarela" , "desc")->get();
            $data = Sumbangan::select([\DB::raw('sum(nominal) as totals')])->where("status_donatur","=" ,"1")->where("aktif","1")->where("approved","="  , $status)->orderBy("id_sumbangan_sukarela" , "desc")->get();

        }

        
        return $data[0]->totals;

    }

    public static function get_datasumbangan_usaha($request,$status){

        if(isset($_GET['dateawal']) && !isset($_GET['dateakhir'])){
            $tgl_awal = $_GET['dateawal'];
            $data = Sumbangan::select([\DB::raw('sum(nominal) as totals')])->where("tanggal","=",$tgl_awal)->where("status_donatur","=" ,"3")->where("aktif","1")->where("approved","=" , $status)->orderBy("id_sumbangan_sukarela" , "desc")->get();
        }
        else if(isset($_GET['dateakhir'])){
            $tgl_awal = $_GET['dateawal'];
            $tgl_akhir = $_GET['dateakhir'];
            $data = Sumbangan::select([\DB::raw('sum(nominal) as totals')])->where("tanggal",">=",$tgl_awal)->where("tanggal","<=",$tgl_akhir)->where("status_donatur","=" ,"3")->where("approved","=" , $status)->where("aktif","1")->orderBy("id_sumbangan_sukarela" , "desc")->get();
        }
        else{
            //$data = Sumbangan::where("aktif","1")->orderBy("id_sumbangan_sukarela" , "desc")->get();
            $data = Sumbangan::select([\DB::raw('sum(nominal) as totals')])->where("status_donatur","=" ,"3")->where("aktif","1")->where("approved","=" , $status)->orderBy("id_sumbangan_sukarela" , "desc")->get();

        }

        return $data[0]->totals;

    }

    public static function get_datasumbangan_usahaIndex($request,$index){

        if(isset($_GET['dateawal']) && !isset($_GET['dateakhir'])){
            $tgl_awal = $_GET['dateawal'];
            $data = Sumbangan::select([\DB::raw('sum(nominal) as totals')])->where("id_usaha","=",$index)->where("tanggal","=",$tgl_awal)->where("status_donatur","=" ,"3")->where("aktif","1")->orderBy("id_sumbangan_sukarela" , "desc")->get();
        }
        else if(isset($_GET['dateakhir'])){
            $tgl_awal = $_GET['dateawal'];
            $tgl_akhir = $_GET['dateakhir'];
            $data = Sumbangan::select([\DB::raw('sum(nominal) as totals')])->where("id_usaha","=",$index)->where("tanggal",">=",$tgl_awal)->where("tanggal","<=",$tgl_akhir)->where("status_donatur","=" ,"3")->where("aktif","1")->orderBy("id_sumbangan_sukarela" , "desc")->get();
        }
        else{
            //$data = Sumbangan::where("aktif","1")->orderBy("id_sumbangan_sukarela" , "desc")->get();
            $data = Sumbangan::select([\DB::raw('sum(nominal) as totals')])->where("id_usaha","=",$index)->where("status_donatur","=" ,"3")->where("aktif","1")->orderBy("id_sumbangan_sukarela" , "desc")->get();

        }

        return $data[0]->totals;
    }

    public static function get_datasumbangan_karyawan($request,$status){

        if(isset($_GET['dateawal']) && !isset($_GET['dateakhir'])){
            $tgl_awal = $_GET['dateawal'];
            $data = Sumbangan::select([\DB::raw('sum(nominal) as totals')])->where("tanggal","=",$tgl_awal)->where("status_donatur","=" ,"2")->where("aktif","1")->where("approved","=" , $status)->orderBy("id_sumbangan_sukarela" , "desc")->get();
        }
        else if(isset($_GET['dateakhir'])){
            $tgl_awal = $_GET['dateawal'];
            $tgl_akhir = $_GET['dateakhir'];
            $data = Sumbangan::select([\DB::raw('sum(nominal) as totals')])->where("tanggal",">=",$tgl_awal)->where("tanggal","<=",$tgl_akhir)->where("status_donatur","=" ,"2")->where("approved","=" , $status)->where("aktif","1")->orderBy("id_sumbangan_sukarela" , "desc")->get();
        }
        else{
            //$data = Sumbangan::where("aktif","1")->orderBy("id_sumbangan_sukarela" , "desc")->get();
            $data = Sumbangan::select([\DB::raw('sum(nominal) as totals')])->where("status_donatur","=" ,"2")->where("aktif","1")->where("approved","=" , $status)->orderBy("id_sumbangan_sukarela" , "desc")->get();

        }

        return $data[0]->totals;

    }

    public static function post_sumbangan_duitku($request){
        $tgl = date("Y-m-d H:i:s");

            $exp_tanggal = manipulasiTanggal($tgl,'1','days');
            
            $data                                        = new Sumbangan;
            $data->nama                                  = $request->nama;
            $data->id_usaha                              = 0;
            $data->id_karyawan                           = 0;
            $data->status_donatur                        = $request->status_orang;
            $data->email                                 = $request->email;
            $data->nominal                               = $request->paymentAmount;
            $data->alamat                                = "";
            $data->deskripsi                             = $request->note;
            $data->id_bank                               = "2";
            $data->nama_bank_asli                        = $request->bank;
            $data->metode                                = $request->id_metode;
            $data->nama_metode                           = $request->metode;
            $data->bukti_pembayaran                      = "";
            $data->profile                               = "";
            $data->tanggal                               = date("Y-m-d");
            $data->tanggal_jatuh_tempo                   = $exp_tanggal. " ".date("H:i:s");
            $data->path_foto                             = "sumbangan/";

            
            $data->aktif                                 = "1";

            $data->save();

            $indexlast = DB::getPdo()->lastInsertId();

            $sumb = rand(0000,9999). " ".rand(0000,9999). " ".rand(0000,9999). " ".rand(0000,9999);

            Sumbangan::where("id_sumbangan_sukarela" , $indexlast)->update(array("kode_invoice" => $sumb));

            return $sumb;
    }

    public static function post_sumbangan($request){
            $tgl = date("Y-m-d H:i:s");

            $exp_tanggal = manipulasiTanggal($tgl,'1','days');
            
            $data                                        = new Sumbangan;
            $data->nama                                  = $request->nama;
            $data->id_usaha                              = 0;
            $data->id_karyawan                           = 0;
            $data->status_donatur                        = $request->status_orang;
            $data->email                                 = $request->email;
            $data->nominal                               = $request->nominal;
            $data->alamat                                = "";
            $data->deskripsi                             = $request->note;
            $data->id_bank                               = "2";
            $data->nama_bank_asli                        = $request->bank;
            $data->metode                                = $request->id_metode;
            $data->nama_metode                           = $request->metode;
            $data->bukti_pembayaran                      = "";
            $data->profile                               = "";
            $data->tanggal                               = date("Y-m-d");
            $data->tanggal_jatuh_tempo                   = $exp_tanggal. " ".date("H:i:s");
            $data->path_foto                             = "sumbangan/";

            
            $data->aktif                                 = "1";

            $data->save();

            $indexlast = DB::getPdo()->lastInsertId();

            $sumb = rand(0000,9999). " ".rand(0000,9999). " ".rand(0000,9999). " ".rand(0000,9999);

            Sumbangan::where("id_sumbangan_sukarela" , $indexlast)->update(array("kode_invoice" => $sumb));

            return $sumb;

    }

    public static function submit_post_add_sumbangan($request){
        $originalImage= $request->file('f_upload_gambar_mobile');

        if($originalImage != ""){

            $menu_name = time().str_shuffle("abcdefghijklmnopqrstuvwxyz").".".$originalImage->getClientOriginalExtension();
        
            $thumbnailImage = \Intervention\Image\Facades\Image::make($originalImage);
            $thumbnailPath = public_path()."/sumbangan/thumbnail/";
            $originalPath = public_path()."/sumbangan/";
            $thumbnailImage->save($originalPath.$menu_name);
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$menu_name); 

        }

        $file_upload    = $request->file('file_upload');
        $photo_profile = "";

        if($file_upload != ""){
            $photo_profile = time().str_shuffle("abcdefghijklmnopqrstuvwxyz").".".$file_upload->getClientOriginalExtension();
        
            $thumbnailImage = \Intervention\Image\Facades\Image::make($file_upload);
            $thumbnailPath = public_path()."/sumbangan/thumbnail/";
            $originalPath = public_path()."/sumbangan/";
            $thumbnailImage->save($originalPath.$photo_profile);
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$photo_profile); 
        }

        $nama_karyawan = "0";

        $nama_usaha = "0";
        $nama_penyumbang = "";
        $alamat_penyumbang = "";

        if($request->cmb_kategori_sumbangan == "1"){
            $nama_penyumbang = "";
            $alamat_penyumbang = "";
        }
        else if($request->cmb_kategori_sumbangan == "2"){
            $nama_penyumbang = $request->text_title_new;
            $alamat_penyumbang = $request->text_alamat_new;
        }
        else if($request->cmb_kategori_sumbangan == "3"){

            if($nama_usaha != ""){
                $nama_usaha                      = $request->cmb_nama_usaha;
            }
            
        }

        
        $data                            = new Sumbangan;
        $data->nama                      = $nama_penyumbang;
        $data->id_usaha                  = $nama_usaha;
        $data->id_karyawan               = $nama_karyawan;
        $data->status_donatur            = $request->cmb_kategori_sumbangan;
        $data->nominal                   = $request->text_minimal_pembayaran;
        $data->alamat                    = $alamat_penyumbang;
        $data->deskripsi                 = $request->text_email_usaha_new;
        $data->id_bank                   = "2";
        $data->metode                    = $request->text_namapngg_new;
        $data->bukti_pembayaran          = $menu_name;
        $data->profile                   = $photo_profile;
        $data->tanggal                   = date("Y-m-d");
        $data->path_foto                 = "sumbangan/".$menu_name;
        
        $data->aktif                     = "1";

        $data->save();

        return DB::getPdo()->lastInsertId();
    }
    
    public static function get_totalSumbangan($request){
        $data = Sumbangan::select(DB::raw("SUM(nominal) as paidsum"))->get();

        return $data[0]->paidsum;
    }

    /*public function adv_city()
    {
        return $this->hasMany('App\tb_adv_city', 'id_adv_city', 'id_adv_city');
    }*/
    
}
