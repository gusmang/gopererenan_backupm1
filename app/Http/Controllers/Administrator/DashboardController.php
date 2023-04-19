<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\User;
use App\Models\Banjar;
use App\Models\Danapunia;
use App\Models\Sumbangan;
use App\Models\Usaha;
use App\Models\Detail_Usaha;
use App\Models\Penanggung_Jawab;
use App\Models\Karyawan;

use App\Models\General;

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
use Config;

class DashboardController extends BaseController
{

    public function indexhome(Request $request){
        $usaha = Usaha::get_dataUsaha($request);
        $jml_karyawan = Karyawan::get_jmltenaga($request);

        $totalpunia = Danapunia::get_totalPunia($request);
        $totalsumbangan = Sumbangan::get_totalSumbangan($request);
        
         return view('admin.pages.home',compact('usaha','totalpunia','totalsumbangan','jml_karyawan'));
    }

    public function general(Request $request){
        $general = General::get_datageneral($request);

        return view('admin.pages.data_general.form', compact('general'));
    }

    public function post_general(Request $request){
        $general = General::post_datageneral($request);

        return redirect(Config::get('myconfig.adminPage').'/datageneral')->with(['success' => 'Update General Data Berhasil']);
    }
    
    public function get_danapunia_range(Request $request){
        
        $arr_punia     = array();
        $arr_sumbangan = array();
        
        $arr_bln = array("01","02","03","04","05","06","07","08","09","10","11","12");
        
        $ans = 0;
        
        foreach($arr_bln as $rows){
            $awal = date("Y")."-".$rows."-01";
            $akhir = date("Y")."-".$rows."-31";
            
            //$totals = array();
            
            
            $totalpunia_range = Danapunia::get_totalPunia_inRange($awal,$akhir,0,$request);
            
            $total = 0;
            
            if($totalpunia_range != ""){
                $total = $totalpunia_range;
            }
            
            $arr_punia[$ans]["punia"] = $total;
            
            $ans++;
            
            //array_push($arr_punia,$totals);
        }
        
        $arr_json = array();
        
        $arr_punias = array();
        
        $arr_punias["data_punia"] = $arr_punia;
        
        $arr_json["total_punia"] = json_encode($arr_punia);
        
        echo json_encode($arr_json);
        
    }

    public function get_sumbangan_range(){
        
        $arr_punia     = array();
        $arr_sumbangan = array();
        
        $arr_bln = array("01","02","03","04","05","06","07","08","09","10","11","12");
        
        $ans = 0;
        
        foreach($arr_bln as $rows){
            $awal = date("Y")."-".$rows."-01";
            $akhir = date("Y")."-".$rows."-31";
            
            //$totals = array();
            
            
            $totalpunia_range = Sumbangan::get_totalSumbangan_inRange($awal,$akhir,1);
            
            $total = 0;
            
            if($totalpunia_range != ""){
                $total = $totalpunia_range;
            }
            
            $arr_punia[$ans]["punia"] = $total;
            
            $ans++;
            
            //array_push($arr_punia,$totals);
        }
        
        $arr_json = array();
        
        $arr_punias = array();
        
        $arr_punias["data_sumbangan"] = $arr_punia;
        
        $arr_json["total_sumbangan"] = json_encode($arr_punia);
        
        echo json_encode($arr_json);
        
    }
        

}

?>

