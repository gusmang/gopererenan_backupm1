<div id="div_shopping_cart" class="visible" style="position:fixed; width:400px; height:100vh;  top:0; right:0; background:#177076; z-index:100; padding:20px;">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-10" style="color:#FFFFFF; font-size:24px;">
                SHOPPING CART
            </div>
            <div class="col-md-2 text-right" onclick="$('#div_shopping_cart').toggleClass('visible');">
                <a href="#"> <i class="bi bi-x float-right" style="color:#FFFFFF; font-size:24px;"></i> </a>
            </div>

            <div class="col-md-12" style="margin:10px 0; border-top:1px solid #FFFFFF;"></div>

            <div class="col-md-12"  id="div_cart_list_element" style="height:80vh!important; max-height:80vh!important; overflow:auto;">
                    
            </div>

            <div class="col-md-12"  id="div_cart_list_element" style="height:20vh!important; max-height:20vh!important; overflow:hidden;">
                    <p></p> 
                    <a href="<?php echo url('checkout'); ?>"> <button class="btn btn-primary form-control text-white"> CHECKOUT </button> </a>
            </div>

            
        </div>
    </div>
        
</div>


<div id="loader_pr" style="display:none; position:fixed; width:100%; height:100%; z-index:100000000; background:rgba(50,50,50,0.8); overflow:hidden;">
        <div class="loader" style="color:#FFFF00;">
            <div class="loader__figure" style="border:0 solid #FFFF00;"></div>
            <p class="loader__label" style="color:#FFFF00;">Upload Data .. Please Wait</p>
        </div>
</div>

<nav class="navbar navbar-expand-md navbar-dark bg-green" role="navigation" id="navbar">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-10"><h1 style="font-size:28px; color:#FFFFFF;"> <a href="<?php echo url("/"); ?>" style="font-size:28px; color:#FFFFFF;"> MARI BELANJA </a> </h1></div>
            <div class="col-md-2" style="position:relative; cursor:pointer;" onclick="append_cart_template(); $('#div_shopping_cart').toggleClass('visible');"><h5 style="font-size:28px; color:#FFFFFF; text-align:right;"> <i class="bi bi-cart"></i> </h5> <div style="width:23px; height:23px; padding:3px; box-sizing:border-box; background:#FF6600; color:#ffffff; position:absolute; top:-3px; right:3px; border-radius:50%; z-index:1; text-align:center; font-size:11px;"> <span id="jml_items"> 0 </span> </div>  </div>
        </div>  
    </div>
</nav>
