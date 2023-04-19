@extends('front.newhome')

@section('isi_content')
   
<div id="header">
    <div class="container">
        <div class="header-custom"> <h5> <a href="<?php echo url('/'); ?>"> <i class="bi bi-arrow-left" ></i></a>  &nbsp; Sign In to your account </h5> </div>
    </div>
</div>        

 
    <!-- <div class="headers-3" style="display:none;">
        <div class="container">
            <div class="header-custom"> <h5> <i class="bi bi-arrow-left" href="javascript:void(0);"></i> &nbsp; Pilih Metode Pembayaran</h5> </div>
        </div>
    </div>    -->
    

    <div id="container-body">

    <div style="padding:30px 30px 0 30px; font-size:13px;">
        <center>
            <img src="<?php echo url('/public/logotranspererenan.png'); ?>" style=" width:150px; height:120px;" /><p></p>
            <h1 style="font-size:21px;">Sign In to your account</h1> 
        </center>    
        
        <p></p>
        <hr />

        <form id="form_method" name="form_method" method="post" onsubmit="submit_post_login(this); return false;">

            {{ csrf_field() }}

            <div class="col-md-12">
                    Username : <p></p>
                    <input type="text" class="form-control" id="t_username" name="t_username" style="padding:10px;" placeholder="Input Username ... " required />
            </div>

            <p></p>

            <div class="col-md-12">
                    Password : <p></p>
                    <input type="password" class="form-control" id="t_password" name="t_password" style="padding:10px;" placeholder="Input Password ... " required  />
            </div>

            <p></p>
            <div class="col-md-12">
                    <button class="btn btn-primary form-control" type="submit"> Sign In</button>
            </div>

        </form>

        <p></p>
        <center> Forgot Password ? <a href="#"> Request </a> </center>

        <div style="height:60px;"></div>

        <center> 
            <div style="font-size:14px;">
                Don't Have Account ? <a href="<?php echo url('register-new'); ?>"> Sign Up </a>
            </div>
        </center>

        <!-- <hr /> -->
        
    </div>

@stop

@section('footer_scripts')


  <script type="text/javascript">
      
      function submit_post_login(form){

        $.ajax({
            data:$(form).serialize(),
            url:"<?php echo url('submit-data-login'); ?>",
            type:"post",
            dataType:"json",
            success:function(data){
                //alert(data.status);
                if(data.status == "success"){
                    window.location="<?php echo url('account/punia-tamiu'); ?>";
                }
            }
        });

    }
    
  </script>


@stop