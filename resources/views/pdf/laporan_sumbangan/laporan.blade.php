<html>

<head></head>

<body>

<center><h4 style="font-size:28px;"> Data Laporan Sumbangan </h4></center>

<p></p>

<table style="width:100%; border:1px solid #999999;" cellpadding="10" cellspacing="0">
    <thead>
        <tr style="border-bottom:1px solid #DDDDDD;">
            <th style="border-right:1px solid #DDDDDD;">No</th>
            <th style="border-right:1px solid #DDDDDD;">Nama</th>
            <th style="border-right:1px solid #DDDDDD;">Nominal</th>
            <th style="border-right:1px solid #DDDDDD;">Note</th>
            <th style="border-right:1px solid #DDDDDD;">Tanggal</th>
        </tr>
    </thead>

    <tbody style="border-bottom:1px solid #DDDDDD;">
            <?php
                $no = 1;
                foreach($sumbangan as $rows){
                    $tgl = explode(" ",$rows->tanggal);
                    $nama = $rows->nama;

                    if($rows->nama == ""){
                        $nama = "-";
                    }

                ?>
                
                <tr style="border-bottom:1px solid #DDDDDD;">
                    <td style="border-right:1px solid #DDDDDD;"><?php echo $no; ?></td>
                    <td style="border-right:1px solid #DDDDDD;"><b> <?php echo $nama; ?></b> <br /><small> <?php echo $rows->alamat; ?> </small> </b> </small></td>
                    <td style="border-right:1px solid #DDDDDD;">Rp. <?php echo format_rupiah($rows->nominal); ?> , - <br /><small>Manual Transfer</small><br /><small>Via &raquo; <b> <?php echo $rows->nama_bank; ?> </b> </small></td>
                    <td style="border-right:1px solid #DDDDDD;"><?php echo $rows->deskripsi; ?></td>
                    <td style="border-right:1px solid #DDDDDD;"><?php echo tgl_indo($tgl[0]); ?></td>
                </tr>
                
                <?php
                $no++;
                }
            ?>
    </tbody>
</table>

</body>

</html>