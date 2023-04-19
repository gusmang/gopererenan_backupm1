@extends('front.newhome')

@section('isi_content')
   


<div class="headers-3" style="display:none;">
    <div class="container">
        <div class="header-custom"> <h5> <i class="bi bi-arrow-left" onclick="pick_metode_2(3,0,0)" href="javascript:void(0);"></i> &nbsp; Pilih Metode Pembayaran</h5> </div>
    </div>
</div>   

    <!-- <div class="headers-3" style="display:none;">
        <div class="container">
            <div class="header-custom"> <h5> <i class="bi bi-arrow-left" href="javascript:void(0);"></i> &nbsp; Pilih Metode Pembayaran</h5> </div>
        </div>
    </div>    -->

    <div id="container-body-images">

    <div id="div-header-new">

        <div id="header-images" style="position:relative;">
            <img src="<?php echo url('public/punia-dana.jpeg'); ?>" />
                <div style="position:absolute; top:0; right:0; width:100%; height:100%; background:rgba(50,50,50,0.5);">
                    <div style="position:absolute; top:0; left:0; margin:auto; width:100%;">
                        <div style="position:absolute; top:80px; left:0; right:0; margin:auto; width:100%;">
                            <center>
                                <img src="<?php echo url('public/logotranspererenan.png'); ?>" style="width:100px; height:100px; margin:auto; opacity:0.6;" />
                                <p></p>
                                <h1 style="font-size:16px; color:#fff;"> Punia Tamiu ( <?php echo $rows->nama_usaha; ?> )</h1>
                            </center>
                        </div>
                    </div>
                </div>
        </div>

        <!-- <div class="full-width padding">
            <h1> Punia Tamiu ( Nama Usaha )</h1>
        </div> -->

        <p></p>

        <div class="full-width padding">
            <div style="margin-top:-15px;"> <small style="color:#000;"><i class="fa fa-money"> </i> Total Punia   &raquo;   Rp. <?php echo format_rupiah($totals); ?> , -</div>
            <div> <small style="color:#000;"><i class="fa fa-money"> </i> Punia Payment <small>  / month </small> &raquo; Rp. <?php echo format_rupiah($rows->minimal_bayar); ?> , -</div>
        <!-- <div class="float-left sub-header"> <h4> Rp. 50.000.000 </h4> </div> <div class="float-left capts" style="margin-left:10px;"> <small> terkumpul dari tahun 2023 </small> </div>  -->
        </div>

        <br clear="all" />
    
        <div class="full-width padding" style="margin-top:-20px;">
            <h5> History Punia <input type="number" name="tahun_bayar" id="tahun_bayar" style="width:100px; border-radius:10px; border:1px solid #CCC; padding:10px;" value="<?php echo date('Y'); ?>" /> </h5>
            <hr />
            <?php
                $bulan = array("Januari" , "Februari" , "Maret" , "April" , "Mei" , "Juni" , "Juli" , "Agustus" , "September" , "Oktober" , "November" , "Desember");
                $an = 0;
                $indexed = 0;
                foreach($bulan as $rows_bl){    
                    $datarow = 0;
                    $tgl_bayar = "";
                    $nominal = "";

                    $databg = $rows->tanggal_daftar;

                    $indexed++;

                    $bln = $indexed <= 9 ? "0".$indexed : $indexed;
                    $tanggals = date("Y")."-".$bln."-25";

                    $an++;

                    if($tanggals < $databg){
                        ?>
                            <div class="col-md-12" style="padding:20px; border-bottom:1px solid #ddd;">
                                <div class="row">
                                    <div class="col-md-4 col-4"  style="font-size:14px; font-weight:bold;"> <?php echo $rows_bl; ?> </div>
                                    <div class="col-md-4 col-4"  style="text-align:center;"> - </div>
                                    <div class="col-md-4 col-4"  style="text-align:right; font-size:11px;"> <small>- Not Registered -</small> </div>
                                </div>
                            </div>
                        <?php
                    }
                    else{
                    $methods = "";
                    $progress = "";

                    foreach($datap as $rowdata){
                        if($rowdata->bulan == $indexed){
                            $datarow = 1;
                            $methods = $rowdata->metode;
                            $progress = $rowdata->on_progress;
                            $tgl_bayar = tgl_indo($rowdata->tanggal_pembayaran);
                            $nominal = format_rupiah($rowdata->jumlah_dana);
                            break;
                        }
                        
                    };

                        
                        if($datarow == 1 && $rowdata->punia_aktif == "1"){
                            if($progress == "0"){
                            ?>
                                <div class="col-md-12" style="padding:20px; border-bottom:1px solid #ddd;">
                                    <div class="row">
                                        <div class="col-md-4 col-4"  style="font-size:14px; font-weight:bold;"> <?php echo $rows_bl; ?> </div>
                                        <div class="col-md-4 col-4"  style="text-align:center;"> IDR <?php echo $nominal; ?>  , - </div>
                                        <div class="col-md-4 col-4"  style="text-align:right;"> <b> <h5 style="font-size:14px; margin:0; padding:0;  font-size:11px;"> Complete </h5> </b> <div> <?php echo $tgl_bayar; ?> </div> <div> <small> {{ $methods }} </small> </div> </div>
                                    </div>
                                </div>
                            <?php
                            }
                            else{
                                $url_invoice = url('account/punia-tranfers?inv='.$rowdata->id_dana_punia);

                                if($rowdata->payment_url != ""){
                                    $url_invoice = $rowdata->payment_url;
                                }

                            ?>
                                <div class="col-md-12" style="padding:20px; border-bottom:1px solid #ddd;">
                                    <div class="row">
                                        <div class="col-md-4 col-4"  style="font-size:14px; font-weight:bold;"> <?php echo $rows_bl; ?> </div>
                                        <div class="col-md-4 col-4"  style="text-align:center;"> IDR <?php echo $nominal; ?>  , - </div>
                                        <div class="col-md-4 col-4"  style="text-align:right;"> <b> <h5 style="font-size:14px; margin:0; padding:0; color:#FF6600;  font-size:11px;"> On Progress <small> <a href="<?php echo $url_invoice; ?>"><i class="fa fa-eye"></i></a> </small> </h5> </b> <div> <?php echo $tgl_bayar; ?> </div> <div> <small> {{ $methods }} </small> </div> </div>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                        else{
                        $tanggal_jatuh_tempo = date("Y")."-".date("m")."-".date("d");
                        $blnlalu = date("Y")."-".$bln."-25";
                        $now = date("Y")."-".$bln."-".date("d");

                        $tanggal_jatuh_tempo_bulanan = date("Y")."-".$bln."-25";

                            if($blnlalu < $tanggal_jatuh_tempo){
                                ?>
                                    <div class="col-md-12" style="padding:20px; border-bottom:1px solid #ddd;">
                                            <div class="row">
                                                <div class="col-md-4 col-4"  style="font-size:14px; font-weight:bold;"> <?php echo $rows_bl; ?> </div>
                                                <div class="col-md-4 col-4"  style="text-align:center;"> IDR <?php echo format_rupiah($rows->minimal_bayar); ?> , - </div>
                                                <div class="col-md-4 col-4"  style="text-align:right;"> <button class="btn-danger" onclick="pick_metode(1,0,<?php echo $an; ?>);" style="border:1px solid #999; border-radius:10px; padding:5px 10px;"> Due Date </button> </div>
                                            </div>
                                    </div>
                                <?php
                            }
                            else{
                                ?>
                                    <div class="col-md-12" style="padding:20px; border-bottom:1px solid #ddd;">
                                            <div class="row">
                                                <div class="col-md-4 col-4"  style="font-size:14px; font-weight:bold;"> <?php echo $rows_bl; ?> </div>
                                                <div class="col-md-4 col-4"  style="text-align:center;"> IDR <?php echo format_rupiah($rows->minimal_bayar); ?> , - </div>
                                                <div class="col-md-4 col-4"  style="text-align:right;"> <button class="btn-primary" onclick="pick_metode(1,0,<?php echo $an; ?>);" style="border:1px solid #999; border-radius:10px; padding:5px 10px;"> Pay Now </button> </div>
                                            </div>
                                    </div>
                                <?php
                            }
                        }

                    }
                    ?>
                    <?php
                    }
                    ?>
            </div>

            <div class="blog-container">
            <div class="blog-container-sub-2"></div>
        </div>
    </div>

    <div id="div-picklist-new" style="display:none; margin-top:60px;">
        <div class="listview"> 
                <div class="header"> <h5> Kartu kredit (verifikasi otomatis, minimal nominal Rp. 10,000) </h5> </div>

                <!-- <div class="view" style="border:none!important;" id="div_view_1">

                    <div class="itemview"> 

                        <img src="<?php //echo url('assets/pererenan'); ?>/icon/visa-mastercard.png" id="div_view_img_1" style="width:100%;" /> 

                    </div> 
                    
                    <div class="itemviewtextsingle"> 
                        <h5 id="div_view_title_1">Credit Card</h5>  
                    </div>
                    
                    <div class="float-right"> 
                        <i class="bi bi-chevron-right"></i> 
                    </div> 

                    <br clear="all" />

                </div> -->

                <div class="clicks-payment view" id="div_view_1_credit-card_dana_dana.png_0_0_1">
                    <div class="itemview"> <img src="<?php echo url('assets/pererenan'); ?>/icon/visa-mastercard.png" id="div_view_img_1" style="width:100%;" /> </div> 
                    <div class="itemviewtextsingle"> <h5 id="div_view_title_2"> Credit Card </h5> </div>
                    <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                    <br clear="all" />
                </div>

                <div class="header"> <h5> Pembayaran instan (verifikasi otomatis, minimal nominal Rp.10,000) </h5> </div>

                <!-- <div class="view" id="div_view_2">
                    <div class="itemview"> <img src="<?php //echo url('assets/pererenan'); ?>/icon/gopay.png" id="div_view_img_2" style="width:100%;" /> </div> 
                    <div class="itemviewtextsingle"> <h5 id="div_view_title_2"> Go Pay </h5>   </div>
                    <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                    <br clear="all" />
                </div> -->

                <div class="clicks-payment view" id="div_view_2_e-wallet_dana_dana.png_0_1_2">
                    <div class="itemview"> <img src="<?php echo url('assets/pererenan'); ?>/icon/dana.png" id="div_view_img_2" style="width:100%;" /> </div> 
                    <div class="itemviewtextsingle"> <h5 id="div_view_title_2"> Dana </h5> </div>
                    <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                    <br clear="all" />
                </div>

                <div class="clicks-payment view" id="div_view_3_e-wallet_shopee-pay_shopeepayqris.png_0_2_2">
                    <div class="itemview"> <img src="<?php echo url('assets/pererenan'); ?>/icon/shopeepayqris.png" id="div_view_img_3" style="width:100%;" /> </div> 
                    <div class="itemviewtextsingle"> <h5 id="div_view_title_3"> Shopee Pay </h5> </div>
                    <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                    <br clear="all" />
                </div>

                <div class="clicks-payment view" id="div_view_4_e-wallet_link-aja_linkaja.png_0_3_2">
                    <div class="itemview"> <img src="<?php echo url('assets/pererenan'); ?>/icon/linkaja.png" id="div_view_img_4" style="width:100%;" /> </div> 
                    <div class="itemviewtextsingle"> <h5 id="div_view_title_4"> Link Aja </h5> </div>
                    <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                    <br clear="all" />
                </div>

                <div class="clicks-payment view" id="div_view_5_e-wallet_ovo_ovo.png_0_4_2" style="border:none!important;" >
                    <div class="itemview"> <img src="<?php echo url('assets/pererenan'); ?>/icon/ovo.png" id="div_view_img_5" style="width:100%;" /> </div> 
                    <div class="itemviewtextsingle"> <h5 id="div_view_title_5"> OVO </h5> </div>
                    <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                    <br clear="all" />
                </div>

                <div class="header"> <h5> Retail (verifikasi manual 1x24 jam, minimal nominal Rp. 10,000) </h5> </div>

                    <div class="clicks-payment view" id="div_view_12_Retail-indomaret_indomaret.png_0_5_3">
                        <div class="itemview"> <img src="<?php echo url('assets/pererenan'); ?>/icon/indomaret.png" style="width:100%;" id="div_view_img_12" /> </div> 
                        <div class="itemviewtextsingle"> <h5 id="div_view_title_12">IndoMaret </h5>   </div>
                        <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                        <br clear="all" />
                    </div>

                <div class="header"> <h5> Transfer bank (verifikasi manual 1x24 jam, minimal nominal Rp. 10,000) </h5> </div>

                    <div class="clicks-payment view" id="div_view_10_Bank-Transfer_bri_bri.png_2_6_4">
                        <div class="itemview"> <img src="<?php echo url('assets/pererenan'); ?>/icon/bri.png" style="width:100%;" id="div_view_img_10" /> </div> 
                        <div class="itemviewtextsingle"> <h5 id="div_view_title_10">Transfer BRI </h5>   </div>
                        <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                        <br clear="all" />
                    </div>

                    <div class="clicks-payment view" id="div_view_11_Bank-Transfer_bni_bni.png_3_7_4" style="border:none!important;" >
                        <div class="itemview"> <img src="<?php echo url('assets/pererenan'); ?>/icon/bni.png" style="width:100%;" id="div_view_img_11" /> </div> 
                        <div class="itemviewtextsingle"> <h5 id="div_view_title_11">Transfer BNI </h5>   </div>
                        <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                        <br clear="all" />
                    </div>

                </div>

                <div style="height:20px;"></div>

                <!-- </div> -->
                </div>

                <br clear="all" />

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


  <script type="text/javascript">
      var payment_list = ["VC","DA","SP","LF","OV","BC","M2","I1","BT","Manual-1","Manual-2","IR"];
      var pilihan_bank = "VC";
      
      function toRupiah(value){
            const bilangan = value;
                
            const reverse = bilangan.toString().split('').reverse().join('');
            const ribuan  = reverse.match(/\d{1,3}/g);
            const result  = ribuan.join('.').split('').reverse().join('');

            return result;
    }

    
    $(window).on("scroll", function() {
        var scrollHeight = $(document).height();
        var scrollPosition = $(window).height() + $(window).scrollTop();

        //alert(scrollPosition)
        if(scrollPosition - scrollHeight >= 160){
            // alert("scrolled");
            $("#header").fadeIn('slow');
            $("#header-nobg").fadeOut('slow');
        }
        else{
            $("#header-nobg").fadeIn('slow');
            $("#header").fadeOut('slow');
        }
        //console.log("position" , (scrollPosition - scrollHeight) )
        //if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
            // when scroll to bottom of the page
            
        //}
    });

    // var bilangan =  document.getElementById('input-rupiah').innerHTML;

    //     var 	number_string = bilangan.replace(/[^,\d]/g, '').toString(),
	// 	split	= number_string.split(','),
	// 	sisa 	= split[0].length % 3,
	// 	rupiah 	= split[0].substr(0, sisa),
	// 	ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);
		
    //     if (ribuan) {
    //         separator = sisa ? '.' : '';
    //         rupiah += separator + ribuan.join('.');

    //         rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;


    //         document.getElementById('input-rupiah').textContent = rupiah;
    //     }

    var input_rp = document.getElementById('input-rupiah');

    $(".donasi-container-list .item").click(function(){
        //alert("tes");
        //alert(this.id);
        var sp_arr = this.id.split("-");
        var nominal_new = $("#div-nominal-"+sp_arr[2]).html();
        //alert(nominal_new);
        //$("#input-rupiah").html(1000);
        document.getElementById('input-rupiah-new').textContent = nominal_new;

        pick_metode_2(1,0,sp_arr[2]);
    });


    $(".clicks-payment").click(function(){
        //pick_metode_change(this.id);
        var index_id = this.id.split("_");

        const format1 = "YYYY-MM-DD HH:mm:ss";
        //const format2 = "YYYY-MM-DD HH:mm:ss";

        //var date1 = new Date(format1);
        var date2 = new Date();
        //var date2 = new Date();

        const dateTime1 = moment(date2).format(format1);
        //dateTime2 = moment(date2).format(format2);

        // console.log("datenow" , dateTime1);
        // return;

        const metode  = index_id[3];
        const nominal_usaha = "<?php echo $rows->minimal_bayar; ?>";
        const index_bulan = inc_index_an;
        const index_usaha = "<?php echo $rows->id_usaha; ?>";
        const tahun = $("#tahun_bayar").val();

        var url_post = '<?php echo url('account/post-punia-tamiu'); ?>';

        if(index_id[6] == 0){
            url_post = '<?php echo url('account/invoice-punia'); ?>';
        }

        if(index_id[6] != 0){

            const dateFormat = "YYYY-MM-DD HH:mm:ss";
    // Get your start and end date/times
            var rightNow = moment().format(dateFormat);

            

            $.ajax({
                    type: "POST",
                    data: {
                        // Parameter PaymentMethod is optional
                        metode: metode, // PaymentMethod list => https://docs.duitku.com/pop/id/#payment-method
                        index_bulan: index_bulan,
                        index_usaha: index_usaha,
                        nominal_usaha: nominal_usaha,
                        rightNow:rightNow,
                        metode_bayar: index_id[8],
                        date_now: dateTime1,
                        nama:"<?php echo $rows->nama_usaha; ?>",
                        paymentMethod: payment_list[(parseInt(index_id[7])-1)], 
                        productDetail:"Pembayaran Punia "+tahun+" Bulan "+index_bulan,
                        tahun: tahun,
                        providers: index_id[4],
                        logo: index_id[5],
                        bank: index_id[6],
                        _token: "<?php echo csrf_token(); ?>"
                    },
                    url: url_post,
                    dataType: "json",
                    cache: false,
                    success: function (result) {
                        if(result.status == "success"){
                            window.location = "<?php echo url('account/punia-tranfers?inv='); ?>"+result.lastId;
                        }
                    }
            });

        }
        else{

            // alert(<?php //echo $rows->minimal_bayar; ?>);
            // return false;
            const dateFormat = "YYYY-MM-DD HH:mm:ss";
    // Get your start and end date/times
            var rightNow = moment().format(dateFormat);

            $.ajax({
                    type: "POST",
                    data: {
                        // Parameter PaymentMethod is optional
                        metode: metode, // PaymentMethod list => https://docs.duitku.com/pop/id/#payment-method
                        index_bulan: index_bulan,
                        index_usaha: index_usaha,
                        nominal_usaha: nominal_usaha,
                        rightNow:rightNow,
                        nama:"<?php echo $rows->nama_usaha; ?>",
                        metode_bayar: index_id[8],
                        paymentMethod: payment_list[index_id[7]], 
                        productDetail:"Pembayaran Punia "+tahun+" Bulan "+index_bulan,
                        tahun: tahun,
                        providers: index_id[4],
                        logo: index_id[5],
                        bank: index_id[6],
                        _token: "<?php echo csrf_token(); ?>"
                    },
                    dataType: "json",
                    cache: false,
                    url: url_post,
                    success: function (result) {
                        //if(result.status == "success"){
                            //if (paymentUi === "1") { // user redirect payment interface
                        window.location = result.paymentUrl;
                        //}

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

                        //}
                    }
            });

        }
        
    });

    var inc_index_an = 0;

    function pick_metode(aksi,index,incs){
        inc_index_an = incs;

        if(aksi == 1){
            $("#div-header-new").slideUp();
            $("#div-picklist-new").slideDown();
            $("#div-header-wrapper").hide();
            $("#headers-3").show();
            $("#footers-new").hide();

            //alert("shows 2");

            $(".headers-3").show();
            $(".headers-2").hide();
        }
        else{
            $("#div-header-wrapper").show();
            $("#div-header-new").slideDown();
            $("#div-picklist-new").slideUp();
            $("#headers-3").hide();
            $("#footers-new").show();

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

    function payment(index) {
			// var amount = document.getElementById("input-rupiah-new").innerHTML;
			// var productDetail = "Sumbangan "+document.getElementById("teks_donasi").innerHTML;
			// var email = document.getElementById("form-email-lengkap").value;
			// var phoneNumber = "+6281936384166";
			//var paymentUi = document.getElementById("teks_donasi").innerHTML;
            // var paymentUi = "1"
            
            // amount = amount.replaceAll(".","");

            

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