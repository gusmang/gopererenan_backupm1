<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\User;
use App\Models\Menu;
use App\Models\Bank;

use DB;
use File;
use Carbon;
use View;
use Blade;
use Hash;
use Config;

use App\Helper\Helper;

use App\Mail\EmailSender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use Session;

class BankController extends BaseController
{

    public function ambil_listmenu(Request $request){
        $datalist = Menu::get_datamenu($request);

        echo json_encode($datalist);
    }

    public function ambil_bank(Request $request , $index){
        $bank = Bank::get_dataBank_detail($request , $index);

        return response()->json($bank);
    }

    public function post_data_menu(Request $request){
        if($request->t_id_menu == ""){
            $datalist = Menu::post_data_menu($request);
        }
        else{
            $datalist = Menu::post_editdata_menu($request);
        }

        return redirect("administrator/datamenu");
    }

    public function hapusbanjar(Request $request){
        if($request->id != ""){
            Banjar::post_hapus_banjar($request);
        }
        
        echo "success";
        //return redirect("administrator/databanjar");
    }

    public function index_bank(Request $request){
        // $datalist = Banjar::get_databanjar($request);
        // echo $datalist;
        $datalist = Bank::get_dataBank($request);

        return view('admin.pages.data_bank.table' ,compact('datalist'));
    }

    public function post_submit_banks(Request $request){
        $bank = Bank::post_submit_banks($request);

        //echo "success";
        return redirect(Config::get('myconfig.adminPage').'/data_akunbank')->with(['success' => 'Banks Data Berhasil Di Simpan']);
    }   

    public function update_submit_banks(Request $request , $index){
        $bank = Bank::update_submit_banks($request , $index);

        //echo "success";
        return redirect(Config::get('myconfig.adminPage').'/data_akunbank')->with(['success' => 'Update Banks Data Berhasil']);
    }

}
?>