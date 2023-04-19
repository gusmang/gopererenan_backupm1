<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{   
    //public $timestamps = false; 
    //
    protected $fillable = ['id_berita', 'isi_berita', 'judul_berita', 'video','foto','aktif'];
    protected $table='tb_berita';

    /*public function adv_city()
    {
        return $this->hasMany('App\tb_adv_city', 'id_adv_city', 'id_adv_city');
    }*/

    public static function get_berita_paging($request){
        $pagings = Berita::join("tb_kategori_berita" , "tb_kategori_berita.id_kategori_berita","tb_berita.id_kategori_berita")->where("tb_berita.aktif", "1");

        if($request->keyword != ""){
            $pagings = $pagings->where("tb_berita.judul_berita", 'like' , '%'.$request->keyword.'%');
        }

        if($request->cat != ""){
            $pagings = $pagings->where("tb_berita.id_kategori_berita", '=' , ''.$request->cat.'');
        }

        $pagings = $pagings->orderBy("tb_berita.id_berita","desc")->paginate(5);

        return $pagings;
    }

    public static function get_berita_detail($request , $slug){
        $data = Berita::where("aktif", "1")->where("slug", "$slug")->orderBy("id_berita","desc")->firstOrfail();

        return $data;
    }

    public static function get_berita(){
        $ambil_berita = Berita::orderBy("id_berita","desc")->get();

        $data = [];
        

        foreach($ambil_berita as $rows){
            $tgl_b = explode(" ", $rows["tanggal_berita"]);
            $rows["formatted_tanggal"] = tgl_indo($tgl_b[0]);
            $data[] = $rows;
        }

        return $data;
    }

    public static function get_berita_limit(){
        $ambil_berita = Berita::orderBy("id_berita","desc")->limit(3)->get();

        $data = [];
        

        foreach($ambil_berita as $rows){
            $tgl_b = explode(" ", $rows["tanggal_berita"]);
            $rows["formatted_tanggal"] = tgl_indo($tgl_b[0]);
            $data[] = $rows;
        }

        return $data;
    }

    public function get_berita_by_id($index){
        $ambil_berita = Berita::where('id_berita' , $index)->get();

        return $ambil_berita;
    }
    
}
