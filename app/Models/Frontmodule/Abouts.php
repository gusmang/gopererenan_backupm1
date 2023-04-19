<?php

namespace App\Models\Frontmodule;

use Illuminate\Database\Eloquent\Model;

class Abouts extends Model
{   
    //public $timestamps = false; 
    //
    protected $fillable = ['id_about_us', 'deskripsi', 'foto','aktif'];
    protected $table='tb_about_us';

    public static function get_databanjar($request){

        $data = Abouts::where("aktif","1")->orderBy("id_data_banjar" , "desc")->get();

        return $data;

    }

    public static function get_dataabout_detail($index){

        $data = Abouts::where("aktif","1")->orderBy("id_about_us" , "desc")->firstOrfail();

        return $data;

    }

    public static function updatedata_about($request){
        $data = Abouts::where("id_about_us" , $request->t_index)->update(array("deskripsi" => $request->DSC));

        return $data;
    }

    public static function post_editdata_banjar($request){

        $data = Abouts::where("id_data_banjar" , $request->t_id_banjar)->update(array("nama_banjar" => $request->t_nama_banjar , "alamat_banjar" => $request->t_alamat_banjar));

        return $data;

    }


    /*public function adv_city()
    {
        return $this->hasMany('App\tb_adv_city', 'id_adv_city', 'id_adv_city');
    }*/
    
}
