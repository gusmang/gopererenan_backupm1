<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\User;
use App\Berita;
use App\Models\Product\Product;

use PhpDotEnv\DotEnv;
use App\Models\Gambar\Slides\Slides;

use App\Models\Sumbangan;
use App\Models\Danapunia;
use App\Models\Usaha;
use App\Models\Detail_Usaha;
use App\Models\Penanggung_Jawab;
use App\Models\Kategori_Usaha;
use App\Models\Jadwal_Interview;

use App\Models\Komentar_Blog;

use App\Models\Skill_TenagaKerja;
use App\Models\Karyawan;

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

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function post_sumbangan(Request $request){
        $sumbangan = Sumbangan::post_sumbangan($request);
        //$berita = Berita::get_berita_limit($request);
        //$totals = count(Product::get_data_product_aktif($request));

        //$totals = ceil($totals/Config::get("myconfig.limitProduct"));

        //echo Config::get("myconfig.limitProduct");
        //return;

        echo $sumbangan;

    	//return view('front.pages.home' , compact('data','berita'));
        //return view('front.newhome');
    }

    public function get_detail_employee(Request $request , $index){
        $api_details = Karyawan::get_detailKaryawan($request,$index);

        return response()->json($api_details);
    }

    public function get_datakomentar_cat(Request $request , $index){
        $api_details = Komentar_Blog::get_datakomentar_cat($request,$index);

        return response()->json($api_details);
    }

    public function post_datakomentar_cat(Request $request,$index){
        $api_details = Komentar_Blog::post_datakomentar_cat($request,$index);

        return response()->json(array("status"=>"success"));
    }


}
