<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class General extends Model
{   
    //public $timestamps = false; 
    //
    protected $fillable = ['id_general', 'alamat_banjar','aktif'];
    protected $table='tb_general';

    public static function get_datageneral($request){

        $data = General::where("aktif","1")->orderBy("id_general" , "desc")->get();

        return $data;

    }

    public static function post_datageneral($request){
        $data = General::where("aktif","1")->orderBy("id_general" , "desc")->firstOrfail();

        $update = General::where("id_general" , $data->id_general)->update(array("nama" => $request->t_general_info, "no_wa" => $request->t_no_wa, "email" => $request->t_email_info, "alamat_banjar"=> $request->t_alamat_new, "nama_penanggung_jawab"=> $request->t_penanggung_jawab));

        return $update;
    }

}
