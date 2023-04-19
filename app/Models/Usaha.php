<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Detail_Usaha;
use App\Models\Penanggung_Jawab;
use App\Models\Danapunia;

use App\Models\Usaha;
use DB;
use Config;

use Session;

use Request;

class Usaha extends Model
{   
    //public $timestamps = false; 
    //
    protected $fillable = ['id_usaha', 'id_detail_usaha', 'id_penanggung_jawab','aktif'];
    protected $table='tb_usaha';

    public static function get_datamenu($request){

        $data = Menu::where("aktif","1")->orderBy("id_menu_member" , "desc")->get();

        return $data;

    }

    public static function post_data_usaha($request){
        $res_detail                      = Detail_Usaha::post_data_detail_usaha($request);
        
        $rows_detail                     = $res_detail;
        
        $res_tgg_jawab                   = Penanggung_Jawab::post_data_pngg_jawab($request);
        
        $data                            = new Usaha;
        $data->id_detail_usaha           = $rows_detail;
        $data->id_jenis_usaha            = $request->cmb_kategori_usaha;
        $data->id_penanggung_jawab       = $res_tgg_jawab;
        $data->username                  = $request->text_username_new;
        $data->password                  = bcrypt($request->text_password_new);
        
        $data->aktif_status              = "1";

        $data->save();

        return DB::getPdo()->lastInsertId();
    }

    public static function post_front_usaha($request){
        $res_detail                      = Detail_Usaha::post_data_detail_usaha_front($request);
        
        $rows_detail                     = $res_detail;
        
        $res_tgg_jawab                   = Penanggung_Jawab::post_data_pngg_jawab($request);
        
        $data                            = new Usaha;
        $data->id_detail_usaha           = $rows_detail;
        $data->id_jenis_usaha            = $request->cmb_kategori_usaha;
        $data->id_penanggung_jawab       = $res_tgg_jawab;
        $data->username                  = $request->text_email_usaha_new;
        $data->password                  = "";
        
        $data->aktif_status              = "0";

        $data->save();

        return DB::getPdo()->lastInsertId();
    }
    
    public static function update_data_usaha($request){

        $res_detail                      = Detail_Usaha::update_data_detail_usaha($request);
    
        $res_tgg_jawab                   = Penanggung_Jawab::update_data_pngg_jawab($request);
        
        if($request->text_password_new == ""){
            Usaha::where("id_usaha" , $request->tb_hidden_usaha)->update(array("id_jenis_usaha" => $request->cmb_kategori_usaha));
        }
        else{
            Usaha::where("id_usaha" , $request->tb_hidden_usaha)->update(array("id_jenis_usaha" => $request->cmb_kategori_usaha , "password" => bcrypt($request->text_password_new)));
        }

    }

    public static function update_data_usaha_front($request){
        
        $res_detail                      = Detail_Usaha::update_data_detail_usaha_front($request);
    
        $res_tgg_jawab                   = Penanggung_Jawab::update_data_pngg_jawab_front($request);
        
        if($request->text_password_new == ""){
            Usaha::where("id_usaha" , Session::get('id_usaha'))->update(array("id_jenis_usaha" => $request->cmb_kategori_usaha));
        }
        else{
            Usaha::where("id_usaha" , Session::get('id_usaha'))->update(array("id_jenis_usaha" => $request->cmb_kategori_usaha , "password" => bcrypt($request->text_password_new)));
        }

    }

    public static function get_dataUsaha($request){

        $data = Usaha::join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->join("tb_penanggung_jawab","tb_penanggung_jawab.id_penanggung_jawab",'tb_usaha.id_penanggung_jawab')->join("tb_data_banjar","tb_data_banjar.id_data_banjar",'tb_detail_usaha.id_banjar')->orderBy("tb_usaha.id_usaha","desc")->paginate(Config::get('myconfig.limit_page'));

        return $data;

    }

    public static function get_dataUsaha_search($request){

        $nama_usaha = $request->nama_usaha;
        $banjar = $request->banjar;

        $awal = "select tb_usaha.* , tb_detail_usaha.* ,tb_penanggung_jawab.* , tb_data_banjar.*  from tb_usaha left join tb_detail_usaha on tb_detail_usaha.id_detail_usaha = tb_usaha.id_detail_usaha left join tb_penanggung_jawab on tb_penanggung_jawab.id_penanggung_jawab = tb_usaha.id_penanggung_jawab ".
                "left join tb_data_banjar on tb_data_banjar.id_data_banjar = tb_detail_usaha.id_banjar where ";

        $param_search = "";


        if(isset($nama_usaha)){
            $param_search .= "tb_detail_usaha.nama_usaha like '%".trim($nama_usaha)."%' and ";
        }

        if(isset($banjar)){
            $param_search .= "tb_detail_usaha.id_banjar = '".trim($banjar)."' and ";
        }

        $awal .= $param_search;

        $offset = 0;
        $pages = 1;

        if(isset($request->page)){
            $page   = ($request->page <= 1 ? "0" : ($request->page-1));
            $pages  = $request->page;

            $offset = ($page * Config::get('myconfig.limit_page'));
            //$offset = ($offset > 0 ? ($offset-1) : $offset);
        }

        $query_res = substr($awal , 0 , strlen($awal)-5)." group by tb_usaha.id_usaha limit $offset,".Config::get('myconfig.limit_page');

        $dataAll = DB::select(substr($awal , 0 , strlen($awal)-5)." group by tb_usaha.id_usaha");

        $lastPage = ceil(count($dataAll)/Config::get('myconfig.limit_page'));
        $prevPage = ($pages <= 2 ? ($pages-1) : $pages);

        $data = DB::select($query_res);
        $list = array();

        // echo $query_res;
        // die();

        $myPaginator = new \Illuminate\Pagination\LengthAwarePaginator($data, count($dataAll), Config::get('myconfig.limit_page'), $pages, ['path' => Request::url() ]);
        return $myPaginator;
    }

