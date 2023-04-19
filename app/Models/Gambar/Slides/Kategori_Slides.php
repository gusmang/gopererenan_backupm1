<?php

namespace App\Models\Gambar\Slides;

use Illuminate\Database\Eloquent\Model;

class Kategori_Slides extends Model
{   
    //public $timestamps = false; 
    //
    protected $fillable = ['id_data_banjar', 'nama_banjar', 'alamat_banjar','aktif'];
    protected $table='tb_kategori_slides';

    public static function get_datakategori($request){

        $data = Kategori_Slides::where("aktif","1")->orderBy("id_kategori_slides" , "desc")->get();

        return $data;

    }

    public static function get_datakategori_nama($request){

        $data = Kategori_Slides::where("aktif","1")->orderBy("urutan" , "asc")->get();

        return $data;

    }

    public static function post_data_kategori($request){

        $data                     = new Kategori_Slides;
        $data->nama_kategori      = $request->t_nama_banjar;
        $data->aktif              = "1";

        $data->save();

        return $data;

    }

    public static function post_hapus_banjar($request){

        $data = Banjar::where("id_data_banjar" , $request->id)->update(array("aktif" => "0"));

        return $data;

    }

    public static function post_editdata_banjar($request){

        $data = Banjar::where("id_data_banjar" , $request->t_id_banjar)->update(array("nama_banjar" => $request->t_nama_banjar , "alamat_banjar" => $request->t_alamat_banjar));

        return $data;

    }


    /*public function adv_city()
    {
        return $this->hasMany('App\tb_adv_city', 'id_adv_city', 'id_adv_city');
    }*/
    
}
