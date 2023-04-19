<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
//use Hesto\MultiAuth\Traits\LogsoutGuard; 
use App\Kampus;
use App\JenisPT;
use Hash;

use Session;

use App\Kategori;
use App\User;


class AuthController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /*use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }*/

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/adminguru/dashboardkampus';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('users.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('adminguru.login');
    }
    
    

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('users');
    }


    public function runlogin(Request $request){
      //2->nonaktif, 4->terhapus
      //if($status_pt != '2' && $status_pt != '4' && $status_pt != '0'){
       
        if(Auth::guard('users')->attempt(['username' => $request->t_username, 'password' => $request->t_password, 'aktif_status' => '1'])){ 
          
          //$guru = tb_guru::where('username' , $request->email)->where('password' , Hash::make($request->password))->where('aktif' , '1')->firstOrfail();
          
          
            $pt       = Auth::guard('users')->user();
            //$namapt   = $pt->;
            $idpt     = $pt->id;
            
            $status = "";

            
            Session::put('id_usaha', $pt->id_usaha);
            Session::put('boolsessionpt', 1);

            //return redirect('administrator/home');
            
           // echo "Guru : ".var_dump(Auth::guard('adminguru')->user());
            
            
            //$this->addloginlog($request, $idpt, "2");
            return response()->json([
              'status'   => 'success'
            ]); 
          } else { 
            return response()->json([
              'status' => 'error',
              'value'  => "Invalid Login"
            ]); 
          }
        
      //} 
      
    }

    public function logout(Request $request)
    {
        auth('users')->logout();
        // session()->flush();

        session()->forget('id_usaha');
        session()->forget('boolsessionpt');

        
        return redirect('account-login');
    }
}
