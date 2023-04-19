<html>

<head>
    <link rel="stylesheet" href="<?php echo url('public/laporancss/style.css'); ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link href="<?php echo url('assets/src/'); ?>/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

</head>

<body>

<div id="col-md-12">

    <table>
        <tr>
            <td>
                <img src="<?php echo public_path('logopererenan.jpeg'); ?>" width="150" />
            </td>
            <td style="padding-left:10px; text-align:center;">
                <h1> BAGA UTSAHA PADRUWEN DESA  ADAT (BUPDA) PERERENAN </h1>
                <h5 style="font-weight:normal;"> Office: Pantai pererenan lantai basement. Phone : +6282145721040. Post : 80351</h5>
            </td>
        </tr>
    </table>

</div>

<div class="barline-1"></div>
<div class="barline-2"></div>

<p></p>

<center>
    <h4 class="title-laporan-new"> Data Laporan Punia </h4>
</center>


<center>
    <h5 class="sub-title-laporan-new"> Periode <?php echo $bulan. " ".$tahun; ?> </h5>
</center>

<p></p>

<table style="width:100%; border:1px solid #999;" cellpadding="10" cellspacing="0">
        <tr>
            <td align="center" style="border-right:1px solid #DDD; width:40%;">
                Total Usaha : <b><?php echo count($punia); ?></b> 
                <!-- <hr style="border-bottom:1px solid #ddd;" />
                Terdaftar &raquo; <b> 3 </b> &nbsp; | &nbsp; Belum &raquo; <b> 2 </b> -->
            </td>
            <td align="center" style="border-right:1px solid #DDD;  width:20%;">
                Complete : 
                <div style="margin-top:10px;"> <b><?php echo format_rupiah($totals); ?></b> </div>
            </td>
            <td align="center" style="border-right:1px solid #DDD;  width:20%;">
                On Progress : 
                <div style="margin-top:10px;"> <b><?php echo format_rupiah($progress); ?></b> </div>
            </td>
            <td align="center" style="width:20%;">
                Due Date : 
                <div style="margin-top:10px;"> <b id="due_date_span"><?php echo format_rupiah($total_due); ?></b> </div>
            </td>
        </tr>
</table>

<p></p>

<table style="width:100%; border:1px solid #999999;" cellpadding="10" cellspacing="0">
    <thead>
        <tr style="border-bottom:1px solid #DDDDDD;">
            <th style="border-right:1px solid #DDDDDD;">No</th>
            <th style="border-right:1px solid #DDDDDD;">Nama Usaha</th>
            <th style="border-right:1px solid #DDDDDD;">Status & Tgl <br />Pembayaran</th>
            <th style="border-right:1px solid #DDDDDD;">Metode <br /> Pembayaran</th>
            <th>Jumlah <br /> Pembayaran</th>
        </tr>
    </thead>

    <tbody style="border-bottom:1px solid #DDDDDD;">
            <?php
                $no = 1;
                foreach($punia as $rows){
                    $bg = "#fff";

                    if($no % 2 == 0){
                        $bg = "#f5f5f5";
                    }

                    $tgl_bayar = "-";
                    if($rows->tanggal_pembayaran != "-"){
                        $tgl_bayar = tgl_indo($rows->tanggal_pembayaran);
                    }

                    $dates_df = "";

                    if(Request::segment(3) == ""){
                        $dates_df = date("Y")."-".date("m")."-01";
                    }
                    else{
                        $months = Request::segment(3) < 9 ? "0".Request::segment(3) : Request::segment(3);

                        $dates_df = Request::segment(4)."-".$months."-25";
                    }
                    // $nama = $rows->nama;

                    // if($rows->nama == ""){
                    //     $nama = "-";
                    // }

                ?>
                
                <tr style="border-bottom:1px solid #DDDDDD; background:<?php echo $bg; ?>">

                        <td style="border-right:1px solid #DDD;"> <?php echo $no; ?> </td>
                        <td  style="border-right:1px solid #DDD;"> <b style="font-weight:bold;"> <?php echo $rows->nama_usaha; ?> </b> <br /> <small><?php echo $rows->alamat; ?></small> <br /> <small><?php echo $rows->banjar_addr; ?></small> </td>

                        <td  style="border-right:1px solid #DDD;"> 
                            <?php
                            $lastDay = date("Y")."-".date("m")."-01";
                            
                            if($rows->id_dana_punia == "" && $dates_df < $rows->tanggal_daftar){
                                ?>
                                    <small> belum terdaftar </small>
                                <?php
                            }
                            else{

                                if($rows->id_dana_punia != ""){
                                    if($rows->on_progress == "0"){
                                    ?>
                                        <?php echo $tgl_bayar; ?> <br />
                                    <?php
                                    }
                                    ?>
                                        <small> <?php echo $rows->status_bayar; ?> </small>
                                    <?php
                                }
                                else{
                                    if($dates_df >= $lastDay){
                                        ?>
                                            <small> Belum Jatuh Tempo </small>
                                        <?php
                                    }
                                    else{
                                    ?>
                                        <small> <?php echo $rows->status_bayar; ?> </small>
                                    <?php
                                    }
                                }
                            }
                            ?>

                        </td>
                        
                        <td  style="border-right:1px solid #DDD;"> 
                            Manual Transfer
                        </td>

                        <td> 
                            <?php
                            if(format_rupiah($rows->jumlah_dana) != "0" ){
                                echo "Rp. ".format_rupiah($rows->jumlah_dana); 
                            }
                            else{
                                echo "Rp. ".format_rupiah($rows->minimal_bayar); 
                            }
                            ?> 

                        </td>

                </tr>
                
                <?php
                $no++;
                }
            ?>
    </tbody>
</table>

<script type="text/javascript">
    document.getElementById("due_date_span").innerHTML = "10.000";
</script>

</body>

</html>