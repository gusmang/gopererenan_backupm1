@extends('front.indexhome')

@section('isi_content')


<div id="container-body">

<div id="container" style="padding:10px 30px; box-sizing:border-box;">

    <div class="col-md-12">

        <div class="row">

        <form method="post" id="form_checkouts" name="form_checkouts">
            {{ csrf_field() }}
            <input type="hidden" name="_method" id="_method" value="post" />
            <input type="hidden" name="t_list_product" id="t_list_product" />
        </form>

            <div class="col-md-8" style="margin-top:10px;" id="div_cart_list_checkout">

            </div>

            <div class="col-md-4" style="margin-top:30px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ringkasan belanja</h5><hr />
                        <div class="row">
                            <div class="col-md-7">
                                <p class="card-text">Total Harga (<span id="sp_total_produk">6</span> produk)</p>
                            </div>
                            <div class="col-md-5">
                                <p class="card-text text-right">Rp. <span id="sp_totalsub_produk">1.890.000</span></p>
                            </div>

                            <div class="col-md-7">
                                <p class="card-text">Biaya Ongkir</p>
                            </div>
                            <div class="col-md-5">
                                <p class="card-text text-right">Rp. 0</p>
                            </div>

                            <div class="col-md-12" style="border-top:1px solid #DDDDDD; margin:10px 0;"></div>

                            <div class="col-md-7">
                                <p class="card-text">Total Biaya</p>
                            </div>
                            <div class="col-md-5">
                                <p class="card-text text-right">Rp. <span id="sp_totalharga_produk">1.890.000</span></p>
                            </div>

                            <div class="col-md-12" style="margin:15px 0 0 0;">
                                <a href="javascript:void(0);" onclick="checkout_now()"><button class="btn btn-success form-control text-white"> CHECKOUT </button></a>
                            </div>

                    </div>
                </div>
            </div>


            </div>

    </div>

</div>

    <!-- Details Popup -->
   

@stop

@section('footer_scripts')

<script type="text/javascript">
var items_all = JSON.parse(localStorage.getItem("cartItems"));

//alert(items_all.length);

if(items_all.length === 0){
    window.location = url_utama + "/";
}

function append_cart_template_checkout(){
    const items_array_list = JSON.parse(localStorage.getItem("cartItems"));
    $("#div_cart_list_checkout").html("");

    var quantity = 0;
    var total_biaya = 0;

    $.each(items_array_list , function(index,element){
        const indexElement = element.index - 1;
        const asset_img = img_assets + productsImg_array[indexElement];
        const productCartIndex = productsIndex_array[indexElement];
        const produtcCartPrice = toRupiah(productsPrice_array[indexElement]);
        const productCartName = productsName_array[indexElement];
        const productsCartDesc = productsDesc_array[indexElement];

        const produtcCartSubTotal = toRupiah(element.price*element.qty);

        const header    = '<div class="col-md-12"  style="margin-top:20px;"><div class="row">';
        const header2   = '<div class="col-md-4">';
        const headerImg = '<img src="'+asset_img+'" style="width:100%; height:150px; object-fit:cover;" alt="..." /></div>';
        
        const div_cart_items = '<h5 class="card-title">'+productCartName+'</h5>'+"<p class='card-text'>"+productsCartDesc+"</p>"+"<p class='card-text text-right'><b> Rp. <span id='normal_qty_item_"+productCartIndex+"'>"+produtcCartPrice+"</span></b><br /><small>( "+element.qty+" Pcs Item )</small></p><hr />"
                                +'<p class="card-text text-right"><b> Rp. '+produtcCartSubTotal+' </b></p>';
                                
        
        const cardBody  = '<div class="col-md-8">'+div_cart_items+'</div>';

        const templates = header+header2+headerImg+cardBody+"</div></div>";

        quantity += element.qty;
        total_biaya += (element.price*element.qty);

        $("#div_cart_list_checkout").prepend(templates);
    });

    $("#t_list_product").val(localStorage.getItem("cartItems"));
    $("#sp_total_produk").html(quantity);
    $('#sp_totalharga_produk').html(toRupiah(total_biaya));
    $('#sp_totalsub_produk').html(toRupiah(total_biaya));
    

}

append_cart_template_checkout();

function checkout_now(){
    $("#loader_pr").show();

    $.ajax({
        type:"POST",
        data:$("#form_checkouts").serialize(),
        url:"<?php echo url('payment'); ?>",
        success:function(data){
            window.open(data);

            localStorage.clear();
            window.location = url_utama + "/";

            $("#loader_pr").hide();

        }
    })
}


</script>

@stop