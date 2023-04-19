@extends('front.newhome')

@section('isi_content')
   
<div id="header" style="background:#FFFFFF; color:#000000; box-shadow:0 0 2px 2px #CCC; z-index:999;">
    <div class="container">
        <div class="header-custom" style="color:#000000;"> <h5> <a href="<?php echo url('account/punia-tamiu'); ?>" style="color:#000;"> <i class="bi bi-arrow-left" style="color:#000;"></i>  </a> &nbsp; Kembali</h5> </div>
    </div>
</div>        



<div id="container-body">

    <!-- <div class="headers-3" style="display:none;">
        <div class="container">
            <div class="header-custom"> <h5> <i class="bi bi-arrow-left" href="javascript:void(0);"></i> &nbsp; Pilih Metode Pembayaran</h5> </div>
        </div>
    </div>    -->

    <?php
        $sp_tanggal = explode(" ",$datas_punia->tanggal_jatuh_tempo);
        //echo "Expired On &raquo; ".tgl_indo($sp_tanggal[0])." ".$sp_tanggal[1];
    ?>
    <div id="container-body" style="background:rgb(0, 174, 239); margin-top:-10px;">

            <div class="full-width padding" style="padding-top:30px;" >
                <h1 style="color:#ffffff; font-size:13px; font-weight:normal"> Pembayaran Punia Bulan</h1>
                <?php
                    $bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                ?>
                <div style="float:left;"> <h5 style="color:#ffffff; margin-top:5px; font-size:14px; font-weight:bold" id="div-hari-pembayarans">  <?php echo $bulan[($datas_punia->bulan)-1]." ".$datas_punia->tahun; ?></h5> </div>
                <div style="float:right;"> <h5 style="color:#ffffff; margin-top:5px; font-size:14px; font-weight:bold"> <i class="bi bi-clock"></i> &nbsp; <span id="demo"> <?php echo $sp_tanggal[1]; ?> </span> </h5> </div><br clear="all" />
            </div>

            <div style="background:#FFFFFF;  margin-top:20px; min-height:90vh; border-radius:20px 20px 0 0; width:100%;">

    
            
            <div class="full-width padding" style="padding-top:30px;" >
                <div style="width:100%; font-size:12px;">
                <?php
                    //$sp_tanggal = explode(" ",$datas_punia->tanggal_jatuh_tempo);
                    $exp_tanggal = manipulasiWaktu($datas_punia->tanggal_riil_jatuh_tempo,'+10','minutes');
                    $sp_tanggalx = explode(" ",$exp_tanggal);
                    echo "Expired On &raquo; ".tgl_indo($sp_tanggalx[0])." ".$sp_tanggalx[1];
                ?>
                </div>
                <div style="float:left;"> <h5 style="color:#000000; margin-top:5px; font-size:16px; font-weight:normal"> {{ $datas_punia->metode }} </h5> </div>
                <div style="float:right;"> <h5 style="color:#000; margin-top:5px; font-size:14px; font-weight:bold"> <img src="<?php echo url('assets/pererenan'); ?>/icon/<?php echo $datas_punia->logo_providers; ?>" id="div_view_img_8" style="width:70px; height:38px; margin:-8px 10px 0 0;" /> </div><br clear="all" />
            </div>

            <div class="full-width padding">

                <div style="background:#F5F5F5; padding:15px; width:100%;">

                    <div style="float:left;">
                        <h5 style="color:#666666; margin-top:5px; font-size:13px; font-weight:normal"> Kode Invoice : </h5>
                        <!-- <h2 style="color:#000000; font-size:21px; font-weight:normal">  <?php //echo $datas_punia->kode_invoice; ?> </h2> -->
                        <input type="text" id="kode_invoice_div" id="kode_invoice_div" readonly value="<?php echo $datas_punia->kode_invoice; ?>" style="text-align:left; color:#333;  border:none; padding:0; margin:0; background:none; font-size:21px; font-weight:normal;" />
                    </div>

                    <div style="float:right;">
                        <div style="width:70px; padding:5px; text-align:center; color:rgb(0, 174, 239); font-size:13px; border-radius:10px; margin-top:15px; border:1px solid rgb(0, 174, 239); background:#FFFFFF; cursor:pointer;" onclick="myFunction('kode_invoice_div');">
                            Salin
                        </div>
                    </div>

                    <br clear="all" />

                </div>

            </div>

            <div class="full-width padding">

                <div style="padding:0 15px 15px 15px; width:100%;">

                    <div style="float:left;">
                        <h5 style="color:#666666; margin-top:5px; font-size:13px; font-weight:normal"> Jumlah punia : </h5>
                        <h2 style="color:#000000; font-size:21px; font-weight:normal"> Rp. <?php //echo format_rupiah($datas_punia->jumlah_dana); ?>  <input type="text" id="jumlah_punia_div" id="jumlah_punia_div" readonly value="<?php echo format_rupiah($datas_punia->jumlah_dana); ?>" style="text-align:left; color:#333;  border:none; padding:0; margin:0; background:none; font-size:21px; font-weight:normal;" /> </h2>
                    </div>

                    <div style="float:right;">
                        <div style="width:70px; padding:5px; text-align:center; color:rgb(0, 174, 239); font-size:13px; border-radius:10px; margin-top:10px; border:1px solid rgb(0, 174, 239); background:#FFFFFF;  cursor:pointer;"  onclick="myFunction('jumlah_punia_div');">
                            Salin
                        </div>
                    </div>

                    <br clear="all" />

                    <div style="width:100%;  position:relative; margin-top:10px; z-index:10;">
                        <div style="padding:0; width:20px; height:10px; z-index:1; transform:rotate(45deg); background:#FFEEDD; border:1px solid #FFCECD; position:absolute; top:-2px; left:40px;"></div>
                        <div style="padding:0; width:13px; height:10px;  background:#FFEEDD; position:absolute; top:0; left:40px; z-index:3;"></div>
                        <div style="padding:5px 15px 5px 15px; background:#FFEEDD; border:1px solid #FFCECD; width:100%; z-index:2; position:absolute;">
                            <h5 style="color:#666666; line-height:20px; margin-top:5px; font-size:13px; font-weight:normal"> <b style="color:#333333;"> Catatan ! </b> Silakan Konfirmasikan pembayaran anda dengan upload bukti pembayaran pada WhatsApp yang tersedia.</h5>
                        </div>
                    </div>

                </div>

            </div>

            <div class="full-width padding" style="margin-top:50px;">

                <div style="background:#F5F5F5; padding:15px; width:100%;">

                    <div style="float:left;">
                        <h5 style="color:#666666; margin-top:5px; font-size:13px; font-weight:normal"> No. Rekening A/N <?php echo $datas_punia->an_rek; ?> </h5>
                        <!-- <h2 style="color:#000000; font-size:21px; font-weight:normal" id="bank_punia_div">  <?php //echo $datas_punia->bank_rek; ?> </h2> -->
                        <input type="text" id="bank_punia_div" id="bank_punia_div" readonly value="<?php echo $datas_punia->bank_rek; ?>" style="text-align:left; color:#333;  border:none; padding:0; margin:0; background:none; font-size:21px; font-weight:normal;" />
                    </div>

                    <div style="float:right;">
                        <div style="width:70px; padding:5px; text-align:center; color:rgb(0, 174, 239); font-size:13px; border-radius:10px; margin-top:15px; border:1px solid rgb(0, 174, 239); background:#FFFFFF; cursor:pointer;"  onclick="myFunction('bank_punia_div');">
                            Salin
                        </div>
                    </div>

                    <br clear="all" />

                </div>

            </div>

            <div class="full-width padding">

            <?php
                $wa_bayar = "Halo Admin , Saya ingin konfirmasi untuk pembayaran punia pada bulan ".$bulan[($datas_punia->bulan)-1]." ".$datas_punia->tahun." ( Upload Bukti Pembayaran )";
            ?>
                    
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $general->no_wa; ?>&text=<?php echo rawurlencode($wa_bayar); ?>"> 
                        <button class="form-control btn-success"> <i class="fab fa-whatsapp"></i> &nbsp; KONFIRMASI PEMBAYARAN</button>
                    </a>
                <hr />
            </div>

            <div class="full-width padding" style="margin-top:-10px;">
                <b> Panduan Pembayaran </b> <p></p>

                <div style="color:#666666; font-size:13px;">

                    <table style="color:#666666; font-size:13px; line-height:20px; vertical-align: top;" valign="top">
                        <tr>
                            <th></th>
                        </tr>
                        <tr>
                            <td width="20">1.</td><td> Lakukan pembayaran melalui ATM / mobile banking / internet banking / SMS banking / kantor bank terdekat. </td>
                        </tr>
                        <tr>
                            <td width="20">2.</td><td> Isi nomor rekening tujuan sesuai yang ada di halaman pembayaran (a.n Yayasan Kita Bisa).  </td>
                        </tr>
                        <tr>
                            <td width="20">3.</td><td> Masukan nominal donasi sesuai jumlah donasimu, termasuk 3 digit terakhir  </td>
                        </tr>
                        <tr>
                            <td width="20">4.</td><td> Pembayaran akan diverifikasi oleh Kitabisa. Waktu verikasi paling lambat 1x24 jam untuk sesama bank, dan 2x24 jam dihari kerja jika antar bank yang berbeda.  </td>
                        </tr>

                </table>
                
                <div>
                
                <p>&nbsp;</p>
                <p>&nbsp;</p>

            </div>
            

            </div>

    </div>

