@extends('front.newhome')

@section('isi_content')
   
<div id="header">
    <div class="container">
        <div class="header-custom"> <h5> <i class="bi bi-arrow-left" href="javascript:void(0);"></i> &nbsp; Daftar Seluruh Donatur</h5> </div>
    </div>
</div>        

    <!-- <div class="headers-3" style="display:none;">
        <div class="container">
            <div class="header-custom"> <h5> <i class="bi bi-arrow-left" href="javascript:void(0);"></i> &nbsp; Pilih Metode Pembayaran</h5> </div>
        </div>
    </div>    -->

    <div id="container-body">

            <div class="full-width padding">
                <h style="font-size:18px;"> Daftar Keseluruhan </h1>

                <hr />
            </div>


            <div class="full-width padding" style="margin-top:-30px;">
                    
                    @foreach($sumb as $rows_sumb)
                            
                            <div class="komentar-container">
                                <div class="float-left div-1">
                                    <img src="<?php echo url('public/icon_anonymous-user.png'); ?>" /> 
                                </div>
                                <div class="float-left div-2"  style="margin-top:-5px;">
                                    <h3> {{ $rows_sumb->nama }} </h3>
                                    <h4> <small> Berdonasi Sebesar Rp. {{ format_rupiah($rows_sumb->nominal) }} </small> </h4>
                                    <h5> <small> <?php echo tgl_indo($rows_sumb->tanggal); ?> </small> </h5>
                                    
                                </div>
                                <!-- <div class="float-left div-3"></div> -->
                                <br clear="all" />
                                <p></p>
                                <h5> {{ $rows_sumb->deskripsi }} </h5>
                            </div>

                    @endforeach

                    <center>
                        <div style="width:90%; margin:10px; auto; color:rgb(100, 174, 239); font-size:12px; background:rgb(231, 245, 255);  border-radius:10px; padding:5px;"> Load More <i class="bi bi-chevron-down"></i> </div>
                    </center>

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