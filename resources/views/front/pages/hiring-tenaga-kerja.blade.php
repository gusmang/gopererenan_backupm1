@extends('front.newhome')

@section('isi_content')
   


<div class="headers-3" style="display:none;">
    <div class="container">
        <!-- <div class="header-custom"> <h5> <i class="bi bi-arrow-left" onclick="pick_metode_2(3,0,0)" href="javascript:void(0);"></i> &nbsp; Pilih Metode Pembayaran</h5> </div> -->
    </div>
</div>   

    <!-- <div class="headers-3" style="display:none;">
        <div class="container">
            <div class="header-custom"> <h5> <i class="bi bi-arrow-left" href="javascript:void(0);"></i> &nbsp; Pilih Metode Pembayaran</h5> </div>
        </div>
    </div>    -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Employee Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#exampleModalCenter').modal('hide');">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-6">
                        <img src="<?php echo url("public/icon_anonymous-user.png"); ?>" class="img-fluid" style="height:150px; width:100%; object-fit:cover; background-position:top;" id="div-image-profile-pop" />
                    </div>

                    <input type="hidden" value="" id="t_por_index" name="t_por_index" />
                    <input type="hidden" value="" id="t_jadwal_index" name="t_jadwal_index" />
                    <input type="hidden" value="" id="t_aksi_index" name="t_aksi_index" />

                    <div class="col-md-8 col-6">
                            <div class="col-md-12 col-12">
                                   <span> <h2 style="font-size:14px;" id="span_prof_param_1"> Ida Bagus Wiasmaragama </h2> <span>
                            </div>

                            <div class="col-md-12 col-12">
                                   <span> <h5 style="font-size:12px; font-weight:normal;"> <span id="span_prof_param_2">32</span> Years Old <span>
                            </div>

                            <div class="col-md-12 col-12">
                                   <span> <h5 style="font-size:12px; font-weight:normal;"> <span id="span_prof_param_3">IT Software</span> / 1 Years Exp </h5> <span>
                            </div>

                            <div class="col-md-12 col-12">
                                   <span> <h5 style="font-size:12px; font-weight:normal;"> <span id="span_prof_param_4"> Jl. Wijaya Kusuma Gg no.1 </span> <br /> <div style="font-size:11px; color:#666; margin-top:5px;" id="span_prof_param_5"> Banjar Pererenan </div> </h5> <span>
                            </div>

                            <div class="col-md-12 col-12">
                                   <span>  <h5 style="font-size:10px; font-weight:normal;"> <i class='bi bi-envelope-fill'></i> <span id="span_prof_param_6"> ibasmara@gmail.com </span> </h5> <span>
                            </div>

                            <div class="col-md-12 col-12">
                                   <span>  <h5 style="font-size:10px; font-weight:normal;"> <i class='bi bi-whatsapp'></i>  <span id="span_prof_param_7"> +6281936384166 </span> </h5> <span>
                            </div>

                    </div>

                    <div class="col-md-12 col-12" id="div-reasons-refusal">

                        <div class="col-md-12 col-12" style="margin-top:20px;">
                                <h4 style="font-size:13px;"> Refusal Reason : </h4>  <hr />
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <textarea name="teks_refusal_reason" id="teks_refusal_reason" class="form-control"></textarea>
                                </div>
                                
                            </div>
                        </div>

                    </div>

                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="button_acc_emp"  class="btn btn-success"  onclick="acts_tohire();"> <i class="bi bi-check"></i> Accept Employee</button>
        <button type="button" id="button_refuse_emp" class="btn btn-danger"  onclick="acts_tohire();"> <i class="bi bi-arrow-counterclockwise"></i> Refuse Employee</button>
      </div>
    </div>
  </div>
</div>

