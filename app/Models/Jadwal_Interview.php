<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

use App\Models\Karyawan;
use App\Models\Skill_TenagaKerja;

class Jadwal_Interview extends Model
{   
    //public $timestamps = false; 
    //
    protected $fillable = ['id_jadwal_interview', 'id_karyawan', 'id_usaha','aktif'];
    protected $table='tb_jadwal_interview';
    
    public static function approve_data_tk($request){
        
        Jadwal_Interview::where("id_jadwal_interview" , $request->id)->update(
        array("status_diterima"                         => "1",
              "tanggal_diterima"                        => date("Y-m-d"),
        ));

        return "success";
        
    }

    public static function approve_data_karyawan_front($request){
        Jadwal_Interview::where("id_jadwal_interview" , $request->id)->update(
        
        array("status_diterima"                         => "1",
              "tanggal_diterima"                        => date("Y-m-d"),
        ));

        return "success";
    }

    public static function approve_data_karyawan($request){
        Jadwal_Interview::where("id_jadwal_interview" , $request->edit_hidden_textfield)->update(
        
        array("status_diterima"                         => "1",
              "jabatan"                                 => $request->edit_deskripsi_new,
              "id_jabatan"                              => $request->edit_text_title_new,
              "tanggal_diterima"                        => date("Y-m-d"),
        ));

        return "success";
    }

    public static function not_approve_data_karyawan($request){
        Jadwal_Interview::where("id_jadwal_interview" , $request->edit_hidden_textfield_delete)->update(
        
        array("status_diterima"                         => "2",
              "alasan_penolakan"                        => $request->edit_deskripsi_new_not,
              "tanggal_diterima"                        => date("Y-m-d"),
              "aktif"                                   => "0"
        ));

        Karyawan::where("id_tenaga_kerja" , $request->edit_hidden_textkaryawan_delete)->update(array("status" => "0"));

        return "success";
    }

    public static function not_approve_data_karyawan_front($request){
        Jadwal_Interview::where("id_jadwal_interview" , $request->id)->update(
        
        array("status_diterima"                         => "2",
              "alasan_penolakan"                        => $request->deskripsi,
              "tanggal_diterima"                        => date("Y-m-d"),
              "aktif"                                   => "0"
        ));

        Karyawan::where("id_tenaga_kerja" , $request->idkar)->update(array("status" => "0"));

        return "success";
    }

    public static function get_datakaryawan_usaha($request,$index){
        
        $data = Jadwal_Interview::join("tb_tenaga_kerja" , "tb_tenaga_kerja.id_tenaga_kerja","tb_jadwal_interview.id_karyawan")->where("id_usaha" , $index)->orderBy("id_jadwal_interview" , "desc")->get();

        return $data;
        
    }
    

    public static function post_add_tenagakerja_hire($request){
        
        $data                                     = new Jadwal_Interview;
        $data->id_karyawan                        = $request->text_index_karyawan_pilihan;
        $data->id_usaha                           = $request->text_index_usaha_pilihan;
        $data->tanggal_interview                  = $request->text_tanggal_interview;
        $data->jam                                = $request->text_jam_interview;
        $data->status_diterima                    = 0;
        
        $data->aktif                              = "1";

        $data->save();

        Karyawan::where("id_tenaga_kerja" , $request->text_index_karyawan_pilihan)->update(array("status" => "1"));

        return DB::getPdo()->lastInsertId();
    }

    public static function post_add_tenagakerja_hire_front($request){

        $skill    = Skill_TenagaKerja::get_dataTenagaKerja_detail($request,$request->skill);
        
        $data                                     = new Jadwal_Interview;
        $data->id_karyawan                        = $request->id;
        $data->id_usaha                           = Session::get("id_usaha");
        $data->tanggal_interview                  = $request->tanggal;
        $data->jam                                = $request->time;
        $data->tanggal_interview                  = $request->tanggal;
        $data->id_jabatan                         = $skill->id_skill_tenaga_kerja;
        $data->jabatan                            = $skill->nama_skill;
        $data->status_diterima                    = 0;
        
        $data->aktif                              = "1";

        $data->save();

        $lastId = DB::getPdo()->lastInsertId();

        Karyawan::where("id_tenaga_kerja" , $request->id)->update(array("status" => "1"));

        //Karyawan::where("id_tenaga_kerja" , $request->text_index_karyawan_pilihan)->update(array("status" => "1"));

        return $lastId;
    }

    
}