    public static function post_search_usaha($request){
        $data = Usaha::join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->join("tb_penanggung_jawab","tb_penanggung_jawab.id_penanggung_jawab",'tb_usaha.id_penanggung_jawab')->where("tb_detail_usaha.nama_usaha","like","%".$request->input('val')."%")->orderBy("id_usaha","desc")->paginate(10);

        return $data;
    }
    
    public static function get_detailUsaha($index){
        $data = Usaha::join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->join("tb_penanggung_jawab","tb_penanggung_jawab.id_penanggung_jawab",'tb_usaha.id_penanggung_jawab')->join("tb_data_banjar" , "tb_data_banjar.id_data_banjar" , "tb_detail_usaha.id_banjar")->where("id_usaha",$index)->firstOrfail();

        return $data;
    }

    public static function get_detailUsaha_byEmail($index){
        $data = Usaha::join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->join("tb_penanggung_jawab","tb_penanggung_jawab.id_penanggung_jawab",'tb_usaha.id_penanggung_jawab')->join("tb_data_banjar" , "tb_data_banjar.id_data_banjar" , "tb_detail_usaha.id_banjar")->where("email",$index)->firstOrfail();

        return $data;
    }

    public static function update_pembayaran_baru($request,$index){
        $sumb = rand(0000,9999). " ".rand(0000,9999). " ".rand(0000,9999). " ".rand(0000,9999);

        Danapunia::where("id_dana_punia" , $index)->update(array("on_progress" => "0"));

        return $index;
    }
    
    public static function post_pembayaran_baru($request,$method){
        //$slide = "0";
        $originalImage= $request->file('f_bukti_pembayaran');

        $menu_name = time().str_shuffle("abcdefghijklmnopqrstuvwxyz").".".$originalImage->getClientOriginalExtension();
    
        $thumbnailImage = \Intervention\Image\Facades\Image::make($originalImage);
        $thumbnailPath = public_path()."/bukti_pembayaran/thumbnail/";
        $originalPath = public_path()."/bukti_pembayaran/";
        $thumbnailImage->save($originalPath.$menu_name);
        $thumbnailImage->resize(150,150);
        $thumbnailImage->save($thumbnailPath.$menu_name); 

        $sumb = rand(0000,9999). " ".rand(0000,9999). " ".rand(0000,9999). " ".rand(0000,9999);

        $data                            = new Danapunia;
        $data->id_usaha                  = $request->t_hidden_usaha;
        $data->jumlah_dana               = $request->teks_input_pembayarans;
        $data->kode_invoice              = $sumb;
        $data->charge                    = 0;
        $data->tanggal_pembayaran        = $request->tanggal_bukti_pembayaran;
        $data->tanggal_pembayaran_alt    = $request->tanggal_bukti_pembayaran_riil;
        $data->bulan                     = $request->t_bulan_pembayaran;
        $data->tahun                     = date("Y");
        $data->bukti_pembayaran          = $menu_name;
        $data->charge                    = 0;
        $data->metode                    = ucwords($method);
        $data->on_progress               = 0;
        
        $data->aktif                     = "1";

        $data->save();
       
        return DB::getPdo()->lastInsertId();
    }

    public static function post_editdata_menu($request){

        $slide = "0";

        if($request->chk_is_slide != ""){
            $slide = "1";
        }

        $originalImage= $request->file('f_upload_menu');
        

        if($originalImage != ""){
            $menu_name = time().str_shuffle("abcdefghijklmnopqrstuvwxyz").".".$originalImage->getClientOriginalExtension();
        
            $thumbnailImage = \Intervention\Image\Facades\Image::make($originalImage);
            $thumbnailPath = public_path()."/menu/icon/thumbnail/";
            $originalPath = public_path()."/menu/icon/";
            $thumbnailImage->save($originalPath.$menu_name);
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$menu_name); 

            $data = Menu::where("id_menu_member" , $request->t_id_menu)->update(array("menu" => $request->t_nama_menu , "url" => $request->t_url_menu, "urutan" => $request->t_urutan_menu, "is_slide" => $slide, "foto" => $menu_name, "url_foto" => "/menu/icon/".$menu_name));

        }
        else{
            $data = Menu::where("id_menu_member" , $request->t_id_menu)->update(array("menu" => $request->t_nama_menu , "url" => $request->t_url_menu, "urutan" => $request->t_urutan_menu, "is_slide" => $slide));
        }


       
        return $data;

    }

    public static function approve_usaha($index){
        Usaha::where("id_usaha" , $index)->update(array("aktif_status" => "1"));

        return "success";
    }

    /*public function adv_city()
    {
        return $this->hasMany('App\tb_adv_city', 'id_adv_city', 'id_adv_city');
    }*/
    
}
