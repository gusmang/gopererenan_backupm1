<?php
if(Request::segment(2) != "edit-profile"){
?>

<div id="header" style="display:none;">

    <div class="container">

        <div class="header-custom"> 
            <div style="float:left;">
                <h5> <a  href="<?php echo url('/'); ?>"> <i class="bi bi-arrow-left"></i> </a> &nbsp;  <?php echo ucwords(Request::segment(2)); ?>  </h5> 
            </div>
            <div style="float:right;">
                <h5> <a  href="javascript:void(0)"> <i class="bi bi-person"></i> <i class="bi bi-chevron-down" style="font-size:14px;"></i> </a>  </h5> 
            </div>
        </div>
        
    </div>

</div>        

<div id="header-nobg">
    <div class="container">
        <div class="header-custom"> 
            
            <div style="float:left;">
                <h5> <a  href="<?php echo url('/'); ?>"> <i class="bi bi-arrow-left" style="color:#FFFFFF;"></i> </a> </h5>  
            </div>
            <div style="float:right; position:relative;">
                <h5> 
                    
                    <a href="javascript:void(0)" onclick="$('#div-menu-account-toggle').toggle();"> 
                        <i class="bi bi-person"></i> <i class="bi bi-chevron-down" style="font-size:14px;"></i> 
                    </a>  

                </h5> 

                <div id="div-menu-account-toggle" class="div-menu-account-toggle" style="position:absolute; display:none; top:30px; width:100px; padding:0 5px; right:0; background:#fff; border-radius:5px;">
                      <div style="padding:10px 10px 10px 0; font-size:11px; color:#666; border-bottom:1px solid #eee;">
                          <a href="<?php echo url('account/edit-profile'); ?>"> <i class="bi bi-pencil" style="font-size:10px;"></i> &nbsp;Edit Profile </a>
                      </div>
                      <div style="padding:10px 10px 10px 0; font-size:11px; color:#666; border-bottom:1px solid #eee;">
                          <a href="<?php echo url('account/punia-tamiu'); ?>"> <i class="bi bi-cash-stack" style="font-size:10px;"></i> &nbsp;Punia Tamiu </a>
                      </div>
                      <div style="padding:10px 10px 10px 0; font-size:11px; color:#666; border-bottom:1px solid #eee;">
                          <a href="<?php echo url('account/tenaga-kerja'); ?>"> <i class="bi bi-person" style="font-size:10px;"></i> &nbsp;Employee </a>
                      </div>
                      <div style="padding:10px 10px 10px 0; font-size:11px; color:#666; border-bottom:1px solid #eee;">
                          <a href="<?php echo url('account/logout-users'); ?>"> <i class="bi bi-door-closed" style="font-size:10px;"></i> &nbsp;Logout </a>
                      </div>
                      
                </div>

            </div>

        </div>
    </div>
</div>    

<?php
}
?>