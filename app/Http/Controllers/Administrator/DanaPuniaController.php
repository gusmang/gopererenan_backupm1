<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Barryvdh\DomPDF\Facade as PDF;

use App\User;
use App\Models\Banjar;
use App\Models\Danapunia;

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

class DanaPuniaController extends BaseController
{

        public function download_puniabulanan_pdf(Request $request,$bln,$thn){
            $data = array();

            $month = ($bln < 9) ? "0".date("m") : date("m"); 
            $awal  = $thn."-".$bln."-"."01";
            $akhir = $thn."-".$bln."-"."31";

            $bulan = array("Januari" , "Februari" , "Maret" , "April" , "Mei" , "Juni" , "Juli", 'Agustus' , "September" , "Oktober" ,"November" , "Desember");
            

            $lists = Danapunia::get_dataPunia_inDate_nolimit($request , $awal , $akhir);
            $totals = Danapunia::get_totalPunia_inRange($awal , $akhir,0,$request);
            $progress = Danapunia::get_totalPunia_inRange($awal , $akhir,1,$request);
            $due_date = Danapunia::get_totalPunia_inRange($awal , $akhir,1,$request);
            //$jml_ = Danapunia::get_dataPunia_inDate($request , $awal , $akhir);
            $datalist = $lists["data"];
            

            $data["punia"] = $datalist;
            $data["totals"] = $totals;
            $data["progress"] = $progress;
            $data["total_due"] = $lists["total_due"];
            $data["bulan"] = $bulan[$bln-1];
            $data["tahun"] = $thn;
            $data["progress"] = $progress;

            $pdf = PDF::loadView('pdf.laporan_punia.laporan_bulanan', $data);
            return $pdf->download('puniabulanan '.date("Y-m-d").'.pdf');
        }

        public function download_puniabulanan_pdf2(Request $request,$bln,$thn){
            $data = array();

            $month = ($bln < 9) ? "0".date("m") : date("m"); 
            $awal  = $thn."-".$bln."-"."01";
            $akhir = $thn."-".$bln."-"."31";

            $bulan = array("Januari" , "Februari" , "Maret" , "April" , "Mei" , "Juni" , "Juli", 'Agustus' , "September" , "Oktober" ,"November" , "Desember");
            
            $lists    = Danapunia::get_dataPunia_inDate_nolimit($request , $awal , $akhir);
            $totals   = Danapunia::get_totalPunia_inRange($awal , $akhir,0,$request);
            $progress = Danapunia::get_totalPunia_inRange($awal , $akhir,1,$request);
            $due_date = Danapunia::get_totalPunia_inRange($awal , $akhir,1,$request);
            //$jml_ = Danapunia::get_dataPunia_inDate($request , $awal , $akhir);
            $datalist = $lists["data"];
            

            $data["punia"] = $datalist;
            $data["totals"] = $totals;
            $data["progress"] = $progress;
            $data["total_due"] = $lists["total_due"];
            $data["bulan"] = $bulan[$bln-1];
            $data["tahun"] = $thn;
            //$data["progress"] = $progress;
            $pdf = PDF::loadView('pdf.laporan_punia.laporan_bulanan', $data);
            return $pdf->download('puniabulanan '.date("Y-m-d").'.pdf');
        }

        public function download_puniabulanan_pdf3(Request $request,$bln,$thn){
            $data = array();

            $month  = ($bln < 9) ? "0".date("m") : date("m"); 
            $awal   = $thn."-".$bln."-"."01";
            $akhir  = $thn."-".$bln."-"."31";

            $bulan  = array("Januari" , "Februari" , "Maret" , "April" , "Mei" , "Juni" , "Juli", 'Agustus' , "September" , "Oktober" ,"November" , "Desember");
            
            $lists  = Danapunia::get_dataPunia_inDate_nolimit($request , $awal , $akhir);
            $totals = Danapunia::get_totalPunia_inRange($awal , $akhir,0,$request);
            $banjar = $request->banjar;
            $databanjar = "";

            if($banjar != ""){
                $databanjar = Banjar::get_databanjar_detail($request->banjar);
            }
            // $progress = Danapunia::get_totalPunia_inRange($awal , $akhir,1);
            // $due_date = Danapunia::get_totalPunia_inRange($awal , $akhir,1);
            //$jml_ = Danapunia::get_dataPunia_inDate($request , $awal , $akhir);
            $datalist = $lists["data"];
            
            $data["punia"]     = $datalist;
            $data["totals"]    = $totals;
            $data["total_due"] = $lists["total_due"];
            $data["bulan"]     = $bulan[$bln-1];
            $data["tahun"]     = $thn;
            $data["banjar"]    = $banjar;
            $data["databanjar"]= $databanjar;
            
            //$data["progress"] = $progress;

            if($request->status == "1"){
                $pdf = PDF::loadView('pdf.laporan_punia.laporan_bulanan_complete', $data);
            }
            else{
                $pdf = PDF::loadView('pdf.laporan_punia.laporan_bulanan_duedate', $data);
            }

            return $pdf->download('puniabulanan '.date("Y-m-d").'.pdf');
        }
    

        public function list_datapunia_wajib(Request $request){
            $month = (date("m") < 9) ? "0".date("m") : date("m"); 
            $awal  = date("Y")."-".$month."-"."01";
            $akhir = date("Y")."-".$month."-"."31";

            $lists = Danapunia::get_dataPunia_inDate($request , $awal , $akhir);
            $datalist = $lists["data"];

            
            //die();
            print_r($datalist);
            return;
            //echo $datalist;
            return view('admin.pages.data_punia_wajib.table' ,compact('datalist'));
        }
        
        public function list_datapunia_wajib_param(Request $request , $months,$year){
            $month = ($months <= 9) ? "0".$months : $months; 
            $awal  = $year."-".$month."-"."01";
            $akhir = $year."-".$month."-"."31";

            $validasi  = Danapunia::validasi_tanggal_punia_ranged($request , $awal , $akhir);

            // echo $awal;
            // die();

            $banjarlist = Banjar::get_databanjar($request);
            // echo $awal." ".$akhir;
            // return;
            

            $datalist2 = Danapunia::get_dataPunia_inDate($request , $awal , $akhir);
            $totals    = Danapunia::get_totalPunia_inRange($awal , $akhir,0,$request);
            $progress  = Danapunia::get_totalPunia_inRange($awal , $akhir,1,$request);

            

            $datalist  = $datalist2["data"];

            // print_r($datalist);
            
            // return;

            $data = array();

            $data["punia"] = $datalist;
            $data["totals"] = $totals;
            $data["progress"] = $progress;
            $data["total_due"] = $datalist2["total_due"];
            $data["progress"] = $progress;

            // print_r($data);
            // return;

            //echo $datalist;
             return view('admin.pages.data_punia_wajib.table' ,compact('datalist' , 'data','banjarlist'));
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

        public function generate_pdf(Request $request){


            $pdf = PDF::loadView('pdf.lamaran_cv');
            return $pdf->download('laporan_sumbangan.pdf');

        }

}

?>