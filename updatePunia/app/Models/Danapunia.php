<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Usaha;

class Danapunia extends Model
{   
    //public $timestamps = false; 
    //
    protected $fillable = ['id_dana_punia', 'id_usaha', 'jumlah_dana','aktif'];
    protected $table='tb_dana_punia';

    public static function get_dataPunia($request){
        $data = Danapunia::join("tb_usaha" , "tb_usaha.id_usaha" , "tb_dana_punia.id_usaha")->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_dana_punia.aktif","1")->orderBy("tb_dana_punia.id_usaha" , "desc")->get();

        return $data;
    }
    
    public static function get_dataPunia_inDate($awal,$akhir){
        // $data = Danapunia::leftJoin("tb_usaha" , "tb_usaha.id_usaha" , "tb_dana_punia.id_usaha")->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_dana_punia.aktif","1")->where("tb_dana_punia.tanggal_pembayaran",">=",$awal)->where("tb_dana_punia.tanggal_pembayaran","<=",$akhir)->orderBy("tb_dana_punia.id_usaha" , "desc")->get();
        
        // $data = Usaha::select(DB::raw('DISTINCT id_usaha , tb_usaha.*'))
        //   ->groupBy('id_usaha')
        //   ->orderBy('id_usaha', 'desc')->paginate(10);
          
        $data = Usaha::select(DB::raw('DISTINCT id_usaha , tb_usaha.*,tb_detail_usaha.*,tb_penanggung_jawab.*'))->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->join("tb_penanggung_jawab","tb_penanggung_jawab.id_penanggung_jawab",'tb_usaha.id_penanggung_jawab')->groupBy('id_usaha')->orderBy("id_usaha","desc")->paginate(20);
        
        $rows = array();
        
        foreach($data as $baris){
            $row = array();
            
            $datas = Danapunia::leftJoin("tb_usaha" , "tb_usaha.id_usaha" , "tb_dana_punia.id_usaha")->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_dana_punia.aktif","1")->where("tb_dana_punia.tanggal_pembayaran",">=",$awal)->where("tb_dana_punia.tanggal_pembayaran","<=",$akhir)->where("tb_usaha.id_usaha","=",$baris->id_usaha)->orderBy("tb_dana_punia.id_usaha" , "desc")->get();
            
            if(count($datas) > 0){
                $baris->jumlah_dana        = $datas[0]->jumlah_dana;
                $baris->tanggal_pembayaran = $datas[0]->tanggal_pembayaran;
                $baris->status_bayar       = "<span style='color:green;'><i class='fa fa-check'></i> Completed</span>";
            }
            else{
                $baris->jumlah_dana              = 0;
                $baris->tanggal_pembayaran       = "-";
                $baris->status_bayar             = "<span style='color:#ff0000;'><i class='fa fa-times'></i> Due Date</span>";
            }
            // if(count($datas) > 0){
                // $row['nama_usaha']    = $baris->nama_usaha;
                // $row['id_dana_punia'] = $baris->id_dana_punia;
                // $row['jumlah_dana']   = $baris->jumlah_dana;
                // $row['charge']        = $baris->charge;
                // $row['metode']        = $baris->metode;
                
                array_push($rows , $baris);
           // }
        }

        return $rows;
    }
    
    public static function get_dataPunia_inDate_notpaid($awal,$akhir){
        $data = Danapunia::leftJoin("tb_usaha" , "tb_usaha.id_usaha" , "tb_dana_punia.id_usaha")->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_dana_punia.aktif","1")->where("tb_dana_punia.tanggal_pembayaran",">=",$awal)->where("tb_dana_punia.tanggal_pembayaran","<=",$akhir)->orderBy("tb_dana_punia.id_usaha" , "desc")->get();

        return $data;
    }
    
    public static function get_totalPunia($request){
        $data = Danapunia::select(DB::raw("SUM(jumlah_dana) as paidsum"))->join("tb_usaha" , "tb_usaha.id_usaha" , "tb_dana_punia.id_usaha")->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_dana_punia.aktif","1")->orderBy("tb_dana_punia.id_usaha" , "desc")->get();

        return $data[0]->paidsum;
    }
    
    public static function get_totalPunia_inRange($awal,$akhir){
        $data = Danapunia::select(DB::raw("SUM(jumlah_dana) as paidsum"))->where("tb_dana_punia.aktif","1")->where("tb_dana_punia.tanggal_pembayaran",">=",$awal)->where("tb_dana_punia.tanggal_pembayaran","<=",$akhir)->orderBy("tb_dana_punia.id_usaha" , "desc")->get();

        return $data[0]->paidsum;
    }
    
    public static function get_detailPunia($index){
        $data = Danapunia::join("tb_usaha" , "tb_usaha.id_usaha" , "tb_dana_punia.id_usaha")->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_dana_punia.aktif","1")->where("tb_dana_punia.id_dana_punia" , $index)->orderBy("tb_dana_punia.id_usaha" , "desc")->get();

        return $data;
    }
    
    public static function get_detailPunia_only($index){
        $data = Danapunia::where("tb_dana_punia.id_dana_punia" , $index)->orderBy("tb_dana_punia.id_usaha" , "desc")->get();

        return $data;
    }

    public static function post_data_detail_pngg($request){
        
        $data                                 = new Penanggung_Jawab;
        $data->status_penanggung_jawab        = $request->t_status_pngg;
        $data->nama                           = $request->t_nama_pngg;
        $data->alamat                         = $request->t_alamat_pngg;
        $data->no_telp                        = $request->t_notelp_pngg;
        $data->alamat_usaha                   = $request->t_alamatusaha_pngg;
        $data->no_wa                          = $request->t_nowa_pngg;
        
        $data->aktif                          = "1";

        $data->save();

        return DB::getPdo()->lastInsertId();
    }

    
}
