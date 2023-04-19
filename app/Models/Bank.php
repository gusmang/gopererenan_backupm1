<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{   
    //public $timestamps = false; 
    //
    protected $fillable = ['id_bank', 'no_rek', 'atas_nama','aktif'];
    protected $table='tb_bank';

    public static function get_dataBank($request){

        $data = Bank::where("aktif","1")->orderBy("id_bank" , "desc")->get();

        return $data;

    }

    public static function get_dataBank_detail($request,$index){
        $data = Bank::where("aktif","1")->where("id_bank",$index)->orderBy("id_bank" , "desc")->firstOrfail();

        return $data;
    }

    public static function post_submit_banks($request){
        $originalImage= $request->file('file_upload');
        $menu_name = time().str_shuffle("abcdefghijklmnopqrstuvwxyz").".".$originalImage->getClientOriginalExtension();
        

        $thumbnailImage = \Intervention\Image\Facades\Image::make($originalImage);
        $thumbnailPath = public_path()."/bank/thumbnail/";
        $originalPath = public_path()."/bank/";
        $thumbnailImage->save($originalPath.$menu_name);
        $thumbnailImage->resize(150,150);
        $thumbnailImage->save($thumbnailPath.$menu_name); 

        $data = new Bank;

        $data->nama_bank        = $request->t_nama_bank;
        $data->no_rek           = $request->t_no_rek;
        $data->atas_nama        = $request->t_atas_nama;
        $data->logo             = $menu_name;
        $data->aktif            = "1";

        $data->save();

        return $data;
    }

    public static function update_submit_banks($request,$index){
        $originalImage= $request->file('file_upload');
        $data = "";

        if($originalImage != ""){
            $menu_name = time().str_shuffle("abcdefghijklmnopqrstuvwxyz").".".$originalImage->getClientOriginalExtension();
            
            $thumbnailImage = \Intervention\Image\Facades\Image::make($originalImage);
            $thumbnailPath = public_path()."/bank/thumbnail/";
            $originalPath = public_path()."/bank/";
            $thumbnailImage->save($originalPath.$menu_name);
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$menu_name); 

            Bank::where("id_bank" , $index)->update(array("nama_bank" => $request->t_nama_bank, "no_rek" => $request->t_no_rek, "atas_nama" => $request->t_atas_nama, "logo" => $menu_name));
        }
        else{
            Bank::where("id_bank" , $index)->update(array("nama_bank" => $request->t_nama_bank, "no_rek" => $request->t_no_rek, "atas_nama" => $request->t_atas_nama));
        }

        return $data;
    }


}
