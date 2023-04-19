@extends('front.newhome')

@section('isi_content')
   
<div id="div-header-wrapper">

    <div id="header" style="display:none;">
        <div class="container">
            <div class="header-custom"> <h5> <a  href="<?php echo url('account/punia-tamiu'); ?>"> <i class="bi bi-arrow-left"></i> </a> &nbsp;  Tenaga Kerja </h5> </div>
        </div>
    </div>        

    <div id="header-nobg">
        <div class="container">
            <div class="header-custom"> <h5> <a  href="<?php echo url('account/punia-tamiu'); ?>"> <i class="bi bi-arrow-left" style="color:#FFFFFF;"></i> </a> </h5> </div>
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
                <div style="position:absolute; top:0; right:0; width:100%; height:100%; background:rgba(50,50,50,0.5);">
                    <div style="position:absolute; top:0; left:0; margin:auto; width:100%;">
                        <div style="position:absolute; top:80px; left:0; right:0; margin:auto; width:100%;">
                            <center>
                                <img src="<?php echo url('public/logotranspererenan.png'); ?>" style="width:100px; height:100px; margin:auto; opacity:0.6;" />
                                <p></p>
                                <h1 style="font-size:16px; color:#fff;"> Tenaga Kerja</h1>
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
            <center> <h5> Bidang Tenaga Kerja </h5> </center>
            <hr />

            <div class="col-md-12"  style="margin:0; padding:0;">
                <div class="col-md-12" style="margin:0; padding:0;">
                    <div class="row col-md-12 d-sm-flex justify-content-center"  style="margin:0; padding:0;">
                        <p></p>
                        
                        <div class="col-md-6 col-6">
                            <center>
                                <img style="border-radius:10px; border:1px solid #ddd;  height:130px;" src="<?php echo url('public/hiring.png'); ?>" class="img-fluid" /> 
                                <p></p>
                                <h5 style="text-align:center; font-size:15px;">
                                   <a class="nav-link-standard" href="<?php echo url('account/daftar-tenaga-kerja'); ?>">  Employee Candidate List  </a>
                                </h5>
                            </center>
                        </div>

                        <div class="col-md-6 col-6">
                            <center>
                                <img style="border-radius:10px; border:1px solid #ddd; height:131px;" src="<?php echo url('public/hire-human.jpeg'); ?>" class="img-fluid" /> 
                                <p></p>
                                <h5 style="text-align:center; font-size:15px;">
                                    <a class="nav-link-standard" href="<?php echo url('account/hired-employee'); ?>">  Hiring Status </a>
                                </h5>
                            </center>
                        </div>

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
      
  </script>


@stop