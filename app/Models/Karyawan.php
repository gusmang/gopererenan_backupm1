<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

use Session;

class Karyawan extends Model
{   
    //public $timestamps = false; 
    //
    protected $fillable = ['id_tenaga_kerja', 'nama', 'umur','aktif'];
    protected $table='tb_tenaga_kerja';

    public static function get_dataKaryawan($request,$status){
        $statuss="$status";
        if($request->nama !=""){
            $data = Karyawan::leftJoin("tb_jadwal_interview" , "tb_jadwal_interview.id_karyawan" , "tb_tenaga_kerja.id_tenaga_kerja")->leftJoin("tb_usaha" , "tb_usaha.id_usaha" , "tb_jadwal_interview.id_usaha")
            ->leftJoin("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_tenaga_kerja.aktif","1")->where("tb_tenaga_kerja.status",$statuss)
            ->where("tb_tenaga_kerja.nama","like","%".$request->nama."%")
            ->orderBy("tb_tenaga_kerja.id_tenaga_kerja" , "desc")->get();
        }
        else{
            $data = Karyawan::leftJoin("tb_jadwal_interview" , "tb_jadwal_interview.id_karyawan" , "tb_tenaga_kerja.id_tenaga_kerja")->leftJoin("tb_usaha" , "tb_usaha.id_usaha" , "tb_jadwal_interview.id_usaha")->leftJoin("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_tenaga_kerja.aktif","1")->where("tb_tenaga_kerja.status",$statuss)->groupBy("tb_tenaga_kerja.id_tenaga_kerja")->get();
        }

        return $data;
    }

    public static function get_dataKaryawan_all($request){
        $data = Karyawan::leftJoin("tb_jadwal_interview" , "tb_jadwal_interview.id_karyawan" , "tb_tenaga_kerja.id_tenaga_kerja")->leftJoin("tb_usaha" , "tb_usaha.id_usaha" , "tb_jadwal_interview.id_usaha")->leftJoin("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_tenaga_kerja.aktif","1")->orderBy("tb_tenaga_kerja.id_tenaga_kerja" , "desc")->get();
        
        return $data;
    }

    public static function get_dataKaryawan_skill($request,$indexSkill){
        $data = Karyawan::leftJoin("tb_list_skill_tenaga_kerja" , "tb_list_skill_tenaga_kerja.id_karyawan" , "tb_tenaga_kerja.id_tenaga_kerja")->where("tb_tenaga_kerja.status","0")->where("tb_tenaga_kerja.aktif","1")->where("tb_list_skill_tenaga_kerja.id_skill",$indexSkill)->orderBy("tb_tenaga_kerja.id_tenaga_kerja" , "desc")->get();
        
        return $data;
    }

    public static function get_dataKaryawan_Interview($request,$status){
        $statuss="$status";
        if($request->nama !=""){
            $data = Karyawan::leftJoin("tb_jadwal_interview" , "tb_jadwal_interview.id_karyawan" , "tb_tenaga_kerja.id_tenaga_kerja")->leftJoin("tb_usaha" , "tb_usaha.id_usaha" , "tb_jadwal_interview.id_usaha")
            ->leftJoin("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_tenaga_kerja.aktif","1")->where("tb_tenaga_kerja.status",$statuss)->where("tb_jadwal_interview.status_diterima","0")
            ->where("tb_tenaga_kerja.nama","like","%".$request->nama."%")
            ->orderBy("tb_tenaga_kerja.id_tenaga_kerja" , "desc")->get();
        }
        else{
            $data = Karyawan::leftJoin("tb_jadwal_interview" , "tb_jadwal_interview.id_karyawan" , "tb_tenaga_kerja.id_tenaga_kerja")->leftJoin("tb_usaha" , "tb_usaha.id_usaha" , "tb_jadwal_interview.id_usaha")->leftJoin("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_jadwal_interview.status_diterima","0")->where("tb_tenaga_kerja.aktif","1")->where("tb_tenaga_kerja.status",$statuss)->orderBy("tb_tenaga_kerja.id_tenaga_kerja" , "desc")->get();
        }

        return $data;
    }

    public static function get_dataInterview($request,$status,$acc){
        $data = Karyawan::leftJoin("tb_jadwal_interview" , "tb_jadwal_interview.id_karyawan" , "tb_tenaga_kerja.id_tenaga_kerja")->leftJoin("tb_usaha" , "tb_usaha.id_usaha" , "tb_jadwal_interview.id_usaha")->leftJoin("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_jadwal_interview.status_diterima","$acc")->where("tb_tenaga_kerja.aktif","1")
        ->where("tb_tenaga_kerja.status",$status)
        ->where("tb_jadwal_interview.id_usaha",Session::get("id_usaha"))
        ->orderBy("tb_tenaga_kerja.id_tenaga_kerja" , "desc")->get();

        return $data;
    }

