<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\User;
use App\Berita;
use App\Models\Kategori_Berita;
use Barryvdh\DomPDF\Facade as PDF;

use App\Mail\Confirm_Withdraw_Request;

use App\Models\Product\Product;
use App\Models\Sumbangan;
use App\Models\Frontmodule\Privacy;
use App\Models\Frontmodule\Abouts;
use App\Models\Frontmodule\Help;

use App\Models\Usaha;
use App\Models\Detail_Usaha;
use App\Models\Danapunia;
use App\Models\Jadwal_Interview;

use App\Models\Skill_TenagaKerja;
use App\Models\Karyawan;

use App\Models\Kategori_Usaha;
use App\Models\Banjar;

use App\Models\History;

use PhpDotEnv\DotEnv;
use App\Models\Gambar\Slides\Slides;

use DB;
use File;
use Carbon;
use View;
use Blade;
use Hash;
use Config;

use Session;

use App\Helper\Helper;

use App\Mail\EmailSender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

class FrontController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request){
        $data = Slides::get_data_slides_by_position($request,2);
        $head = Slides::get_data_slides_by_position($request,1);
        $berita = Berita::get_berita_limit($request);
        //$totals = count(Product::get_data_product_aktif($request));

        //$totals = ceil($totals/Config::get("myconfig.limitProduct"));

        //echo Config::get("myconfig.limitProduct");
        //return;
        $datas = array();

        $datas["title"] = "GoPererenan - HomePage";
        $datas["meta"] = "GoPererenan - Halaman Utama Go Pererenan";

