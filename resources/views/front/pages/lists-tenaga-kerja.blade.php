@extends('front.newhome')

@section('isi_content')
   
<div id="div-header-wrapper">

    <div id="header" style="display:none;">
        <div class="container">
            <div class="header-custom"> <h5> <a  href="<?php echo url('account/daftar-tenaga-kerja'); ?>"> <i class="bi bi-arrow-left"></i> </a> &nbsp;  Employee Candidate ( {{ $skill->nama_skill }} )</h5> </div>
        </div>
    </div>        

    <div id="header-nobg">
        <div class="container">
            <div class="header-custom"> <h5> <a  href="<?php echo url('account/daftar-tenaga-kerja'); ?>"> <i class="bi bi-arrow-left" style="color:#FFFFFF;"></i> </a> </h5> </div>
        </div>
    </div>    

</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

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
                                <h1 style="font-size:16px; color:#fff;"> {{ $skill->nama_skill }}</h1>
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
            <!-- <div style="margin-top:-15px;"> <small style="color:#000;"><i class="fa fa-money"> </i> Total Punia   &raquo;   Rp. <?php //echo format_rupiah($totals); ?> , -</div>
            <div> <small style="color:#000;"><i class="fa fa-money"> </i> Punia Payment <small>  / month </small> &raquo; Rp. <?php //echo format_rupiah($rows->minimal_bayar); ?> , -</div> -->
        <!-- <div class="float-left sub-header"> <h4> Rp. 50.000.000 </h4> </div> <div class="float-left capts" style="margin-left:10px;"> <small> terkumpul dari tahun 2023 </small> </div>  -->
        </div>

        <br clear="all" />
    
        <div class="full-width padding" style="margin-top:-20px;">
            <div style="float:left;"> <h5 style="font-size:18px;"> <span id="span_waiting_karyawan"> Employee Candidate List </span> </h5>  </div>
            <div style="float:right;"> <i class="bi bi-person"></i> <span id="span_count_karyawan"> <?php echo count($karyawan); ?> </span>  </div>
            <br clear="all" />
            <hr />

            <div class="col-md-12"  style="margin:0; padding:0;">
                <div class="col-md-12"  style="margin:0; padding:0;">
                    <!-- <div class="row col-md-12 d-sm-flex justify-content-center"> -->
                    <div class="row col-md-12 d-sm-flex" style="margin:0; padding:0;"> 
                        <p></p>

                        <?php
                        if(count($karyawan) == 0){
                            ?>
                            <p></p>
                            <center>
                                <img src="<?php echo url('public/sorry.png'); ?>" />
                            </center>
                            <br />
                                        <center>
                                            <a href="javascript:void(0);"> <div style="width:90%; color:rgb(100, 174, 239); font-size:14px; background:rgb(231, 245, 255); margin-top:40px; border-radius:10px; padding:5px;"> Sorry , no employee candidate for <b> {{ $skill->nama_skill }} </b></div> </a>
                                        </center>
                            <?php
                        }
                        else{
                            foreach($karyawan as $rows_data){
                                ?>
                                    <div class="col-md-12 card" style="margin:10px 0; padding:20px 20px 10px 20px; background:#DEDEDE">
                                        <div class="row">
                                            <div class="col-md-4 col-4">
                                                <img src="<?php echo url('public/karyawan/'.$rows_data->foto_profile); ?>" style="border-radius:50%; width:90px; height:90px;" class="img-fluid" />
                                            </div>
                                            <div class="col-md-8 col-8" style="position:relative;">
                                                <h4 style="font-size:18px; color:#000;">
                                                    <?php
                                                        echo $rows_data->nama; 
                                                    ?>
                                                </h4>
                                                <div style="font-size:12px;">
                                                    <?php
                                                        echo "<b>".$rows_data->umur."</b> Tahun / ".Config::get("myconfig.jk_tenaga")[$rows_data->jenis_kelamin]; 
                                                    ?>
                                                </div>
                                                <div style="font-size:12px;">
                                                    <?php
                                                        echo "<i class='bi bi-envelope-fill'></i> &nbsp;".$rows_data->email_karyawan." <br /> <i class='bi bi-whatsapp'></i>  &nbsp;".$rows_data->no_wa; 
                                                    ?>
                                                </div>
                                                <p>&nbsp;</p>
                                                <div style="font-size:12px;">
                                                <div style="float:right;">
                                                    <a class="nav-link-standard-back" href="#" style="text-align:right;"> <i class="bi bi-eye"></i> View Detail</a> &nbsp; || &nbsp;
                                                    <a class="nav-link-standard-back" href="javascript:void(0);"  style="text-align:right;" onclick="$('#div_hires_me<?php echo $rows_data->id_tenaga_kerja; ?>').toggle();"> <i class="bi bi-hand-thumbs-up"></i> Hire Me</a>
                                                </div>    
                                                <br clear="all" />
                                                    <div style="margin-top:5px; float:right; display:none; clear:both;" id="div_hires_me<?php echo $rows_data->id_tenaga_kerja; ?>">
                                                        Date :
                                                        <input type="date" name="tgl_interview<?php echo $rows_data->id_tenaga_kerja; ?>" id="tgl_interview<?php echo $rows_data->id_tenaga_kerja; ?>"/> 
                                                        &nbsp; Time :
                                                        <input type="time" name="tgl_time<?php echo $rows_data->id_tenaga_kerja; ?>" id="tgl_time<?php echo $rows_data->id_tenaga_kerja; ?>"/>
                                                        <button  style="height:30px;" onclick="hire_me('<?php echo $rows_data->id_tenaga_kerja; ?>');"> <i class="bi bi-plus"></i>  </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   
                                <?php
                            }
                            ?>
                                <p></p>
                                <center>
                                    <a href="javascript:void(0);"> <div style="width:120px; color:rgb(100, 174, 239); font-size:12px; background:rgb(231, 245, 255); margin-top:40px; border-radius:10px; padding:5px;"> Load More <i class="bi bi-chevron-down"></i> </div> </a>
                                </center>
                            <?php
                        }
                        ?>
                        
                        
                    </div>
                </div>
            </div>
            
            </div>

            <div class="blog-container">
            <div class="blog-container-sub-2"></div>
        </div>
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