<div id="container-body-images">

    <div id="div-header-new">

        <div id="header-images" style="position:relative;">
            <img src="<?php echo url('public/sdm-kerja.jpeg'); ?>" />
                <div style="position:absolute; top:0; right:0; width:100%; height:100%; background:rgba(50,50,50,0.7);">
                    <div style="position:absolute; top:0; left:0; margin:auto; width:100%;">
                        <div style="position:absolute; top:80px; left:0; right:0; margin:auto; width:100%;">
                            <center>
                                <img src="<?php echo url('public/logotranspererenan.png'); ?>" style="width:100px; height:100px; margin:auto; opacity:0.6;" />
                                <p></p>
                                <h1 style="font-size:16px; color:#fff;"> Employee Interview </h1>
                            </center>
                        </div>
                    </div>
                </div>
        </div>

        <!-- <div class="full-width padding">
            <h1> Punia Tamiu ( Nama Usaha )</h1>
        </div> -->


        <div>
            <div style="width:100%; position:relative;">
                    <div style="width:100%; text-align:center;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 col-6 tabs-view active-tabs" id="tabs-views-1" onclick="change_tabs(this,0);" style="cursor:pointer; border:1px solid #DDD; height:40px;  padding:6px 0; font-size:16px;">
                                   <i class="bi bi-clock-history"></i> &nbsp; InterView
                                </div>
                                <div class="col-md-6 col-6 tabs-view" id="tabs-views-2" onclick="change_tabs(this,1);" style="cursor:pointer; border:1px solid #DDD; height:40px;  padding:6px 0; font-size:14px;">
                                    <div style="float:left; margin-right:5px; margin-left:65px;"> <i class="bi bi-check" style="font-size:24px;"></i> </div> <div style='float:left; margin-top:2px;'> Accepted </div> 
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>

        <br clear="all" />
        <p></p>
    
        <div class="full-width padding" style="margin-top:-20px;">
            <div style="float:left;"> <h5 style="font-size:18px;"> <span id="span_waiting_karyawan"> Employee Waiting Approval </span> </h5>  </div>
            <div style="float:right;"> <i class="bi bi-person"></i> <span id="span_count_karyawan"> <?php echo count($karyawan); ?> </span>  </div>
            <br clear="all" />
            <hr />

            <div class="col-md-12"  style="margin:0; padding:0;">
                <div class="col-md-12"  style="margin:0; padding:0;">
                    <!-- <div class="row col-md-12 d-sm-flex justify-content-center"> -->
                    <div class="row col-md-12 d-sm-flex" style="margin:0; padding:0;"> 
                        <p></p>

                        <?php
                        //if(count($karyawan) == 0){
                            ?>
                            <div id="div-sorry-no">
                                <p></p>
                                <center>
                                    <img src="<?php echo url('public/sorry.png'); ?>" />
                                </center>
                                <br />
                                <center>
                                    <a href="javascript:void(0);"> <div style="width:90%; color:rgb(100, 174, 239); font-size:14px; background:rgb(231, 245, 255); margin-top:40px; border-radius:10px; padding:5px;"> No Employee interview </b></div> </a>
                                </center>
                            </div>

                            <div id="div-sorry-no-accepted">
                                <p></p>
                                <center>
                                    <img src="<?php echo url('public/sorry.png'); ?>" />
                                </center>
                                <br />
                                <center>
                                    <a href="javascript:void(0);"> <div style="width:90%; color:rgb(100, 174, 239); font-size:14px; background:rgb(231, 245, 255); margin-top:40px; border-radius:10px; padding:5px;"> No Employee Accepted </b></div> </a>
                                </center>
                            </div>
                            <?php
                        //}
                        //else{
                                ?>
                                <div  id="div-container-isi">
                                    
                                </div>
                                <p></p>
                                <!-- <center>
                                    <a href="javascript:void(0);"> <div style="width:120px; color:rgb(100, 174, 239); font-size:12px; background:rgb(231, 245, 255); margin-top:40px; border-radius:10px; padding:5px;"> Load More <i class="bi bi-chevron-down"></i> </div> </a>
                                </center> -->
                            <?php
                       // }
                        ?>
                        
                        
                    </div>
                </div>
            </div>
            
            </div>

            <div class="blog-container">
            <div class="blog-container-sub-2"></div>
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
      const id_skill = "<?php echo Request::segment(3); ?>";

      $("#div-sorry-no").hide();
      $("#div-sorry-no-accepted").hide();

      function get_pegawai(status){
          $("#div-container-isi").html("");

        $.ajax({
            type:"get",
            data:{
                id:status
            },
            dataType:"json",
            url:"<?php echo url('account/get-pegawai-list'); ?>",
            success:function(data){

                if(data.jumlah > 0){
                    $("#div-sorry-no").hide();
                    $("#div-sorry-no-accepted").hide();
                }
                else{
                    if(status == "0"){
                        $("#div-sorry-no").show();
                        $("#div-sorry-no-accepted").hide();
                    }
                    else{
                        //alert("here");
                        $("#div-sorry-no").hide();
                        $("#div-sorry-no-accepted").show();
                    }
                }

                $("#span_count_karyawan").html(data.jumlah);

                $.each(data.list , function(index , element){

                var index_kelamin = ["Perempuan","Laki-Laki"];

                var jadwal_interview = '<div style="margin-top:15px;"> <h4  style="font-size:12px; color:#000; font-weight:normal;"><i class="bi bi-calendar"></i>  &nbsp;'+format_tanggal(element.tanggal_interview)+' &nbsp;<i class="bi bi-clock-history"></i>  &nbsp;'+element.jam+'</h4></div>';
                

                var act_interview = '<div style="float:right;">'+
                            '<a class="nav-link-standard-back" href="javascript:void(0);" style="text-align:right;" onclick="show_modals('+element.id_tenaga_kerja+','+element.id_jadwal_interview+',1);"> <i class="bi bi-hand-thumbs-up"></i> Accept</a> &nbsp; || &nbsp;'+
                            '<a class="nav-link-standard-back" href="javascript:void(0);"  style="text-align:right;"  onclick="show_modals('+element.id_tenaga_kerja+','+element.id_jadwal_interview+',2);"> <i class="bi bi-calendar-x"></i> &nbsp;Refuse</a>'+
                            '</div><br clear="all" />';

                // var admission = moment(element.tanggal_diterima, 'DD-MM-YYYY'); 
                // var discharge = moment(new Date(), 'DD-MM-YYYY');

                // var date_diff = discharge.diff(admission, 'days');

                var exp_nows = element.tanggal_interview.split(" ");
                var sp_nows = exp_nows[0].split("-");

                var bulan_comp = sp_nows[1].substr(0,1) == "0" ? sp_nows[1].replace("0","") : sp_nows[1];

                

                const ds_years = new Date();
                let year = ds_years.getFullYear();

                //alert(sp_nows[2]);

                var an = moment([sp_nows[0], (bulan_comp-1), sp_nows[2]]);
                var bn = moment([year, ds_years.getMonth(), ds_years.getDate()]);
                var date_diff = an.diff(bn, 'days');
                
                var konten_dalam = "<br /> <div style='font-size:12px; margin-top:15px; color:green; text-align:center;'> <i class='bi bi-clock-history'></i>  </div>"+"<div style='margin-top:0; text-align:center; font-size:12px;'>"+date_diff+" days left";

                if(date_diff <= 0){
                    konten_dalam = "<br /> <div style='font-size:12px; margin-top:15px; color:red; text-align:center;'> Expired";
                }

                var actives = ""+konten_dalam+"</div>";
                
                if(status == "1"){
                    actives = "<br /> <div style='font-size:12px; margin-top:15px; color:green; text-align:center;'> <i class='bi bi-check'></i> <br /> Active Working </div>"+"<div style='margin-top:0; text-align:center; font-size:12px;'>"+format_tanggal(element.tanggal_diterima)+"</div>";
                    act_interview = '<div style="float:right;"> <a class="nav-link-standard-back" href="javascript:void(0);"  style="text-align:right;" onclick="nonactive_pegawai('+element.id_jadwal_interview+','+element.id_tenaga_kerja+');"> <i class="bi bi-person-dash-fill"></i> &nbsp;Non Active</a> </div><br clear="all" />';
                    jadwal_interview = '<div style="margin-top:15px;"> <h4  style="font-size:12px; color:#000; font-weight:normal;"><i class="bi bi-calendar"></i>  &nbsp;'+format_tanggal(element.tanggal_diterima)+'</div>';
                }

                var isi_pegawai = '<div id="div_pegawai_list'+element.id_jadwal_interview+'" class="col-md-12 card" style="margin:10px 0; padding:20px 20px 10px 20px; background:#DEDEDE">'+
                           '<div class="row"> <div class="col-md-4 col-4">'
                           +'<img src="<?php echo url('public/karyawan'); ?>/'+element.foto_profile+'" style="border-radius:50%; object-fit:cover; width:90px; height:90px;" class="img-fluid" /> '+actives
                           +'</div> <div class="col-md-8 col-8" style="position:relative;">'+
                           '<h4 style="font-size:18px; color:#000;" id="sp_nama_pegawai'+element.id_jadwal_interview+'">'+element.nama+'</h4><div style="font-size:14px; margin-top:-5px;"><b>'
                            +element.jabatan+'</b></div><div style="font-size:12px; margin-top:5px;"><b>'+element.umur+"</b> Tahun / "+index_kelamin[element.jenis_kelamin]
                           +'</div><div style="font-size:12px;">'+"<i class='bi bi-envelope-fill'></i> &nbsp;"+element.email_karyawan+" <br /> <i class='bi bi-whatsapp'></i>  &nbsp;"+element.no_wa
                           +'</div>'+jadwal_interview+'<p></p><div style="font-size:12px;">'+
                           act_interview+'<div style="margin-top:5px; display:none; float:right; clear:both;" id="div_hires_me'+element.id_jadwal_interview+'">'
                            +'Reason : <input type="text" name="tgl_interview'+element.id_jadwal_interview+'" id="tgl_interview'+element.id_jadwal_interview+'"/>'+
                            ''+
                            '<button  style="height:25px;" onclick="refuse_pegawai('+element.id_jadwal_interview+','+element.id_tenaga_kerja+');"> <i class="bi bi-plus"></i>  </button>'+
                            '</div></div></div></div></div>';

                    $("#div-container-isi").append(isi_pegawai);
                });
            
               // $("#div-container-isi").html(isi_pegawai);
            }
        })
        
      }

      get_pegawai("0");

      function show_modals(index,id_jadwal,acts){
        //"span_prof_param_1"

        $("#div-reasons-refusal").val("");

        if(acts == "1"){
            $("#div-reasons-refusal").hide();
            $("#button_refuse_emp").hide();
            $("#button_acc_emp").show();
        }
        else{
            $("#div-reasons-refusal").show();
            $("#button_refuse_emp").show();
            $("#button_acc_emp").hide();
        }
        
        $.ajax({
            type:"get",
            data:"id="+index,
            url:"<?php echo url('account/get-detail-karyawan-api'); ?>"+"/"+index,
            dataType:"json",
            success:function(data){
                $("#div-image-profile-pop").prop("src","<?php echo url('public/karyawan'); ?>"+"/"+data.foto_profile);

                $("#t_por_index").val(data.id_tenaga_kerja);
                $("#t_jadwal_index").val(id_jadwal);
                $("#t_aksi_index").val(acts);

                $("#span_prof_param_1").html(data.nama);
                $("#span_prof_param_2").html(data.umur);
                $("#span_prof_param_3").html(data.nama_skill);
                $("#span_prof_param_4").html(data.alamat);
                $("#span_prof_param_6").html(data.email_karyawan);
                $("#span_prof_param_7").html(data.no_wa);
                // $("#span_prof_param_3").html(data.nama);
                // $("#span_prof_param_4").html(data.nama);
                // $("#span_prof_param_5").html(data.nama);
                // $("#span_prof_param_6").html(data.nama);
                // $("#span_prof_param_7").html(data.nama);
            }
        })

          $("#exampleModalCenter").modal("show");
      }

      function acts_tohire(){

        if($("#t_aksi_index").val() == "1"){
            accept_pegawai();
        }
        else{
            refuse_pegawai();
        }

      }

      function accept_pegawai(){
        // var conn = confirm("Are You Sure Accept Employee " + $("#sp_nama_pegawai"+index).html() +" ?");

        //         if(conn == true){

                $.ajax({
                    data:{
                        _token:"<?php echo csrf_token(); ?>",
                        id:$("#t_jadwal_index").val()
                    },
                    type:"post",
                    dataType:"json",
                    url:"<?php echo url('account/accept-pegawai'); ?>",
                    success:function(data){
                        $("#exampleModalCenter").modal("hide");
                        change_tabs("#tabs-views-2","1");
                    }
                });
       // }

      }

      function show_alasan(index){
        $("#div_hires_me"+index).toggle();
      }

      function refuse_pegawai(index,idkaryawan){
        // var conn = confirm("Are You Sure Refuse Employee " + $("#sp_nama_pegawai"+index).html() +" ?");

        //         if(conn == true){

                $.ajax({
                    data:{
                        _token:"<?php echo csrf_token(); ?>",
                        id:$("#t_jadwal_index").val(),
                        idkar:$("#t_por_index").val(),
                        deskripsi:$("#tgl_interview"+index).val(),
                    },
                    type:"post",
                    dataType:"json",
                    url:"<?php echo url('account/refuse-pegawai'); ?>",
                    success:function(data){
                        $("#div_pegawai_list"+index).fadeOut();
                        change_tabs("#tabs-views-1","0");
                        $("#exampleModalCenter").modal("hide");
                    }
                });
        //}
      }

      function nonactive_pegawai(index,idkaryawan){
        // var conn = confirm("Are You Sure to NonActive Employee " + $("#sp_nama_pegawai"+index).html() +" ?");
        // if(conn == true){
            //$("#t_jadwal_index").val(id_jadwal);
            $.ajax({
                data:{
                    _token:"<?php echo csrf_token(); ?>",
                    id:index,
                    idkar:idkaryawan,
                    deskripsi:$("#teks_refusal_reason").val(),
                },
                type:"post",
                dataType:"json",
                url:"<?php echo url('account/refuse-pegawai'); ?>",
                success:function(data){
                    $("#div_pegawai_list"+index).fadeOut();
                    change_tabs("#tabs-views-1","0");
                }
            });
        //}
      }

      function change_tabs(tab,index){
        $('.tabs-view').removeClass('active-tabs'); 
        $(tab).addClass('active-tabs');

        if(index == 0){
            $("#span_waiting_karyawan").html("Employee Waiting Approval ");
            get_pegawai("0");
        }
        else{
            $("#span_waiting_karyawan").html("Accepted Employee ");
            get_pegawai("1");
        }
      }

        function hire_me(index){
            //alert(id_skill);

            $.ajax({
                data:{
                    _token:"<?php echo csrf_token(); ?>",
                    id:index,
                    tanggal:$("#tgl_interview"+index).val(),
                    skill:id_skill,
                    time:$("#tgl_time"+index).val()
                },
                type:"post",
                dataType:"json",
                url:"<?php echo url('account/hire-pegawai'); ?>",
                success:function(data){
                    if(data.status == "success"){
                        window.location = "<?php echo url('account/hired-employee'); ?>";
                    }
                }
            });

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
      
  </script>


@stop