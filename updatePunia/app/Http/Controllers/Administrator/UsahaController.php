<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\User;
use App\Models\Banjar;
use App\Models\Danapunia;
use App\Models\Usaha;
use App\Models\Detail_Usaha;
use App\Models\Penanggung_Jawab;
use App\Models\Kategori_Usaha;


use DB;
use File;
use Carbon;
use View;
use Blade;
use Hash;

use App\Helper\Helper;

use App\Mail\EmailSender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use Session;

class UsahaController extends BaseController
{

        public function ambil_listUsaha(Request $request){
            $usaha = Usaha::get_dataUsaha($request);
            $kategori = Kategori_Usaha::get_kategoriusaha();
            $banjar = Banjar::get_databanjar($request);
            
            // print_r($usaha);
            // return;
            
             return view('admin.pages.data_usaha.table',compact('usaha','kategori','banjar'));
            //$datalist = Banjar::get_databanjar($request);
            //echo $datalist;
        }
        
        public function get_detailUsaha(Request $request , $index){
            $rows = Usaha::get_detailUsaha($index);
            
            $arr_sts_punia = array();
            $arr_danas = array();
            
            for($an = 1; $an <= 12; $an++){
                $awal = $an;
                
                if($an < 10){
                    $awal = "0".$an;    
                }
                
                $awal_bln  = date("Y")."-".$awal."-01";
                $akhir_bln = date("Y")."-".$awal."-31";
                
                //echo $awal_bln."<br />".$akhir_bln."<p></p>";
                
                $cek_dana = Danapunia::where("id_usaha",$index)->where("tanggal_pembayaran", ">=" , $awal_bln)->where("tanggal_pembayaran", "<=" , $akhir_bln)->count();
                
                //echo "tes".$cek_dana."<p></p>";
                
                if($cek_dana > 0){
                    array_push($arr_sts_punia,"y");
                    
                    $dana_rows = Danapunia::where("id_usaha",$index)->where("tanggal_pembayaran", ">=" , $awal_bln)->where("tanggal_pembayaran", "<=" , $akhir_bln)->firstOrfail();
                    
                    array_push($arr_danas,$dana_rows);
                }
                else{
                    array_push($arr_sts_punia,"n");
                    //array_push($arr_sts_punia,"y");
                }
                
                
            }
            $kategori = Kategori_Usaha::get_kategoriusaha();
            $banjar = Banjar::get_databanjar($request);
            
            //print_r($arr_danas);
            //return;
            
            return view('admin.pages.data_usaha.detail',compact('rows','arr_sts_punia','arr_danas','kategori','banjar'));
            //$datalist = Banjar::get_databanjar($request);
            //echo $datalist;
        }
        
        public function submit_post_add_usaha(Request $request){
            $usaha = Usaha::post_data_usaha($request);
            //echo "tes";
            
            return redirect("administrator/data_usaha");
           // return view('admin.pages.data_usaha.table',compact('usaha'));
        }
        
        public function upload_gambar_usaha(Request $request , $index){
            $usaha = Detail_Usaha::update_logo_usaha($request , $index);
            
            echo $usaha;
        }
        
        public function update_post_add_usaha(Request $request){
            $usaha = Usaha::update_data_usaha($request);
            //echo "tes";
            
            return redirect("administrator/detail_usaha/".$request->tb_hidden_usaha);
           // return view('admin.pages.data_usaha.table',compact('usaha'));
        }
        
        public function get_pembayaran_detail(Request $request,$index){
            
            $detail_dana = Danapunia::get_detailPunia_only($index);
            
            echo json_encode($detail_dana);
            
        }
        
        public function post_pembayaran_baru(Request $request,$method){
            $usaha = Usaha::post_pembayaran_baru($request,$method);
            
            $detail_dana = Danapunia::get_detailPunia($usaha);
            
            echo json_encode($detail_dana);
            //echo "tes";
            
            //return redirect("administrator/data_usaha");
           // return view('admin.pages.data_usaha.table',compact('usaha'));
        }

        public function post_data_banjar(Request $request){

        if($request->t_id_banjar == ""){
            $datalist = Banjar::post_data_banjar($request);
        }
        else{
            $datalist = Banjar::post_editdata_banjar($request);
        }

            return redirect("administrator/databanjar");
        }

        public function hapusbanjar(Request $request){

            if($request->id != ""){
                Banjar::post_hapus_banjar($request);
            }
            

            echo "success";
    
                //return redirect("administrator/databanjar");
        }

        

        public function index(Request $request){

            // $datalist = Banjar::get_databanjar($request);

            // echo $datalist;
            $datalist = Banjar::get_databanjar($request);

            return view('admin.pages.data_banjar.table' ,compact('datalist'));
        }

}
?>