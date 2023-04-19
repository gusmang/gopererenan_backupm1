@extends('front.newhome')

@section('isi_content')
   
<div id="header">
      <div class="container">
             <div class="header-custom"> <h5> <i class="bi bi-arrow-left" href="javascript:void(0);"></i> &nbsp; Donasi Sumbangan Bagi Pererenan</h5> </div>
          </div>
      </div>        

      <div class="headers-2" style="display:none;">
          <div class="container">
             <div class="header-custom"> <h5> <i class="bi bi-arrow-left" onclick="pick_metode_2(2,0,0)" href="javascript:void(0);"></i> &nbsp; Masukkan Nominal Donasi Anda</h5> </div>
          </div>
      </div>    

      <div class="headers-3" style="display:none;">
          <div class="container">
             <div class="header-custom"> <h5> <i class="bi bi-arrow-left" onclick="pick_metode_2(3,0,0)" href="javascript:void(0);"></i> &nbsp; Pilih Metode Pembayaran</h5> </div>
          </div>
      </div>   

      

      <div id="container-body">

      <div id="div-nominal-new">

        <div class="donasi-header">
            <h5> Masukkan Nominal Donasi </h5>

            <!-- <div class="donasi-container">

            </div> -->

                <div class="donasi-container-list">

                        <div class="item" id="div-rp-1">
                            <div class="float-left"> <h3> Rp. <span id="div-nominal-1">25.000</span> </h3> </div>
                            <div class="float-right"> <h4> <i class="bi bi-chevron-right"></i> </h4> </div>
                        </div>

                        <div class="item" id="div-rp-2">
                            <div class="float-left"> <h3> Rp. <span id="div-nominal-2">50.000</span> </h3> </div>
                            <div class="float-right"> <h4> <i class="bi bi-chevron-right"></i> </h4> </div>
                        </div>

                        <div class="item" id="div-rp-3">
                            <div class="float-left"> <h3> Rp. <span id="div-nominal-3">75.000</span> </h3> </div>
                            <div class="float-right"> <h4> <i class="bi bi-chevron-right"></i> </h4> </div>
                        </div>

                        <div class="item" id="div-rp-4">
                            <div class="float-left"> <h3> Rp. <span id="div-nominal-4">100.000</span> </h3> </div>
                            <div class="float-right"> <h4> <i class="bi bi-chevron-right"></i> </h4> </div>
                        </div>

                        <div class="item" id="div-rp-5">
                            <div class="float-left"> <h3> Rp. <span id="div-nominal-5">200.000</span> </h3> </div>
                            <div class="float-right"> <h4> <i class="bi bi-chevron-right"></i> </h4> </div>
                        </div>

                        <div class="item" id="div-rp-6">
                            <div class="float-left"> <h3> Rp. <span id="div-nominal-6">500.000</span> </h3> </div>
                            <div class="float-right"> <h4> <i class="bi bi-chevron-right"></i> </h4> </div>
                        </div>

                </div>

                <br clear="all" />

                <div class="donasi-container-foot">
                    <h3> Nominal Donasi Lainnya </h3>

                    <div class="donasi-container-bayar">
                        <div class="donasi-left">Rp.</div>
                        <div class="donasi-right"  id="input-rupiah" aria-autocomplete="list" contenteditable="true" role="textbox" spellcheck="true">0</div>
                    </div>
                </div>
                
                <div class="donasi-container-buttons">
                    <a onclick="pick_metode_2(1,0,0);" href="javascript:void(0);"> <b> Donasi Sekarang <i class="bi bi-chevron-right"></i> </b> </a>
                </div>

                <p>&nbsp;</p>
                

            </div>
            

        <br clear="all" />

        <input type="text" id="rupiah" style="display:none;"/>

     </div>

            <!-- <div id="nav_bottom">
                <ul>
                    <li class="nav-items active"><i class="bi bi-house"></i> <br /> Home </li>
                    <li class="nav-items"><i class="bi bi-envelope-heart"></i> <br /> Punia </li>
                    <li class="nav-items"><i class="bi bi-book"></i> </br /> Blog </li>
                    <li class="nav-items"><i class="bi bi-heart"></i> <br /> Sumbangan </li>
                    <li class="nav-items"><i class="bi bi-calendar3"></i> <br /> Jadwal </li>
                </ul>
            </div> -->

    <div id="div-header-new" style="display:none;">

         <div class="donasi-header">
           
            <div class="donasi-container-header">
                <h3> Isi Nominal Donasi : </h3>

                <div class="donasi-container-bayar">
                    <div class="donasi-left">Rp.</div>
                    <div class="donasi-right" id="input-rupiah-new" name="input-rupiah-new" aria-autocomplete="list" contenteditable="true" role="textbox" spellcheck="true">0</div>
                </div>

                <hr />
            </div>

            <div class="listview"> 

            <div class="view-pick">
                <div class="itemview"> <img src="<?php echo url('assets/pererenan'); ?>/icon/visa-mastercard.png" id="pilihan-img-1" style="width:100%;" /> </div> 
                <div class="itemviewtext"> <h5 id="pilihan-dompet-1"> Credit Card </h5> </div>
                <div class="float-right"> <div class="pick-list" onclick="pick_metode(1,0)"> Ganti <i class="bi bi-chevron-down"></i> </div> </div> 
                <br clear="all" />
            </div>
            
            <div class="signIn-container"> <span class="masuk"> <a href="#"> Masuk </a> </span> Atau Lengkapi data di bawah ini </div>

            <div class="signIn-container">

                <div class="col-md-12">
                    <input type="text" class="form-style" id="form-nama-lengkap" name="form-nama-lengkap" placeholder="Nama Lengkap" />
                </div>

            </div>

            <div class="signIn-container">

                <div class="col-md-12">
                    <input type="email" class="form-style" id="form-email-lengkap" name="form-email-lengkap" placeholder="Email Anda" />
                </div>

            </div>

            <div class="signIn-container">

                <div class="float-left nama-donasi">
                    Sembunyikan nama saya (donasi anonim)
                </div>

                <div class="float-right">
                    <input type="checkbox" id="form-status-lengkap" name="form-status-lengkap" />
                </div>

            </div>

            <br clear="all" />

            <div class="signIn-container">

                <div class="float-left normal-donasi">
                    Alasan Melakukan Donasi ( opsional ) <p></p>
                </div>

                <br clear="all" />

                <div name="teks_donasi" id="teks_donasi" class="form-style-area" contenteditable="true" id="form-deskripsi-lengkap"></div>
                    
            </div>


            <div class="donasi-container-buttons">
                <a onclick="paid_action()" href="javascript:void(0);"> <b> Donasi <i class="bi bi-chevron-right"></i> </b> </a>
            </div>

            <p>&nbsp;</p>

            </div>

         </div>

        </div>

        <div id="div-picklist-new" style="display:none;">

        <div class="listview"> 

                <div class="header"> <h5> Kartu kredit (verifikasi otomatis, minimal nominal Rp. 10,000) </h5> </div>

                <div class="view" style="border:none!important;" id="div_view_1">
                    <div class="itemview"> <img src="<?php echo url('assets/pererenan'); ?>/icon/visa-mastercard.png" id="div_view_img_1" style="width:100%;" /> </div> 
                    <div class="itemviewtextsingle"> <h5 id="div_view_title_1">Credit Card</h5>   </div>
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

                <div class="view" id="div_view_2">
                    <div class="itemview"> <img src="<?php echo url('assets/pererenan'); ?>/icon/dana.png" id="div_view_img_2" style="width:100%;" /> </div> 
                    <div class="itemviewtextsingle"> <h5 id="div_view_title_2"> Dana </h5> </div>
                    <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                    <br clear="all" />
                </div>

                <div class="view" id="div_view_3">
                    <div class="itemview"> <img src="<?php echo url('assets/pererenan'); ?>/icon/shopeepayqris.png" id="div_view_img_3" style="width:100%;" /> </div> 
                    <div class="itemviewtextsingle"> <h5 id="div_view_title_3"> Shopee Pay </h5> </div>
                    <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                    <br clear="all" />
                </div>

                <div class="view" id="div_view_4">
                    <div class="itemview"> <img src="<?php echo url('assets/pererenan'); ?>/icon/linkaja.png" id="div_view_img_4" style="width:100%;" /> </div> 
                    <div class="itemviewtextsingle"> <h5 id="div_view_title_4"> Link Aja </h5> </div>
                    <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                    <br clear="all" />
                </div>

                <div class="view" id="div_view_5" style="border:none!important;" >
                    <div class="itemview"> <img src="<?php echo url('assets/pererenan'); ?>/icon/ovo.png" id="div_view_img_5" style="width:100%;" /> </div> 
                    <div class="itemviewtextsingle"> <h5 id="div_view_title_5"> OVO </h5> </div>
                    <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                    <br clear="all" />
                </div>

                <!-- <div class="header"> <h5> Virtual account (verifikasi otomatis, minimal nominal Rp. 10,000) </h5> </div>


                <div class="view" id="div_view_6">
                    <div class="itemview"> <img src="<?php //echo url('assets/pererenan'); ?>/icon/bca.png" id="div_view_img_6" style="width:100%;" /> </div> 
                    <div class="itemviewtextsingle"> <h5 id="div_view_title_6"> BCA Virtual  Account </h5>   </div>
                    <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                    <br clear="all" />
                </div>

                <div class="view" id="div_view_7">
                    <div class="itemview"> <img src="<?php //echo url('assets/pererenan'); ?>/icon/mandiri.png" id="div_view_img_7" style="width:100%;" /> </div> 
                    <div class="itemviewtextsingle"> <h5 id="div_view_title_7"> Mandiri Virtual  Account </h5> </div>
                    <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                    <br clear="all" />
                </div>

                <div class="view" id="div_view_8">
                    <div class="itemview"> <img src="<?php //echo url('assets/pererenan'); ?>/icon/bni.png" id="div_view_img_8" style="width:100%;" /> </div> 
                    <div class="itemviewtextsingle"> <h5 id="div_view_title_8"> BNI Virtual  Account</h5> </div>
                    <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                    <br clear="all" />
                </div>


                <div class="view" id="div_view_9" style="border:none!important;" >
                    <div class="itemview"> <img src="<?php //echo url('assets/pererenan'); ?>/icon/permata.png" id="div_view_img_9" style="width:100%;" /> </div> 
                    <div class="itemviewtextsingle"> <h5 id="div_view_title_9"> Permata Bank Virtual  Account</h5>   </div>
                    <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                    <br clear="all" />
                </div> -->


                <div class="header"> <h5> Retail (verifikasi manual 1x24 jam, minimal nominal Rp. 10,000) </h5> </div>

                    <div class="view" id="div_view_12">
                        <div class="itemview"> <img src="<?php echo url('assets/pererenan'); ?>/icon/indomaret.png" style="width:100%;" id="div_view_img_12" /> </div> 
                        <div class="itemviewtextsingle"> <h5 id="div_view_title_12">IndoMaret </h5>   </div>
                        <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                        <br clear="all" />
                    </div>


                <div class="header"> <h5> Transfer bank (verifikasi manual 1x24 jam, minimal nominal Rp. 10,000) </h5> </div>

                    <div class="view" id="div_view_10">
                        <div class="itemview"> <img src="<?php echo url('assets/pererenan'); ?>/icon/bri.png" style="width:100%;" id="div_view_img_10" /> </div> 
                        <div class="itemviewtextsingle"> <h5 id="div_view_title_10">Transfer BRI </h5>   </div>
                        <div class="float-right"> <i class="bi bi-chevron-right"></i> </div> 
                        <br clear="all" />
                    </div>

                    <div class="view" id="div_view_11" style="border:none!important;" >
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

                <input type="text" id="rupiah" style="display:none;" />


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
      var teks_payments = ["Credit Card","Dana" , "Shopee Pay","Link Aja" ,"Ovo","Indomaret"];
      var pilihan_bank = "VC";

      var pil_payment = teks_payments[0];
      
      function toRupiah(value){
            const bilangan = value;
                
            const reverse = bilangan.toString().split('').reverse().join('');
            const ribuan  = reverse.match(/\d{1,3}/g);
            const result  = ribuan.join('.').split('').reverse().join('');

            return result;
    }

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



    function placeCaretAtEnd(el) {
        el.focus();
        if (typeof window.getSelection != "undefined"
                && typeof document.createRange != "undefined") {
            var range = document.createRange();
            range.selectNodeContents(el);
            range.collapse(false);
            var sel = window.getSelection();
            sel.removeAllRanges();
            sel.addRange(range);
        } else if (typeof document.body.createTextRange != "undefined") {
            var textRange = document.body.createTextRange();
            textRange.moveToElementText(el);
            textRange.collapse(false);
            textRange.select();
        }
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
        pil_payment = teks_payments[(parseInt(index[2])-1)];
    }

    function pay_invoice(index){
        localStorage.setItem("nominal_sumbangan",$("#input-rupiah-new").html());
        //localStorage.setItem("nominal_sumbangan",$("#input-rupiah-new").html());
        //alert($("#input-rupiah-new").html());
        window.location="<?php echo url('invoice-transfer'); ?>?inv="+index;
    }

    function paid_action(){
        payment();
        return false;
        //alert(pilihan_bank);
        if(pilihan_bank == "Manual-1" || pilihan_bank == "Manual-2"){

            var bank_trf = "";
            var metode = 1;

            if(pilihan_bank == "Manual-1"){
                bank_trf = "BRI";
            }
            else{
                bank_trf = "BNI";
            }

            var status_orang = "2";

            if($("#form-status-lengkap").val() == "1"){
                status_orang = "1";
            }
            

            const nominal_trf = $("#input-rupiah-new").html().replaceAll(".","");

            $.ajax({
                type:"post",
                data:{
                    nama:$("#form-nama-lengkap").val(),
                    email:$("#form-email-lengkap").val(),
                    note:$("#teks_donasi").html(),
                    status_orang:status_orang,
                    bank:bank_trf,
                    _token:"<?php echo csrf_token(); ?>",
                    metode:"Manual Transfer",
                    id_metode:metode,
                    nominal:nominal_trf
                },
                url:"<?php echo url('post-sumbangan'); ?>",
                success:function(data){
                    pay_invoice(data);
                }
            });

            
        }
        else{
            payment();
        }
    }

    function payment() {
			var amount = document.getElementById("input-rupiah-new").innerHTML;
			var productDetail = "Sumbangan "+document.getElementById("teks_donasi").innerHTML;
			var email = document.getElementById("form-email-lengkap").value;
			var phoneNumber = "+6281936384166";
			//var paymentUi = document.getElementById("teks_donasi").innerHTML;
            var paymentUi = "1"

            var status_orang = "2";

            if($("#form-status-lengkap").val() == "1"){
                status_orang = "1";
            }
            
            amount = amount.replaceAll(".","");

			$.ajax({
				type: "POST",
				data: {
					// Parameter PaymentMethod is optional
					paymentMethod: pilihan_bank, // PaymentMethod list => https://docs.duitku.com/pop/id/#payment-method
					paymentAmount: amount,
					productDetail: productDetail,
					email: email,
                    status_orang:status_orang,
                    note:$("#teks_donasi").html(),
                    nama:$("#form-nama-lengkap").val(),
                    pilihanPayment:pil_payment,
					phoneNumber: phoneNumber,
                    metode:"Payment Gateway",
                    bank:pil_payment,
                    id_metode:"2",
                    _token: "<?php echo csrf_token(); ?>"
				},
				url: '<?php echo url('payment_ipaymu'); ?>',
				dataType: "json",
				cache: false,
				success: function (result) {

                    //alert("here");

					// console.log(result.reference);
					// console.log(result);

                    //window.location = result.payment_url;
                    window.open(result.payment_url);
                    return;

                    var content_baru = document.getElementById('input-rupiah-new').textContent;


					if (paymentUi === "1") { // user redirect payment interface
						window.location = result.paymentUrl;
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