<!-- <select name="DropDownChooseProduct" id="DropDownChooseProduct" style="line-height: 55px; color: #003366;">
<option value="VC">CREDIT CARD</option>
<option value="MG">CREDIT CARD MIGS</option>
<option value="BC">VA BCA</option>
<option value="A1">VA ATM Bersama</option>
<option value="NC">VA BNC</option>
<option value="I1">VA BNI</option>
<option value="BR">VA BRI</option>
<option value="B1">VA CIMB Niaga</option>
<option value="M2">VA Mandiri H2H</option>
<option value="VA">VA Maybank</option>
<option value="BT">VA Permata Bank</option>
<option value="S1">VA Sampoerna</option>
<option value="AG">VA Artha Graha</option>
<option value="OV">OVO</option>
<option value="DA">DANA</option>
<option value="SA">ShopeePay Apps</option>
<option value="SP">QRIS ShopeePay</option>
<option value="LQ">QRIS LinkAja</option>
<option value="NQ">QRIS Nobu</option>
<option value="LA">LinkAja</option>
<option value="LF">LinkAja Fixed</option>
<option value="A2">Pos Indonesia</option>
<option value="IR">Indomaret</option>
<option value="FT">Retail</option>
<option value="DN">Indodana Paylater</option>
</select> -->

