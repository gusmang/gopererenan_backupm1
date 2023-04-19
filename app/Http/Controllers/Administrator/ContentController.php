<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Frontmodule\Abouts;
use App\Models\Frontmodule\Help;
use App\Models\Frontmodule\Privacy;

use Config;

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

class ContentController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dataprivacy_pererenan(Request $request){
        $privacy = Privacy::get_dataprivacy_detail($request);

        //return redirect("administrator/dataprivacy_pererenan" , compact('privacy'));
        return view("admin.pages.data_content.form_privacy" , compact('privacy'));
    }

    public function dataabout_us(Request $request){
        $abouts  = Abouts::get_dataabout_detail($request);
        
        return view("admin.pages.data_content.form_about" , compact('abouts'));
        //eturn view('admin.pages.data_banjar.table' ,compact('datalist'));
    }

    public function datahelp_center(Request $request){
        $help    = Help::get_datahelp_detail($request);

        //return redirect("administrator/datahelp_center" , compact('help'));
        return view("admin.pages.data_content.form_help" , compact('help'));
    }

    public function updateabout_us(Request $request){
        $help    = Abouts::updatedata_about($request);

        //return redirect("administrator/datahelp_center" , compact('help'));
        return redirect('administrator/dataabout_us');
    }

    public function updateprivacy_policy(Request $request){
        $help    = Privacy::updateprivacy_policy($request);
        

        return redirect('administrator/dataprivacy_pererenan');
        //return redirect("administrator/datahelp_center" , compact('help'));
        //return view("admin.pages.data_content.form_about" , compact('help'));
    }

    public function updatehelp_policy(Request $request){
        $help    = Help::updatehelp_policy($request);

        //return redirect("administrator/datahelp_center" , compact('help'));
        return redirect('administrator/datahelp_center');
        //return view("admin.pages.data_content.form_about" , compact('help'));
    }

}
