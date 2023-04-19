<?php

namespace App\Models\Frontmodule;

use Illuminate\Database\Eloquent\Model;

class Privacy extends Model
{   
    //public $timestamps = false; 
    //
    protected $fillable = ['id_privacy', 'deskripsi', 'foto','aktif'];
    protected $table='tb_privacy';

    public static function get_databanjar($request){

        $data = Privacy::where("aktif","1")->orderBy("id_data_banjar" , "desc")->get();

        return $data;

    }

    public static function get_dataprivacy_detail($index){

        $data = Privacy::where("aktif","1")->orderBy("id_privacy" , "desc")->firstOrfail();

        return $data;

    }

    public static function post_data_banjar($request){

        $data = new Privacy;
        $data->nama_banjar   = $request->t_nama_banjar;
        $data->alamat_banjar = $request->t_alamat_banjar;

        $data->save();

        return $data;

    }

    public static function updateprivacy_policy($request){
        $data = Privacy::where("id_privacy" , $request->t_index)->update(array("deskripsi" => $request->DSC));

        return $data;
    }

    public static function post_editdata_banjar($request){

        $data = Privacy::where("id_data_banjar" , $request->t_id_banjar)->update(array("nama_banjar" => $request->t_nama_banjar , "alamat_banjar" => $request->t_alamat_banjar));

        return $data;

    }


    /*public function adv_city()
    {
        return $this->hasMany('App\tb_adv_city', 'id_adv_city', 'id_adv_city');
    }*/
    
}