@stop

@section('footer_scripts')

<?php

    $stop_date = date("Y-m-d");
    //echo 'date before day adding: ' . $stop_date; 
    $stop_date = date('Y-m-d', strtotime($stop_date . ' +1 day'));
    $stop_date = tgl_indo($stop_date);
    //echo 'date after adding 1 day: ' . $stop_date;
    $timestamp = strtotime($stop_date);

    $day = date('D', $timestamp);
?>

<script>
    // Set the date we're counting down to
    //var countDownDate = new Date("<?php //echo $sp_tanggal[1]; ?>").getTime();
    function myFunction(inputid) {
          /* Get the text field */
        //   var copyText = document.getElementById(inputid);
        
        //   /* Select the text field */
        //   copyText.select();
        //   copyText.setSelectionRange(0, 99999); /* For mobile devices */
        
        //   /* Copy the text inside the text field */
        //   navigator.clipboard.writeText(copyText.value);
        
        
          var jsCopy = document.getElementById(inputid);
          
          jsCopy.select();
          jsCopy.setSelectionRange(0, 99999);
          
          document.execCommand("copy");
  
        
          /* Alert the copied text */
          //alert("Copied the text: " + jsCopy.value);
    }
    var prefix_seconds = "";
    var prefix_minutes = "";

    var countDowndate = "<?php echo $sp_tanggal[0]." ".$sp_tanggal[1]; ?>";
    var sp_time_new = countDowndate.split(":");

    var minutes_now = parseInt(sp_time_new[1]);
    var seconds_now = parseInt(sp_time_new[2]);

    //console.log(seconds_now);
    var cTime = moment().format();

    const format1 = "YYYY-MM-DD HH:mm:ss";
    const format2 = "YYYY-MM-DD HH:mm:ss";

    var habis_waktu = false;

    var date1 = new Date(countDowndate);
    var date2 = new Date();

    dateTime1 = moment(date1).format(format1);
    dateTime2 = moment(date2).format(format2);

    const dateFormat = "YYYY-MM-DD HH:mm:ss";
    // Get your start and end date/times
    //const rightNow = moment().format(dateFormat);
    const rightNow = "<?php echo tanggal_timezone_new(); ?>";       
   // alert("<?php //echo tanggal_timezone_new(); ?>");
    const thisTimeYesterday = moment().subtract(1, 'days').format(dateFormat);
    // pass in hours as the second parameter to the diff function
    const differenceInHours = moment(dateTime1).diff(rightNow, 'hours');
    const differenceInMinutes = moment(dateTime1).diff(rightNow, 'minutes');
    const differenceInSeconds = moment(dateTime1).diff(rightNow, 'seconds');

    var hoursNow = differenceInHours * 60;
    var hoursSec = differenceInMinutes * (60);
    var minutes = parseInt(differenceInMinutes) - parseInt(hoursNow);
    var seconds = parseInt(differenceInSeconds) - parseInt(hoursSec);

    console.log(`${hoursSec} minutes have passed since this time yesterday`);
    //console.log("diff hours",dateTime2);

    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();
    var alias_seconds = "";
    //console.log("tes ="+seconds_now);
    //if(seconds >= 10){
    seconds--;
    //}
    // else{
    //     //alias_seconds = seconds;
    //     seconds = "0".alias_seconds;
    //     alias_seconds = seconds.replaceAll("0","");
    //     alias_seconds = parseInt(alias_seconds);
    //     alias_seconds--;
    //     seconds--;
        
    //     console.log("sec" , seconds);
    // }

    if(seconds <= 9){
        prefix_seconds = "0";
    }
    else{
        prefix_seconds = "";
    }

    if(minutes <= 9){
        prefix_minutes = "0";
    }
    else{
        prefix_minutes = "";
    }

    if(seconds <= 0){
        minutes--;
        seconds = 59;
    }

    if(minutes <= 0){
        //differenceInHours--;
        habis_waktu = true;
        //minutes = 59;
    }

    //console.log("tes");
    // Find the distance between now and the count down date
    //var distance = countDowndate - now;
    //seconds--;
    //console.log(seconds);

    // Time calculations for days, hours, minutes and seconds
    //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //var hours = Math.floor((sp_time_new[0] % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //var minutes = Math.floor((sp_time_new[1] % (1000 * 60 * 60)) / (1000 * 60));
    //var seconds = Math.floor((sp_time_new[2] % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    // document.getElementById("demo").innerHTML = sp_time_new[0] + "h "
    // + minutes_now + "m " + seconds_now + "s ";

    if(differenceInHours > 0){
        document.getElementById("demo").innerHTML = differenceInHours + ":"
        + minutes + ":" + seconds + "";
    }
    else{
        document.getElementById("demo").innerHTML = prefix_minutes + minutes + ":" + prefix_seconds + seconds + "";
    }

    if(habis_waktu == true){
            alert("expired");
            window.location="<?php echo url('account/punia-tamiu'); ?>";
    }
    
    // If the count down is finished, write some text
    // if(differenceInHours > 0){
    //     if (differenceInHours <= 0) {
    //         alert("expired");
    //         window.location="<?php //echo url('account/punia-tamiu'); ?>";
    //     }
    // }
    // else{
    //     if (minutes <= 0 && seconds <= 0) {
    //         alert("expired");
    //         window.location="<?php //echo url('account/punia-tamiu'); ?>";
    //     }
    // }
    //     clearInterval(x);
    //     document.getElementById("demo").innerHTML = "EXPIRED";
    // }
    }, 1000);
