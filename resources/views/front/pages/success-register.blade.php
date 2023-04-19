@extends('front.newhome')

@section('isi_content')
   
<div id="header">
    <div class="container">
        <div class="header-custom"> <h5> <a href="<?php echo url('/'); ?>"> <i class="bi bi-arrow-left" ></i></a>  &nbsp;  Back to HomePage </h5> </div>
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
            <img src="<?php echo url('/public/logotranspererenan.png'); ?>" style=" width:150px; height:120px;" /><p>&nbsp;</p>
            <i class="bi bi-check-circle" style="font-size:48px; color:green;"></i> 
            <p></p>
            <h1 style="font-size:21px;">  Registration Success</h1> 
        </center>    

        <p>&nbsp;</p>

        <div class="alert alert-success" role="alert">
            Thank you for register your account . We will check your registration and will inform username and password to your email soon after approved !
        </div>
       
        
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