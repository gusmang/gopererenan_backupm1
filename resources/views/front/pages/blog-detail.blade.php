@extends('front.newhome')

@section('isi_content')
   
<div id="header" style="display:none;">
    <div class="container">
        <div class="header-custom"> <h5> <a  href="<?php echo url('blog/list'); ?>"> <i class="bi bi-arrow-left"></i> </a> &nbsp;  {{ $berita->judul_berita }}</h5> </div>
    </div>
</div>        

    <div id="header-nobg">
        <div class="container">
            <div class="header-custom"> <h5> <a  href="<?php echo url('blog/list'); ?>"> <i class="bi bi-arrow-left" style="color:#FFFFFF;"></i> </a> </h5> </div>
        </div>
    </div>    

    <!-- <div class="headers-3" style="display:none;">
        <div class="container">
            <div class="header-custom"> <h5> <i class="bi bi-arrow-left" href="javascript:void(0);"></i> &nbsp; Pilih Metode Pembayaran</h5> </div>
        </div>
    </div>    -->

    <div id="container-body-images">

            <div id="header-images">
                <img src="<?php echo url('public/berita/foto/'.$berita->foto); ?>" />
            </div>

            <div class="full-width padding">
                <h1> {{ $berita->judul_berita }}</h1>
            </div>

            <div class="full-width padding">
                <?php
                    $ex_tgl = explode(" " ,$berita->tanggal_berita);
                ?>
                <div style="margin-top:-15px;"> <small style="color:#000;"><i class="fa fa-calendar"> </i> &nbsp; Posted at &raquo; <?php echo tgl_indo($ex_tgl[0]); ?> </div>
                <div> <small style="color:#000;"><i class="fa fa-eye"> <?php echo $berita[0]; ?> </i> &nbsp; 0 views </small> </div>
               <!-- <div class="float-left sub-header"> <h4> Rp. 50.000.000 </h4> </div> <div class="float-left capts" style="margin-left:10px;"> <small> terkumpul dari tahun 2023 </small> </div>  -->
            </div>

            <br clear="all" />

            <div class="full-width padding" style="margin-top:-20px;">
                    <?php echo $berita->isi_berita; ?>
            </div>

            <div class="full-width padding">

            <h4 style="font-size:18px;">Leave Comment</h4>
            <hr style="border-bottom:1px solid #999;" />

            <form name="form_comments" id="form_comments" method="post" onsubmit="post_data_blog(); return false;">
            {{ csrf_field() }}

            <!-- <p class="comment-notes" style="font-size:12px;"><span id="email-notes">Alamat email Anda tidak akan dipublikasikan.</span> <br /><span class="required-field-message" aria-hidden="true">Ruas yang wajib ditandai <span class="required" aria-hidden="true">*</span></span></p> -->

                <div class="col-md-12" style="font-size:12px;">
                    <div class="col-md-12">
                        Name <span style="color:#FF6600; font-size:14px;"> * </span>  <br />
                        <div class="col-md-12">
                            <input type="text" required="required" class="form-control" id="t_komentar_name" name="t_komentar_name" style="font-size:12px;" />
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-top:20px;">
                        <div class="col-md-12">
                            Comment <span style="color:#FF6600; font-size:14px;"> * </span>  <br />
                            <div class="col-md-12">
                                <textarea class="form-control" required="required" rows="8" id="t_deskripsi_name" name="t_deskripsi_name" style="max-height:400px; font-size:12px;"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-top:20px;">
                        <button class="btn btn-primary form-control" type="submit" name="btn_primary" id="btn_primary"><i class="bi bi-plus"></i> Add Comment </button>
                    </div>

                </div>

            </form>

                <p>&nbsp;</p>

                <div style="float:left; margin-right:15px;"> <h4 style="font-size:18px;">Comments </h4> </div>
                <div style="float:left; width:auto; height:auto; color:#fff; border-radius:5px; margin-top:-15px; margin-right:-10px; padding:3px; font-size:10px; background:rgb(0, 174, 239);"> 
                    <span id="comments-blog-new"> 10 </span>
                </div>
                <br clear="all" />

               

                <hr style="border-bottom:1px solid #999;" />

                <div class="col-md-12"  id="div-new-design-blogs"></div>

            </div>

            <div class="blog-container-sub-title"> 
                <div class="sub float-left"> <h4> Kegiatan Kami </h4> </div>
                <div class="sub float-right"> <h5> Lihat Lainnya <i class="bi bi-chevron-right"></i> </h5> </div>
            </div>

            <div class="blog-container">

                <div class="blog-container-sub-2">

                <?php
                    //$ans = 0;
                        foreach($berita_list as $rows){
                        //$active = $ans == 0 ? "active" : "";
                        $tanggal = explode(" " , $rows->tanggal_berita);
                        ?>  
                        <div class="blog-items-container" style="background:url('<?php echo url('public/berita/foto/'.$rows->foto); ?>'); background-size:cover;">
                            <div class="blog-caption"> 
                                <h5> <a href="<?php echo url('blog/'.$rows->slug); ?>">  <?php echo $rows->judul_berita; ?> </a> </h5>
                                <div class="caption-sub"></small> Diposting pada : <?php echo tgl_indo($tanggal[0]); ?> </small></div>
                            </div>
                        </div>
                <?php
                }
                ?>

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


  <script type="text/javascript">
      var payment_list = ["VC","DA","SP","LF","OV","BC","M2","I1","BT","Manual-1","Manual-2","IR"];
      var pilihan_bank = "VC";
      var awal_index_blogs = 1;
      
      function toRupiah(value){
            const bilangan = value;
                
            const reverse = bilangan.toString().split('').reverse().join('');
            const ribuan  = reverse.match(/\d{1,3}/g);
            const result  = ribuan.join('.').split('').reverse().join('');

            return result;
    }

    function post_data_blog(){

        $.ajax({
            type:"post",
            data:$("#form_comments").serialize(),
            url:"<?php echo url('post_datakomentar_cat/'.$berita->id_berita); ?>",
            dataType:"json",
            success:function(data){
                if(data.status == "success"){
                    //awal_index_blogs = 1;
                    refresh_data_blog(1);
                }
            }
        })

    }

    function refresh_data_blog(index){

        $.ajax({
            type:"get",
            data:"page="+index,
            url:"<?php echo url('get_datakomentar_cat/'.$berita->id_berita); ?>",
            dataType:"json",
            success:function(data){
               // alert(data.length);
               $("#comments-blog-new").html(data.total);
               $("#div-new-design-blogs").html("");

                $.each(data.data, function(index, element) {
                    var url_img_blogs = '<?php echo url('public/icon_anonymous-user.png'); ?>';
                    var els_tanggal = element.created_at.split(" ");
                    var tgl_blogs = format_tanggal(els_tanggal[0]);

                    var el_refresh_blogs = "";
                    el_refresh_blogs += '<div class="col-md-12" style="margin-top:20px;"><div class="row">';

                    el_refresh_blogs += '<div class="col-md-2 col-2"><img src="'+url_img_blogs+'" width="50" style="border-radius:50%;" /></div>';
                    el_refresh_blogs += '<div class="col-md-10 col-10" style="padding:10px;"><span> <b> <h5 style="font-size:12px; color:#333;"> '+element.nama_komentar+'<span> &bull; <span style="font-size:12px; font-weight:normal; color:#666;"> &nbsp;'+tgl_blogs+' </span> </span></h5> </b> </span>'+
                        '<span> <b> <h5 style="font-size:10px; font-weight:normal;">'+element.deskripsi+'</div></div></div>';

                    $("#div-new-design-blogs").append(el_refresh_blogs);
                });
            }
        });

    }

    refresh_data_blog(1);

    
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