</script>


  <script type="text/javascript">
      var payment_list = ["VC","DA","SP","LF","OV","BC","M2","I1","BT","Manual-1","Manual-2","IR"];
      var pilihan_bank = "VC";

      //alert("tes" + localStorage.getItem("nominal_sumbangan"));
      var hari_sumbangan = "";

      $("#span_rupiah_new").html(localStorage.getItem("nominal_sumbangan"));
      $("#div-hari-pembayaran").html("<?php echo $day." , ".$stop_date; ?>");
      
      function toRupiah(value){
            const bilangan = value;
                
            const reverse = bilangan.toString().split('').reverse().join('');
            const ribuan  = reverse.match(/\d{1,3}/g);
            const result  = ribuan.join('.').split('').reverse().join('');

            return result;
    }


    var input_rp = document.getElementById('input-rupiah');

    input_rp.addEventListener('keyup', function(e)
    {
            var angka = document.getElementById('input-rupiah').textContent;

            // let p = document.getElementById('input-rupiah')
            // let s = window.getSelection()
            // let r = document.createRange()
            // r.setStart(p, p.childElementCount)
            // r.setEnd(p, p.childElementCount)
            // s.removeAllRanges()
            // s.addRange(r)

            var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

            document.getElementById('input-rupiah').textContent = rupiah;
            placeCaretAtEnd($('#input-rupiah').get(0));
            //document.getElementById('rupiah').focus();
            //return false;
            //document.getElementById('rupiah').value = rupiah;
    });

    var input_rps = document.getElementById('input-rupiah-new');

    input_rps.addEventListener('keydown' , function(e){
        // if ((event.keyCode >== 48 && event.keyCode <== 57) || event.keyCode === 13) {
        //     // do something with this information
        // } else {
        //     return false;
        // }
        if(event.keyCode < 48 || event.keyCode > 57){return false;}
    });

    input_rps.addEventListener('keyup', function(e)
    {
            
        var angka = document.getElementById('input-rupiah-new').textContent;

        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

        document.getElementById('input-rupiah-new').textContent = rupiah;
        placeCaretAtEnd($('#input-rupiah-new').get(0));

    });

    $(".view").click(function(){
        pick_metode_change(this.id);
    });

    function pick_metode(aksi,index){
        if(aksi == 1){
            $("#div-header-new").slideUp();
            $("#div-picklist-new").slideDown();
            

            //alert("shows 2");

            $(".headers-3").show();
            $(".headers-2").hide();
        }
        else{
            $("#div-header-new").slideDown();
            $("#div-picklist-new").slideUp();

            //alert("shows 1");
            $(".headers-2").show();
            $(".headers-3").hide();
        }
    }

    function pick_metode_2(aksi,index,from){
        if(aksi == 1){
            $("#div-nominal-new").slideUp();
            $("#div-header-new").slideDown();
            if(from == 0){
                document.getElementById('input-rupiah-new').textContent = document.getElementById('input-rupiah').textContent;
            }

            $("#div-picklist-new").hide();

            $("#header").hide();
            $(".headers-2").show();
        }
        else if(aksi == 2){
            $("#div-header-new").slideUp();
            $("#div-nominal-new").slideDown();

            $("#div-picklist-new").hide();

            $("#header").show();
            $(".headers-2").hide();
        }

        else{
            $("#div-header-new").slideDown();
            $("#div-picklist-new").slideUp();

            $("#div-picklist-new").hide();

            $("#header").show();
            $(".headers-2").hide();
        }

    }

    function pick_metode_change(id){
        var index = id.split("_");
        const source = $("#div_view_img_"+index[2]).prop("src");
        const title = $("#div_view_title_"+index[2]).html();
        
        $("#div-header-new").slideDown();
        $("#div-picklist-new").slideUp();

        $("#div-picklist-new").hide();

        $("#pilihan-img-1").prop("src" , source);
        $("#pilihan-dompet-1").html(title);   

        pilihan_bank = payment_list[(parseInt(index[2])-1)];
    }

    function payment() {
			var amount = document.getElementById("input-rupiah-new").innerHTML;
			var productDetail = "Sumbangan "+document.getElementById("teks_donasi").innerHTML;
			var email = document.getElementById("form-email-lengkap").value;
			var phoneNumber = "+6281936384166";
			//var paymentUi = document.getElementById("teks_donasi").innerHTML;
            var paymentUi = "1"
            
            amount = amount.replaceAll(".","");

			$.ajax({
				type: "POST",
				data: {
					// Parameter PaymentMethod is optional
					paymentMethod: pilihan_bank, // PaymentMethod list => https://docs.duitku.com/pop/id/#payment-method
					paymentAmount: amount,
					productDetail: productDetail,
					email: email,
					phoneNumber: phoneNumber,
                    _token: "<?php echo csrf_token(); ?>"
				},
				url: '<?php echo url('invoice'); ?>',
				dataType: "json",
				cache: false,
				success: function (result) {

					console.log(result.reference);
					console.log(result);

                    var content_baru = document.getElementById('input-rupiah-new').textContent;


					if (paymentUi === "1") { // user redirect payment interface
						//window.location = result.paymentUrl;
                        console.log("result" , result);
					}

					checkout.process(result.reference, {
						successEvent: function (result) {
							// begin your code here
							console.log('success');
							console.log(result);
							alert('Payment Success');
						},
						pendingEvent: function (result) {
							// begin your code here
							console.log('pending');
							console.log(result);
							alert('Payment Pending');
						},
						errorEvent: function (result) {
							// begin your code here
							console.log('error');
							console.log(result);
							alert('Payment Error');
						},
						closeEvent: function (result) {
							// begin your code here
							console.log('customer closed the popup without finishing the payment');
							console.log(result);
							alert('customer closed the popup without finishing the payment');
						}
						
					});

				},
			});

		}

    
  </script>


@stop