    public static function upload_gambar_karyawan($request,$index){
        $originalImage= $request->file('file');
        $menu_name = time().str_shuffle("abcdefghijklmnopqrstuvwxyz").".".$originalImage->getClientOriginalExtension();
        

        $thumbnailImage = \Intervention\Image\Facades\Image::make($originalImage);
        $thumbnailPath = public_path()."/karyawan/thumbnail/";
        $originalPath = public_path()."/karyawan/";
        $thumbnailImage->save($originalPath.$menu_name);
        $thumbnailImage->resize(150,150);
        $thumbnailImage->save($thumbnailPath.$menu_name); 
        
        Karyawan::where("id_tenaga_kerja",$index)->update(
            array("foto_profile"      => $menu_name
        ));
        
        return url("public/karyawan/".$menu_name);
        
    }

    public static function get_dataKaryawan_Approved($request){
        if($request->nama !=""){
            $data = Karyawan::leftJoin("tb_jadwal_interview" , "tb_jadwal_interview.id_karyawan" , "tb_tenaga_kerja.id_tenaga_kerja")->leftJoin("tb_usaha" , "tb_usaha.id_usaha" , "tb_jadwal_interview.id_usaha")
            ->leftJoin("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_tenaga_kerja.aktif","1")->where("tb_tenaga_kerja.status","1")->where("tb_jadwal_interview.status_diterima","1")->where("tb_tenaga_kerja.nama","like","%".$request->nama."%")
            ->orderBy("tb_tenaga_kerja.id_tenaga_kerja" , "desc")->get();
        }
        else{
            $data = Karyawan::leftJoin("tb_jadwal_interview" , "tb_jadwal_interview.id_karyawan" , "tb_tenaga_kerja.id_tenaga_kerja")->leftJoin("tb_usaha" , "tb_usaha.id_usaha" , "tb_jadwal_interview.id_usaha")->leftJoin("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_tenaga_kerja.aktif","1")->where("tb_jadwal_interview.status_diterima","1")->where("tb_tenaga_kerja.status","1")->orderBy("tb_tenaga_kerja.id_tenaga_kerja" , "desc")->get();
        }

        return $data;
    }

    public static function get_jmltenaga($request){
        $data = Karyawan::where("aktif","1")->orderBy("id_tenaga_kerja" , "desc")->count();

        return $data;
    }

    public static function get_detailKaryawan($request,$index){
        $data = Karyawan::where("id_tenaga_kerja",$index)->where("aktif","1")->orderBy("id_tenaga_kerja" , "desc")->firstOrfail();

        return $data;
    }

    // public static function hire_karyawan($request){
    //     //$data = Karyawan::where("id_tenaga_kerja",$index)->where("aktif","1")->orderBy("id_tenaga_kerja" , "desc")->firstOrfail();
    //     $data = Karyawan::where("id_tenaga_kerja" , $request->id)->
    //     return $data;
    // }

    
    public static function update_post_add_tenagakerja($request){
        
        Karyawan::where("id_tenaga_kerja" , $request->t_hidden_idtext)->update(
        array("nama"                         => $request->text_title_new,
              "email_karyawan"               => $request->text_email_usaha_new,
              "no_wa"                        => $request->text_telpkantor_new,
              "umur"                         => $request->text_notelp_was,
              "jenis_kelamin"                => $request->rdb_jk_karyawan,
              "alamat"                       => $request->t_alamat_usaha
        ));

        return "success";
        
    }
    

    public static function submit_dataKaryawan($request){
        $originalImage= $request->file('f_upload_gambar_mobile');
        $menu_name = time().str_shuffle("abcdefghijklmnopqrstuvwxyz").".".$originalImage->getClientOriginalExtension();
        

        $thumbnailImage = \Intervention\Image\Facades\Image::make($originalImage);
        $thumbnailPath = public_path()."/karyawan/thumbnail/";
        $originalPath = public_path()."/karyawan/";
        $thumbnailImage->save($originalPath.$menu_name);
        $thumbnailImage->resize(150,150);
        $thumbnailImage->save($thumbnailPath.$menu_name); 


        $originalImage2= $request->file('f_foto_ijasah');
        $menu_name2 = time().str_shuffle("abcdefghijklmnopqrstuvwxyz").".".$originalImage2->getClientOriginalExtension();
        

        // $thumbnailImage2 = \Intervention\Image\Facades\Image::make($originalImage2);
        // $thumbnailPath2 = public_path()."/karyawan/thumbnail/";
        $originalPath2 = public_path()."/karyawan/";
        $originalImage2->move($originalPath2,$menu_name2);
        // $thumbnailImage2->resize(150,150);
        // $thumbnailImage2->save($thumbnailPath2.$menu_name2); 
        
        $data                                 = new Karyawan;
        $data->nama                           = $request->text_title_new;
        $data->email_karyawan                 = $request->text_email_usaha_new;
        $data->no_wa                          = $request->text_telpkantor_new;
        $data->umur                           = $request->text_notelp_was;
        $data->jenis_kelamin                  = $request->rdb_jk_karyawan;
        $data->alamat                         = $request->t_alamat_usaha;
        $data->jenis_kelamin                  = $request->rdb_jk_karyawan;
        $data->facebook_link                  = $request->text_facebook_new;
        $data->instagram_link                 = $request->text_instagram_new;
        $data->foto_profile                   = $menu_name;
        $data->foto_ijazah                    = $menu_name2;
        
        $data->aktif                          = "1";

        $data->save();

        return DB::getPdo()->lastInsertId();
    }

    
}