    	return view('front.pages.home' , compact('data','datas','berita','head'));
        //return view('front.newhome');
    }

    public function sumbangan(Request $request){
        $datas = array();

        $datas["title"] = "GoPererenan - Sumbangan";
        $datas["meta"] = "GoPererenan - Sumbangan Form goPererenan";

    	return view('front.pages.sumbangan' , compact('datas'));
    }

    public function sumbangan_ipaymu(Request $request){
        $datas = array();

        $datas["title"] = "GoPererenan - Sumbangan";
        $datas["meta"] = "GoPererenan - Sumbangan Form goPererenan";

    	return view('front.pages.sumbangan_ipaymu' , compact('datas'));
    }

    public function generate_pdf(Request $request){
        $pdf = PDF::loadView('pdf.lamaran_cv');

        return $pdf->download('lamaran_cv_my.pdf');
        // $options = new Options();
        // $options->set('isRemoteEnabled', true);
        // $dompdf = new Dompdf($options);
        //$pdf = #dompdf::make('dompdf.wrapper');        
        // $dompdf->setPaper("A4", "portrait");
        // $dompdf->render();
        // return $dompdf->stream("lamaran_cv_pdf.pdf", ['Attachment' => false]);

        //return $pdf->download('lamaran_cv_my.pdf');

        // $dompdf->loadHtml(ob_get_clean());

        // $dompdf->setPaper("A4", "portrait");
        // $dompdf->render();
        // $dompdf->stream("file.pdf", ['Attachment' => false]);
    }

    public function register_new(Request $request){
        $kategori = Kategori_Usaha::get_kategoriusaha();
        $banjar = Banjar::get_databanjar($request);

        $datas = array();

        $datas["title"] = "GoPererenan - New Register Page";
        $datas["meta"] = "GoPererenan - New Register Page Go Pererenan";

    	return view('front.pages.register-usaha' , compact('kategori' , 'datas','banjar'));
    }

    public function tesenv(Request $request){
        //echo getenv("DEV_URL");
    }
    
    public function donasi_transfer(Request $request){
        $datas = array();

        $datas["title"] = "GoPererenan - Donation for GoPererenan";
        $datas["meta"] = "GoPererenan - Donation for  Go Pererenan";

    	return view('front.pages.donasi_transfer' , compact('datas'));
    }

    public function tenaga_kerja(Request $request){
        $datas = array();

        $datas["title"] = "GoPererenan - Human Resources";
        $datas["meta"] = "GoPererenan - Human Resources Go Pererenan";

    	return view('front.pages.tenaga-kerja', compact('datas'));
    }

    public function daftar_tenaga_kerja(Request $request){
        $skill = Skill_TenagaKerja::get_dataTenagaKerja($request);
        $datas = array();

        $datas["title"] = "GoPererenan - Human Resources List";
        $datas["meta"] = "GoPererenan - Human Resources List Go Pererenan";

    	return view('front.pages.daftar-tenaga-kerja' , compact('skill' , 'datas'));
    }

    public function hired_employee(Request $request){
        $karyawan = Karyawan::get_dataInterview($request,"1","0");
        $datas = array();

        $datas["title"] = "GoPererenan - Hiring Human Resources";
        $datas["meta"] = "GoPererenan - Hiring Human Resources Go Pererenan";
        //$skill    = Skill_TenagaKerja::get_dataTenagaKerja_detail($request,$index);

    	return view('front.pages.hiring-tenaga-kerja' , compact('karyawan' , 'datas'));
    }

    public function post_update_profile(Request $request){
        $karyawan = Usaha::update_data_usaha_front($request);
        //$skill    = Skill_TenagaKerja::get_dataTenagaKerja_detail($request,$index);
        $datas = array();
        
        $datas["title"] = "GoPererenan - Update Human Resources";
        $datas["meta"] = "GoPererenan - Update Human Resources Go Pererenan";

    	return redirect("account/edit-profile")->with(['success' => 'Update Profile Data Berhasil']);
    }

    public function privacy(Request $request){
        $datas = array();
        $priv = Privacy::get_dataprivacy_detail($request);
        
        $datas["title"] = "GoPererenan - Privacy Policy";
        $datas["meta"] = "GoPererenan - Privacy Policy Go Pererenan";

        return view('front.pages.privacy'  , compact('datas','priv'));
    }

    public function abouts(Request $request){
        $datas = array();
        $about = Abouts::get_dataabout_detail($request);
        
        $datas["title"] = "GoPererenan - About";
        $datas["meta"] = "GoPererenan - About Go Pererenan";

        return view('front.pages.about'  , compact('datas','about'));
    }

    public function help(Request $request){
        $datas = array();
        $help = Help::get_datahelp_detail($request);
        
        $datas["title"] = "GoPererenan - Help";
        $datas["meta"] = "GoPererenan - Help for Go Pererenan";

        return view('front.pages.help'  , compact('datas','help'));
    }

    public function edit_profile(Request $request){
        $rows_usaha = Usaha::get_detailUsaha(Session::get('id_usaha'));

        // echo $rows->email_usaha;
        // return;
        $kategori = Kategori_Usaha::get_kategoriusaha();
        $banjar = Banjar::get_databanjar($request);
        //$skill    = Skill_TenagaKerja::get_dataTenagaKerja_detail($request,$index);
        $datas = array();
        
        $datas["title"] = "GoPererenan - Edit Profile Human Resources";
        $datas["meta"] = "GoPererenan - Edit Profile Go Pererenan";

    	return view('front.pages.edit-profile' , compact('rows_usaha','kategori','banjar','datas'));
    }

    public function accept_pegawai(Request $request){
        $karyawan = Jadwal_Interview::approve_data_karyawan_front($request);
        //$skill    = Skill_TenagaKerja::get_dataTenagaKerja_detail($request,$index);
        if($karyawan){
            return response()->json(["status"=>"success"]);
        }
    	//return view('front.pages.hiring-tenaga-kerja' , compact('karyawan'));
    }

    public function refuse_pegawai(Request $request){
        $karyawan = Jadwal_Interview::not_approve_data_karyawan_front($request);
        //$skill    = Skill_TenagaKerja::get_dataTenagaKerja_detail($request,$index);
        
        if($karyawan){
            return response()->json(["status"=>"success"]);
        }

    	//return view('front.pages.hiring-tenaga-kerja' , compact('karyawan'));
    }

    public function get_pegawai_list(Request $request){
        $karyawan = Karyawan::get_dataInterview($request,"1",$request->id);

        return response()->json(["list"=>$karyawan , "jumlah"=>count($karyawan)]);
    }

    public function list_tenaga_kerja(Request $request , $index){
        $karyawan = Karyawan::get_dataKaryawan_skill($request,$index);
        $skill    = Skill_TenagaKerja::get_dataTenagaKerja_detail($request,$index);

        $datas = array();
        
        $datas["title"] = "GoPererenan - List Profile Human Resources";
        $datas["meta"] = "GoPererenan - List Profile Go Pererenan";

    	return view('front.pages.list-tenaga-kerja' , compact('karyawan' , 'skill' , 'datas'));
    }

    public function hire_pegawai(Request $request){
        $karyawan = Jadwal_Interview::post_add_tenagakerja_hire_front($request);

        if($karyawan){
            return response()->json(["status"=>"success"]);
        }

    }

    public function blog_list(Request $request){
        $berita = Berita::get_berita_paging($request);
        $kategori = Kategori_Berita::get_kategoriberita($request);
        $datas = array();
        
        $datas["title"] = "GoPererenan - Blog List GoPererenan";
        $datas["meta"] = "GoPererenan - Blog List GoPererenan";

        return view('front.pages.blog-list' , compact('berita','kategori' , 'datas'));
    }

    public function blog_list_paging(Request $request){
        $berita = Berita::get_berita_paging($request);

        return response()->json($berita);
    }

    public function validasi_tanggal_sumbangan(Request $request){
        Sumbangan::validasi_tanggal_sumbangan($request);
        //return response()->json($berita);
    }

    public function blog_detail(Request $request , $slug){
        $berita = Berita::get_berita_detail($request,$slug);
        $berita_list = Berita::get_berita_limit($request);

        //$his = History::post_submit_history($request);
        //$berita = Berita::get_berita_paging($request);
        // print_r($berita);
        // die();
        $datas = array();
        
        $datas["title"] = "GoPererenan - ".$berita->slug;
        $datas["meta"] = "GoPererenan - ".$berita->slug;


        return view('front.pages.blog-detail' ,compact('berita','berita_list' , 'datas'));
    }
    

    public function mari_menyumbang(Request $request){
        $donate = Sumbangan::get_totalSumbangan_inYear($request);
        $count  = Sumbangan::get_countSumbangan_inYear($request);
        $sumb   = Sumbangan::get_dataSumbangan_inYear($request);

        $datas = array();
        
        $datas["title"] = "GoPererenan - Donation for GoPererenan ";
        $datas["meta"] = "GoPererenan - Donation for GoPererenan ";

    	return view('front.pages.sumbangan_home' , compact('donate' , 'count' , 'sumb' , 'datas'));
    }

    public function daftar_sumbangan(Request $request){
        $sumb   = Sumbangan::get_dataSumbangan_inYear($request);
        $datas = array();
        
        $datas["title"] = "GoPererenan - Donation All for GoPererenan ";
        $datas["meta"] = "GoPererenan - Donation All for GoPererenan ";

    	return view('front.pages.sumbangan_komentar_all' , compact('sumb' , 'datas'));
    }

    public function punia_tamiu(Request $request){
        //echo Session::get('id_usaha');
        $awal  = date("y")."-01-01";
        $akhir = date("y")."-12-31";

        // //$validasi = Danapunia::validasi_tanggal_sumbangan_byuser(Session::get('id_usaha'));
        // if($validasi){
        $rows = Usaha::get_detailUsaha(Session::get('id_usaha'));
        $totals = Danapunia::get_totalPuniaOne_inRange($awal,$akhir,"0",Session::get('id_usaha'));
        $datap = Danapunia::get_dataPunia_detail($request , Session::get('id_usaha'));
       // }
        //$validasi = Danapunia::validasi_tanggal_sumbangan_byuser(Session::get('id_usaha'));
        $datas = array();
        
        $datas["title"] = "GoPererenan - Punia Tamiu GoPererenan ";
        $datas["meta"] = "GoPererenan - Punia Tamiu GoPererenan ";
        
        return view('front.pages.punia-tamiu' , compact('rows' , 'totals' , 'datas','datap'));
    }

    public function post_pembayaran_baru(Request $request){
        $id_last = Danapunia::post_pembayaran_baru($request,"");
       // $datas   = Danapunia::get_dataPunia_detail_id($request , $id_last);

       if($id_last ){
           return response()->json(["status"=>"success" , "lastId" => $id_last]);
       }

        //return redirect('account/punia-tranfers?inv='.$id_last);
    }

    public function invoice_punia(Request $request){
        
    	$duitkuConfig = new \Duitku\Config("33f3a93f972b61e69c26327b39150117", "D12032");

        // $duitkuConfig->setSandboxMode(false);
        // // set sanitizer (default : true)
        // $duitkuConfig->setSanitizedMode(false);
        // // set log parameter (default : true)
        // $duitkuConfig->setDuitkuLogs(false);
        

        if (getenv("SANDBOX_MODE") == "true") {
            $duitkuConfig->setApiKey(getenv("DUITKU_API_KEY"));
            //$duitkuConfig->setApiKey("732B39FC61796845775D2C4FB05332AF"); //'YOUR_MERCHANT_KEY';
            //$duitkuConfig->setMerchantCode("D0001"); //'YOUR_MERCHANT_CODE';
            $duitkuConfig->setMerchantCode(getenv("DUITKU_MERCHANT_CODE"));
            $duitkuConfig->setSandboxMode(true);
        } else {
            $duitkuConfig->setApiKey(getenv("DUITKU_API_KEY"));
            //$duitkuConfig->setApiKey("732B39FC61796845775D2C4FB05332AF"); //'YOUR_MERCHANT_KEY';
            //$duitkuConfig->setMerchantCode("D0001"); //'YOUR_MERCHANT_CODE';
            $duitkuConfig->setMerchantCode(getenv("DUITKU_MERCHANT_CODE"));
            $duitkuConfig->setSandboxMode(false);
        }

        $usaha_detail = Usaha::get_detailUsaha($request->index_usaha);

        // Parameter PaymentMethod is optional
        // $paymentMethod      = ""; // PaymentMethod list => https://docs.duitku.com/pop/id/#payment-method
        $paymentAmount      = $request->nominal_usaha; // Amount
        $paymentMethod      = $request->paymentMethod; // Permata Bank Virtual Account
        $email              = $request->email; // your customer email
        $phoneNumber        = $usaha_detail->no_wa; // your customer phone number (optional)
        $productDetails     = $request->productDetail;
        $merchantOrderId    = time(); // from merchant, unique   
        $additionalParam    = ''; // optional
        $merchantUserInfo   = ''; // optional
        $customerVaName     = $request->nama; // display name on bank confirmation display
        $callbackUrl        = 'http://YOUR_SERVER/callback'; // url for callback
        // $returnUrl          = 'http://YOUR_SERVER/return'; // url for redirect
        $returnUrl          = url("/"); 
        $expiryPeriod       = ((60*24)*6)*60; // set the expired time in minutes

        // Customer Detail
        $firstName          = "Mr. ";
        $lastName           = $request->nama;

        // Address
        $alamat             = $usaha_detail->alamat_banjar;
        $city               = "Bali";
        $postalCode         = "80351";
        $countryCode        = "ID";

        $address = array(
            'firstName'     => $firstName,
            'lastName'      => $lastName,
            'address'       => $alamat,
            'city'          => $city,
            'postalCode'    => $postalCode,
            'phone'         => $phoneNumber,
            'countryCode'   => $countryCode
        );

        $customerDetail = array(
            'firstName'         => $firstName,
            'lastName'          => $lastName,
            'email'             => $request->email,
            'phoneNumber'       => "",
            'billingAddress'    => $address,
            'shippingAddress'   => ""
        );

        // Item Details
        $item1 = array(
            'name'      => $productDetails,
            'price'     => $paymentAmount,
            'quantity'  => 1
        );

        $itemDetails = array(
            $item1
        );

        $params = array(
            'paymentAmount'     => $paymentAmount,
            'paymentMethod'     => $paymentMethod,
            'merchantOrderId'   => $merchantOrderId,
            'productDetails'    => $productDetails,
            'additionalParam'   => $additionalParam,
            'merchantUserInfo'  => $merchantUserInfo,
            'customerVaName'    => $customerVaName,
            'email'             => $email,
            'phoneNumber'       => $phoneNumber,
            'itemDetails'       => $itemDetails,
            'customerDetail'    => $customerDetail,
            'callbackUrl'       => $callbackUrl,
            'returnUrl'         => $returnUrl,
            'expiryPeriod'      => $expiryPeriod
        );

        try {
            // createInvoice Request
            // Mail::to($me->email)->send(new Sumbangan_Request($request,$request->email));
                
            // if (Mail::failures()) {

            // }
            // else{

            // }

            //$sumbangan = Sumbangan::post_sumbangan_duitku($request);
            $responseDuitkuApi = \Duitku\Api::createInvoice($params, $duitkuConfig);
            header('Content-Type: application/json');

            $res_json = json_decode($responseDuitkuApi);

            // echo $res_json->paymentUrl;
            // return;
            Danapunia::post_pembayaran_baru($request,$res_json->paymentUrl);

            //Mail::to($request->email)->send(new Confirm_Withdraw_Request($request,$request->email));
           // Mail::to($me->email)->send(new Withdraw_Request($arr,$me->email));
            
            // if (Mail::failures()) {
            //     // return response showing failed emails
            //     //echo "Failure";s
            //     //  return false;
            // }
            // else{
            //     //echo "Success";
            //     // return false;
            // }

            //$responseDuitkuApi = \Duitku\Api::createInvoice($params, $duitkuConfig);
            // $data = array();

            // $data["status"] = "success";
            // $data["invoice"] = $sumbangan;

            //return response()->json($data);
            
            echo $responseDuitkuApi;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function punia_tranfers(Request $request){
        $validasi = Danapunia::validasi_tanggal_sumbangan_byuser(Session::get('id_usaha'));

        $datas_punia   = Danapunia::get_dataPunia_detail_id($request , $request->inv);

        // if(count($datas_punia > 0))
        // echo $datas_punia[0]->aktif_punia;
        // die();

        if($datas_punia[0]->aktif_punia == "0"){
            return redirect("account/punia-tamiu");
        }
        else{
            $datas_punia = $datas_punia[0];
        }
        //$datap = Danapunia::get_dataPunia_detail($request , Session::get('id_usaha'));
        $datas = array();
        
        $datas["title"] = "GoPererenan - Punia Transfer for GoPererenan ";
        $datas["meta"] = "GoPererenan - Punia Transfer for GoPererenan ";
        
        return view('front.pages.punia_transfer' , compact('datas' , 'datas_punia'));
    }

    public function account_login(Request $request){
        $datas = array();
        
        $datas["title"] = "GoPererenan - Login Member for GoPererenan ";
        $datas["meta"] = "GoPererenan - Login Member for GoPererenan ";
        
        return view('front.pages.login' , compact('datas'));
    }

    public function success_register(Request $request){
        $datas = array();
        
        $datas["title"] = "GoPererenan - Success Register for GoPererenan ";
        $datas["meta"] = "GoPererenan - Success Register for GoPererenan ";
        
        return view('front.pages.success-register' , compact('datas'));
    }

    // public function donasi_transfer(Request $request){
    //     return view('front.pages.donasi_transfer');
    // }

    public function submit_post_new_usaha(Request $request){
        $usaha = Usaha::post_front_usaha($request);
        $datas = array();
        
        $datas["title"] = "GoPererenan - Success Register for GoPererenan ";
        $datas["meta"] = "GoPererenan - Success Register for GoPererenan ";
        
        return view('front.pages.success-register' , compact('datas'));
    }

    // public function invoice(Request $request){
        
    // 	$duitkuConfig = new \Duitku\Config("33f3a93f972b61e69c26327b39150117", "D12032");

    //     // $duitkuConfig->setSandboxMode(false);
    //     // // set sanitizer (default : true)
    //     // $duitkuConfig->setSanitizedMode(false);
    //     // // set log parameter (default : true)
    //     // $duitkuConfig->setDuitkuLogs(false);
        

    //     if (getenv("SANDBOX_MODE") == "true") {
    //         $duitkuConfig->setApiKey(getenv("DUITKU_API_KEY"));
    //         //$duitkuConfig->setApiKey("732B39FC61796845775D2C4FB05332AF"); //'YOUR_MERCHANT_KEY';
    //         //$duitkuConfig->setMerchantCode("D0001"); //'YOUR_MERCHANT_CODE';
    //         $duitkuConfig->setMerchantCode(getenv("DUITKU_MERCHANT_CODE"));
    //         $duitkuConfig->setSandboxMode(true);
    //     } else {
    //         $duitkuConfig->setApiKey(getenv("DUITKU_API_KEY"));
    //         //$duitkuConfig->setApiKey("732B39FC61796845775D2C4FB05332AF"); //'YOUR_MERCHANT_KEY';
    //         //$duitkuConfig->setMerchantCode("D0001"); //'YOUR_MERCHANT_CODE';
    //         $duitkuConfig->setMerchantCode(getenv("DUITKU_MERCHANT_CODE"));
    //         $duitkuConfig->setSandboxMode(false);
    //     }

    //     // Parameter PaymentMethod is optional
    //     // $paymentMethod      = ""; // PaymentMethod list => https://docs.duitku.com/pop/id/#payment-method
    //     $paymentAmount      = $request->paymentAmount; // Amount
    //     $paymentMethod      = $request->paymentMethod; // Permata Bank Virtual Account
    //     $email              = $request->email; // your customer email
    //     $phoneNumber        = ""; // your customer phone number (optional)
    //     $productDetails     = $request->productDetail;
    //     $merchantOrderId    = time(); // from merchant, unique   
    //     $additionalParam    = ''; // optional
    //     $merchantUserInfo   = ''; // optional
    //     $customerVaName     = $request->nama; // display name on bank confirmation display
    //     $callbackUrl        = 'http://YOUR_SERVER/callback'; // url for callback
        // $returnUrl          = 'http://YOUR_SERVER/return'; // url for redirect
    //     $returnUrl          = url("/"); 
    //     $expiryPeriod       = ((60*24)*6)*60; // set the expired time in minutes

    //     // Customer Detail
    //     $firstName          = "Mr. ";
    //     $lastName           = $request->nama;

    //     // Address
    //     $alamat             = "Jl. Kembangan Raya";
    //     $city               = "Jakarta";
    //     $postalCode         = "11530";
    //     $countryCode        = "ID";

    //     $address = array(
    //         'firstName'     => $firstName,
    //         'lastName'      => $lastName,
    //         'address'       => $alamat,
    //         'city'          => $city,
    //         'postalCode'    => $postalCode,
    //         'phone'         => $phoneNumber,
    //         'countryCode'   => $countryCode
    //     );

    //     $customerDetail = array(
    //         'firstName'         => $firstName,
    //         'lastName'          => $lastName,
    //         'email'             => $request->email,
    //         'phoneNumber'       => "",
    //         'billingAddress'    => $address,
    //         'shippingAddress'   => ""
    //     );

    //     // Item Details
    //     $item1 = array(
    //         'name'      => $productDetails,
    //         'price'     => $paymentAmount,
    //         'quantity'  => 1
    //     );

    //     $itemDetails = array(
    //         $item1
    //     );

    //     $params = array(
    //         'paymentAmount'     => $paymentAmount,
    //         'paymentMethod'     => $paymentMethod,
    //         'merchantOrderId'   => $merchantOrderId,
    //         'productDetails'    => $productDetails,
    //         'additionalParam'   => $additionalParam,
    //         'merchantUserInfo'  => $merchantUserInfo,
    //         'customerVaName'    => $customerVaName,
    //         'email'             => $email,
    //         'phoneNumber'       => $phoneNumber,
    //         'itemDetails'       => $itemDetails,
    //         'customerDetail'    => $customerDetail,
    //         'callbackUrl'       => $callbackUrl,
    //         'returnUrl'         => $returnUrl,
    //         'expiryPeriod'      => $expiryPeriod
    //     );

    //     try {
    //         // createInvoice Request
    //         // Mail::to($me->email)->send(new Sumbangan_Request($request,$request->email));
                
    //         // if (Mail::failures()) {

    //         // }
    //         // else{

    //         // }

    //         $sumbangan = Sumbangan::post_sumbangan_duitku($request);
    //         $responseDuitkuApi = \Duitku\Api::createInvoice($params, $duitkuConfig);
    //         $data = array();

    //         $data["status"] = "success";
    //         $data["invoice"] = $sumbangan;

    //         //return response()->json($data);
    //         header('Content-Type: application/json');
    //         echo $responseDuitkuApi;
    //     } catch (Exception $e) {
    //         echo $e->getMessage();
    //     }
    // }


    public function payment_ipaymu(Request $request){
        
    	$va           = '1179001936384166'; //get on iPaymu dashboard
        $secret       = 'UqTUJTbWBaxtyToqCk0Pi0g0mFLwe1'; //get on iPaymu dashboard

        $url          = 'https://my.ipaymu.com/api/v2/payment'; //url
        $method       = 'POST'; //method

        //$dataCart = json_decode($request->t_list_product);

        //return $dataCart;
        $product = array();
        $qty = array();
        $price = array();
    

        //foreach($dataCart as $row){
        array_push($product , "Sumbangan untuk GoPererenan");
        array_push($qty , 1);
        array_push($price , str_replace(".","",$request->paymentAmount));
            //return $row->price;
        //}

        //return $price;

        //Request Body//
        $body['product']         = $product;
        $body['qty']             = $qty;
        $body['price']           = $price;
        $body['returnUrl']       = 'https://localhost/ipaymu-trial/thankyou.php';
        $body['cancelUrl']       = 'https://mywebsite.com/cancel';
        $body['notifyUrl']       = 'https://mywebsite.com/notify';
        // $body['paymentMethod']   = 'va';
        // $body['paymentChannel']  = 'BCA';
        $body['paymentMethod']   = 'bcava';
        // $body['paymentChannel']  = 'BCA';
        $body['buyerName']            = $request->nama;
        $body['buyerPhone']           = $request->no_wa;
        $body['buyerEmail']           = $request->email;
        //$body['paymentMethod'] =
        //End Request Body//

        //Generate Signature
        // *Don't change this
        $jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);
        $requestBody  = strtolower(hash('sha256', $jsonBody));
        $stringToSign = strtoupper($method) . ':' . $va . ':' . $requestBody . ':' . $secret;
        $signature    = hash_hmac('sha256', $stringToSign, $secret);
        $timestamp    = Date('YmdHis');
        //End Generate Signature
        $ch = curl_init($url);

        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'va: ' . $va,
            'signature: ' . $signature,
            'timestamp: ' . $timestamp
        );

        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_POST, count($body));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $err = curl_error($ch);
        $ret = curl_exec($ch);
        curl_close($ch);

        if($err) {
            echo $err;
        } else {
            //Response
            $ret = json_decode($ret);
            if($ret->Status == 200) {
                $sessionId  =  $ret->Data->SessionID;
                $url        =  $ret->Data->Url;
                $datas = array();

                $datas["payment_url"] = $url;
                $datas["status"] = "success";
                $datas["code"] = 200;

                return response()->json($datas);
            } else {
                echo "errors:".$ret;
            }
            //End Response
        };

    }

}
