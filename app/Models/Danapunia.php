<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Usaha;
use App\Models\Bank;
use Carbon\Carbon;

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

    public static function get_dataPunia_detail($request,$id_usaha){
        $validate = Danapunia::where("id_usaha" , "=" , $id_usaha)->where("tanggal_jatuh_tempo" , "<=" , tanggal_timezone_new())->where("on_progress" , "=" , "1")->update(array("aktif" => "0"));

       // $data = "";

        //if($validate){
        $data = Danapunia::select("tb_usaha.*" , "tb_dana_punia.aktif as punia_aktif", "tb_dana_punia.*" , "tb_detail_usaha.*")->join("tb_usaha" , "tb_usaha.id_usaha" , "tb_dana_punia.id_usaha")->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_dana_punia.id_usaha","$id_usaha")->where("tb_dana_punia.aktif","1")->orderBy("tb_dana_punia.id_usaha" , "desc")->get();
        //}

        // dd($data);
        // die();

        return $data;
    }

    public static function get_dataPunia_detail_id($request,$id_usaha){
        $data = Danapunia::select("tb_usaha.*" , "tb_dana_punia.*" , "tb_detail_usaha.*" , "tb_dana_punia.aktif as aktif_punia")->join("tb_usaha" , "tb_usaha.id_usaha" , "tb_dana_punia.id_usaha")->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_dana_punia.id_dana_punia","$id_usaha")->get();

        // dd($data);
        // die();

        return $data;
    }

    public static function validasi_tanggal_sumbangan(){
        $data = Danapunia::where("tanggal_jatuh_tempo" , "<=" , date("Y-m-d H:i:s"))->where("on_progress" , "=" , "1")->update(array("aktif" => "0"));

        return $data;
        // Sumbangan::where("id_sumbangan_sukarela" , $indexlast)->update(array("kode_invoice" => $sumb));
    }
    

    public static function validasi_tanggal_sumbangan_byuser($index){
        //date_default_timezone_set('Asia/Jakarta');
        //$date = date('Y-m-d H:i:s', strtotime(date("Y-m-d H:i:s")));
        // $date_stamp = Carbon::parse(date("Y-m-d H:i:s"))->format('Y-m-d H:i:s');
        // $date = Carbon::createFromFormat('Y-m-d H:i:s', date("Y-m-d H:i:s"), 'Asia/Jakarta');
        // $date->setTimezone('Asia/Jakarta');
        // echo tanggal_timezone_new();
        // die();
        // echo tanggal_timezone_new();
        // die();
        $data = Danapunia::where("id_usaha" , "=" , $index)->where("tanggal_jatuh_tempo" , "<=" , tanggal_timezone_new())->where("on_progress" , "=" , "1")->update(array("aktif" => "0"));

        return $data;
        // Sumbangan::where("id_sumbangan_sukarela" , $indexlast)->update(array("kode_invoice" => $sumb));
    }

    public static function get_dataPunia_inDate($request,$awal,$akhir){
        // $data = Danapunia::leftJoin("tb_usaha" , "tb_usaha.id_usaha" , "tb_dana_punia.id_usaha")->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_dana_punia.aktif","1")->where("tb_dana_punia.tanggal_pembayaran",">=",$awal)->where("tb_dana_punia.tanggal_pembayaran","<=",$akhir)->orderBy("tb_dana_punia.id_usaha" , "desc")->get();
        
        // $data = Usaha::select(DB::raw('DISTINCT id_usaha , tb_usaha.*'))
        //   ->groupBy('id_usaha')
        //   ->orderBy('id_usaha', 'desc')->paginate(10);

        // if($request->status  != ""){
        //     $data = Usaha::select(DB::raw('DISTINCT id_usaha , tb_usaha.*,tb_detail_usaha.*,tb_penanggung_jawab.*'))->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->join("tb_penanggung_jawab","tb_penanggung_jawab.id_penanggung_jawab",'tb_usaha.id_penanggung_jawab')
        //     ->join("tb_dana_punia","tb_dana_punia.id_usaha",'tb_usaha.id_usaha')
        //     ->where("tb_dana_punia.")
        //     ->groupBy('id_usaha')->orderBy("id_usaha","desc")->paginate(20);
        // }
        // else{

        $sp_awal = explode("-" , $awal);

        $bln = $sp_awal[1];

        $bln = $bln <= 9 ? "0".$bln : $bln;

        $sp_range_awal = $sp_awal[0]."-".$bln."-25";

        //echo $sp_range_awal;
        //die();

        if($request->status == "2"){
            // echo $sp_range_awal;
            // die();
            $data = Usaha::select(DB::raw('DISTINCT id_usaha , tb_usaha.*,tb_detail_usaha.*,tb_penanggung_jawab.*,tb_data_banjar.nama_banjar as banjar_addr'))->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->join("tb_data_banjar" , "tb_data_banjar.id_data_banjar" , "tb_detail_usaha.id_banjar")->join("tb_penanggung_jawab","tb_penanggung_jawab.id_penanggung_jawab",'tb_usaha.id_penanggung_jawab')->where( 'tb_detail_usaha.tanggal_daftar' , '<=' , $sp_range_awal)->groupBy('id_usaha')->orderBy("id_usaha","desc");
        }
        else{
            $data = Usaha::select(DB::raw('DISTINCT id_usaha , tb_usaha.*,tb_detail_usaha.*,tb_penanggung_jawab.*,tb_data_banjar.nama_banjar as banjar_addr'))->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->join("tb_data_banjar" , "tb_data_banjar.id_data_banjar" , "tb_detail_usaha.id_banjar")->join("tb_penanggung_jawab","tb_penanggung_jawab.id_penanggung_jawab",'tb_usaha.id_penanggung_jawab')->groupBy('id_usaha')->orderBy("id_usaha","desc");
        }

        if($request->banjar != ""){
            $data = $data->where("tb_detail_usaha.id_banjar" , $request->banjar);
        }

        $data = $data->get();
        // }
        $rows = array();
        $due_total = 0;
        
        foreach($data as $baris){
            $row = array();

            $datas = Danapunia::leftJoin("tb_usaha" , "tb_usaha.id_usaha" , "tb_dana_punia.id_usaha")->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_dana_punia.aktif","1")->where("tb_dana_punia.tanggal_pembayaran_alt",">=",$awal)->where("tb_dana_punia.tanggal_pembayaran_alt","<=",$akhir)->where("tb_usaha.id_usaha","=",$baris->id_usaha)->orderBy("tb_dana_punia.id_usaha" , "desc")->where("tb_dana_punia.aktif","1")->get();

            $exx = explode("-" , $awal);

            $arr_months = array("Januari" , "Februari" , "Maret" , "April" , "Mei" , "Juni" , "Juli" , "Agustus" , "September" , "Oktober" , "November" , "Desember");

            //$exx_subs1 = substr($exx[1],0,1);
            //$exx       = $exx_subs1 == "0" ? str_replace("0","",$exx) : $exx;
            $months    = $arr_months[($exx[1]-1)]." ".$exx[0];

            $arg_wa = "Hello ".$baris->nama_usaha.", We would like to remind you that your Punia Payment, ".$months.", is due for 3 days,  Please cooperate to make a Punia payment immediately. Thank you";

            $link_news = "https://api.whatsapp.com/send?phone=6281936384166&text=".rawurlencode($arg_wa);

            $link_email = url("administrator/kirim_reminder/".$baris->email);
            
            if(count($datas) > 0){
                
                $baris->jumlah_dana             = $datas[0]->jumlah_dana;
                $baris->tanggal_pembayaran      = $datas[0]->tanggal_pembayaran;
                $baris->tanggal_pembayaran_alt  = $datas[0]->tanggal_pembayaran_alt;
                $baris->id_dana_punia           = $datas[0]->id_dana_punia;
                $baris->on_progress             = $datas[0]->on_progress;
                $baris->alamat                  = $baris->alamat_banjar;
                $baris->minimal_pembayaran      = $baris->minimal_bayar;
                $baris->banjar_addr             = $baris->banjar_addr;
                //$baris->real_dana               = $baris->minimal_pembayaran;
                if($datas[0]->on_progress == "0"){
                    $baris->status_bayar            = "<span style='color:green;'><i class='fa fa-check'></i> Completed </span>";
                }
                else{
                    //$baris->status_bayar            = "<span style='color:orange;'><i class='fa fa-check'></i> On Progress </span>";
                    $baris->status_bayar            = "<span style='color:#FF6600;'><i class='fa fa-times'></i> Pending </span> <br /> <a href='".$link_news."' target='_blank'> <i class='fab fa-whatsapp'></i> Kirim Reminder </a> <br /> <a href='".$link_email."' target='_blank'> <i class='fa fa-envelope'></i> Kirim Email  </a> <br /><a href='javascript:void(0)' onclick='approveModal(".$datas[0]->id_dana_punia.")'> <i class='fa fa-check'></i> Approve Pembayaran </a>";
                }

                if($request->status != ""){
                    if($request->status == "2"){
                        continue;
                    }
                }

            }
            else{

                $approved = "";

                if(count($datas) > 0 && $datas[0]->on_progress == "1"){
                    $approved = "<br /> <a href='javascript:void(0)' onclick='approveModal(".$datas[0]->id_dana_punia.")'> <i class='fa fa-check'></i> Approve Pembayaran </a>";
                }

                if($baris->created_at  < $akhir ){

                    $due_total                                 += $baris->minimal_bayar;

                }

                // echo "$baris->created_at < $akhir";
                // die();
                

                $baris->jumlah_dana                        = 0;
                $baris->tanggal_pembayaran_alt             = "-";
                $baris->tanggal_pembayaran                 = "-";
                $baris->id_dana_punia                      = "";
                $baris->minimal_pembayaran                 = $baris->minimal_bayar;
                $baris->alamat                             = $baris->alamat_banjar;
                //$baris->real_dana                          = $baris->minimal_pembayaran;
                $baris->banjar_addr                        = $baris->banjar_addr;
                $baris->status_bayar                       = "<span style='color:#ff0000;'><i class='fa fa-times'></i> Due Date</span> <br /> <a href='".$link_news."' target='_blank' style=''> <i class='fab fa-whatsapp' aria-hidden='true' style='color:green; font-size:16px;'></i> Kirim Reminder </a> ".$approved;

                if($request->status != ""){
                    if($request->status == "1"){
                        continue;
                    }
                }

            }
            
            array_push($rows , $baris);
        }
        //$rows["total_due"] = $due_total;

        $array_list = array();
        $array_list["data"] = $rows;
        $array_list["total_due"] = $due_total;
        // print_r($rows);
        // die();

        return $array_list;
    }

    public static function validasi_tanggal_punia(){
        // echo date("Y-m-d H:i:s");
        // return;
        $sumb = Danapunia::where("tanggal_jatuh_tempo" , "<=" , tanggal_timezone_new())->where("on_progress" , "=" , "1")->update(array("aktif" => "0"));

        return $sumb;
        // Sumbangan::where("id_sumbangan_sukarela" , $indexlast)->update(array("kode_invoice" => $sumb));
    }

    public static function validasi_tanggal_punia_ranged($request , $awal , $akhir){
        // echo tanggal_timezone_new();
        // die();
        $sumb = Danapunia::where("tanggal_jatuh_tempo" , "<=" , tanggal_timezone_new())->where("on_progress" , "=" , "1")->update(array("aktif" => "0"));

        return $sumb;
        // Sumbangan::where("id_sumbangan_sukarela" , $indexlast)->update(array("kode_invoice" => $sumb));
    }


    public static function get_dataPunia_inDate_nolimit($request,$awal,$akhir){
        // $data = Danapunia::leftJoin("tb_usaha" , "tb_usaha.id_usaha" , "tb_dana_punia.id_usaha")->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_dana_punia.aktif","1")->where("tb_dana_punia.tanggal_pembayaran",">=",$awal)->where("tb_dana_punia.tanggal_pembayaran","<=",$akhir)->orderBy("tb_dana_punia.id_usaha" , "desc")->get();
        
        // $data = Usaha::select(DB::raw('DISTINCT id_usaha , tb_usaha.*'))
        //   ->groupBy('id_usaha')
        //   ->orderBy('id_usaha', 'desc')->paginate(10);

        // if($request->status  != ""){
        //     $data = Usaha::select(DB::raw('DISTINCT id_usaha , tb_usaha.*,tb_detail_usaha.*,tb_penanggung_jawab.*'))->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->join("tb_penanggung_jawab","tb_penanggung_jawab.id_penanggung_jawab",'tb_usaha.id_penanggung_jawab')
        //     ->join("tb_dana_punia","tb_dana_punia.id_usaha",'tb_usaha.id_usaha')
        //     ->where("tb_dana_punia.")
        //     ->groupBy('id_usaha')->orderBy("id_usaha","desc")->paginate(20);
        // }
        // else{

            $sp_awal = explode("-" , $awal);

            $bln = $sp_awal[1];
    
            $bln = $bln <= 9 ? "0".$bln : $bln;
    
            $sp_range_awal = $sp_awal[0]."-".$bln."-25";
            //echo $sp_range_awal;
            //die();
            if($request->status == "2"){
                // echo $sp_range_awal;
                // die();
                $data = Usaha::select(DB::raw('DISTINCT id_usaha , tb_usaha.*,tb_detail_usaha.*,tb_penanggung_jawab.*,tb_data_banjar.nama_banjar as banjar_addr'))->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->join("tb_data_banjar" , "tb_data_banjar.id_data_banjar" , "tb_detail_usaha.id_banjar")->join("tb_penanggung_jawab","tb_penanggung_jawab.id_penanggung_jawab",'tb_usaha.id_penanggung_jawab')->where( 'tb_detail_usaha.tanggal_daftar' , '<=' , $sp_range_awal)->groupBy('id_usaha')->orderBy("id_usaha","desc");
            }
            else{
                $data = Usaha::select(DB::raw('DISTINCT id_usaha , tb_usaha.*,tb_detail_usaha.*,tb_penanggung_jawab.*,tb_data_banjar.nama_banjar as banjar_addr'))->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->join("tb_data_banjar" , "tb_data_banjar.id_data_banjar" , "tb_detail_usaha.id_banjar")->join("tb_penanggung_jawab","tb_penanggung_jawab.id_penanggung_jawab",'tb_usaha.id_penanggung_jawab')->groupBy('id_usaha')->orderBy("id_usaha","desc");
            }

            if($request->banjar != ""){
                $data = $data->where("tb_detail_usaha.id_banjar" , $request->banjar);
            }
    
            $data = $data->get();
        
        // }

        $rows = array();
        $due_total = 0;
        
        foreach($data as $baris){
            $row = array();

            $datas = Danapunia::leftJoin("tb_usaha" , "tb_usaha.id_usaha" , "tb_dana_punia.id_usaha")->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_dana_punia.aktif","1")->where("tb_dana_punia.tanggal_pembayaran_alt",">=",$awal)->where("tb_dana_punia.tanggal_pembayaran_alt","<=",$akhir)->where("tb_usaha.id_usaha","=",$baris->id_usaha)->where("tb_dana_punia.aktif","=","1")->orderBy("tb_dana_punia.id_usaha" , "desc")->get();
            
            if(count($datas) > 0  && $datas[0]->on_progress == "0"){
                $baris->jumlah_dana             = $datas[0]->jumlah_dana;
                $baris->tanggal_pembayaran      = $datas[0]->tanggal_pembayaran;
                $baris->tanggal_pembayaran_alt  = $datas[0]->tanggal_pembayaran_alt;
                $baris->id_dana_punia           = $datas[0]->id_dana_punia;
                $baris->on_progress             = $datas[0]->on_progress;
                //$baris->real_dana               = $baris->minimal_pembayaran;
                if($datas[0]->on_progress == "0"){
                    $baris->status_bayar            = "<span style='color:green;'><i class='fa fa-check'></i> Completed </span>";
                }
                else{
                    $baris->status_bayar            = "<span style='color:orange;'><i class='fa fa-times'></i> Due Date </span>";
                }
                
                if($request->status != ""){
                    if($request->status == "2"){
                        continue;
                    }
                }
            }
            else{
                $due_total                                 += $baris->minimal_bayar;
                $baris->jumlah_dana                        = 0;
                $baris->tanggal_pembayaran_alt             = "-";
                $baris->tanggal_pembayaran                 = "-";
                $baris->id_dana_punia                      = "";
                //$baris->real_dana                          = $baris->minimal_pembayaran;
                $baris->status_bayar                       = "<span style='color:#ff0000;'><i class='fa fa-times'></i> Due Date</span>";

                if($request->status != ""){
                    if($request->status == "1"){
                        continue;
                    }
                }

            }
            
            array_push($rows , $baris);
           // }
        }

        //$rows["total_due"] = $due_total;

        $array_list = array();
        $array_list["data"] = $rows;
        $array_list["total_due"] = $due_total;

        // print_r($rows);
        // die();

        return $array_list;
    }
    
    public static function get_dataPunia_inDate_notpaid($awal,$akhir){
        $data = Danapunia::leftJoin("tb_usaha" , "tb_usaha.id_usaha" , "tb_dana_punia.id_usaha")->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_dana_punia.aktif","1")->where("tb_dana_punia.tanggal_pembayaran_alt",">=",$awal)->where("tb_dana_punia.tanggal_pembayaran_alt","<=",$akhir)->orderBy("tb_dana_punia.id_usaha" , "desc")->get();

        return $data;
    }
    
    public static function get_totalPunia($request){
        $data = Danapunia::select(DB::raw("SUM(jumlah_dana) as paidsum"))->join("tb_usaha" , "tb_usaha.id_usaha" , "tb_dana_punia.id_usaha")->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_dana_punia.aktif","1")->where("tb_dana_punia.on_progress","0")->orderBy("tb_dana_punia.id_usaha" , "desc")->get();

        return $data[0]->paidsum;
    }
    
    public static function get_totalPunia_inRange($awal,$akhir,$status,$request){
        $data = Danapunia::select(DB::raw("SUM(jumlah_dana) as paidsum"))->join("tb_usaha" , "tb_usaha.id_usaha" , "tb_dana_punia.id_usaha")->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_dana_punia.aktif","1")->where("tb_dana_punia.tanggal_pembayaran_alt",">=",$awal)->where("tb_dana_punia.tanggal_pembayaran_alt","<=",$akhir)->where("tb_dana_punia.on_progress","$status");

        if($request->banjar != ""){
            $data = $data->where("tb_detail_usaha.id_banjar" , $request->banjar);
        }

        $data = $data->orderBy("tb_dana_punia.id_usaha" , "desc")->get();

        return $data[0]->paidsum;
    }

    public static function get_totalPuniaOne_inRange($awal,$akhir,$status,$index){
        $data = Danapunia::select(DB::raw("SUM(jumlah_dana) as paidsum"))->join("tb_usaha" , "tb_usaha.id_usaha" , "tb_dana_punia.id_usaha")->join("tb_detail_usaha" , "tb_detail_usaha.id_detail_usaha" , "tb_usaha.id_detail_usaha")->where("tb_dana_punia.aktif","1")->where("tb_dana_punia.tanggal_pembayaran_alt",">=",$awal)->where("tb_dana_punia.tanggal_pembayaran_alt","<=",$akhir)->where("tb_dana_punia.on_progress","$status");

        //if($request->banjar != ""){
            $data = $data->where("tb_usaha.id_usaha" , $index);
        //}

        $data = $data->orderBy("tb_dana_punia.id_usaha" , "desc")->get();

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

    public static function post_pembayaran_baru($request,$url){

        $sumb = rand(0000,9999). " ".rand(0000,9999). " ".rand(0000,9999). " ".rand(0000,9999);
        $no_reks = "";
        $an_reks = "";

        if($request->bank != "0"){
            $bank    = Bank::get_dataBank_detail($request,$request->bank);
            $no_reks = $bank->no_rek;
            $an_reks = $bank->atas_nama;
        }   

        $tgl = explode(" ",$request->date_now);

        // echo $request->date_now;
        // die();

        //$exp_tanggal = manipulasiTanggal($tgl[0],'1','days');
        //$exp_tanggal = manipulasiWaktu($request->date_now,'+10','minutes');
        $exp_tanggal = manipulasiWaktu(tanggal_timezone_new() ,'+10','minutes');
        //$exp_tanggal = manipulasiTanggal($tgl[0],'1','days');

        //$slide = "0";
        $data                            = new Danapunia;
        $data->id_usaha                  = $request->index_usaha;
        $data->kode_invoice              = $sumb;
        $data->jumlah_dana               = $request->nominal_usaha;
        $data->charge                    = 0;
        $data->tanggal_pembayaran        = date("Y-m-d");
        $data->tanggal_pembayaran_alt    = date("Y")."-".$request->index_bulan."-".date('d');
        //$data->tanggal_jatuh_tempo       = $exp_tanggal." ".$tgl[1];
        $data->tanggal_jatuh_tempo       = $exp_tanggal;
        $data->tanggal_riil_jatuh_tempo  = $request->rightNow;
        $data->bulan                     = $request->index_bulan;
        $data->tahun                     = date("Y");
        $data->bukti_pembayaran          = "";
        $data->metode                    = $request->metode;
        $data->providers                 = $request->providers;
        $data->logo_providers            = $request->logo;
        $data->id_bank                   = $request->bank;
        $data->bank_rek                  = $no_reks;
        $data->an_rek                    = $an_reks;
        $data->payment_url               = $url;
        
        $data->aktif                     = "1";

        $data->save();
       
        return DB::getPdo()->lastInsertId();

    }

    
}
