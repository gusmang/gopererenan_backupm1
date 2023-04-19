@extends('front.newhome')

@section('isi_content')
   
<div id="header">
    <div class="container" style="color:#fff;">
        <a href="<?php echo url('/'); ?>"> <i class="bi bi-arrow-left" href="javascript:void(0);" style="color:#fff; font-weight:bold;"></i> </a> &nbsp; Kegiatan GoPererenan</h5> 
    </div>
</div>


    <!-- <div class="headers-3" style="display:none;">
        <div class="container">
            <div class="header-custom"> <h5> <i class="bi bi-arrow-left" href="javascript:void(0);"></i> &nbsp; Pilih Metode Pembayaran</h5> </div>
        </div>
    </div>    -->

    <div id="container-body">
            <!-- <div class="full-width padding">
                <h1> Sumbangan anda sangat berarti untuk perkembangan Desa kami </h1>
            </div> -->

           

            <!-- <div class="full-width padding">
               <div class="float-left sub-header"> <h4> Rp. 50.000.000 </h4> </div> <div class="float-left capts" style="margin-left:10px;"> <small> terkumpul dari tahun 2023 </small> </div> 
            </div>
            <br clear="all" />

            <div class="full-width padding">
                    <a href="<?php //echo route("form-sumbangan"); ?>"> <Button class="btn btn-primary form-control"> Donasi Sekarang </Button> </a>
            </div>
            

            <div class="full-width padding">
               <div class="float-left"> <h4 style="font-size:28px; font-weight:bold; color:rgb(0, 174, 239);"> <b> 100 <small style="font-size:12px; color:#000000;"> Donasi Terkumpul </small>  </b> </h4></div> 
            </div>
            <p></p> -->

            <div class="col-md-12" style="padding:20px;">

                <div class="row">
                <div class="col-md-3 col-3" style="position:relative; margin:0; padding:5px;"> 

                        <select class="form-control" style="font-size:12px;" name="cmb_kategori" id="cmb_kategori">
                            <option value="">All</option>
                            <?php 
                            foreach($kategori as $values_br){
                                $selected = "";

                                if(isset($_GET['cat'])){
                                    $selected = $values_br->id_kategori_berita == $_GET['cat'] ? "selected='selected'" : "";
                                }
                                ?>
                                    <option value="{{ $values_br->id_kategori_berita }}" <?php echo $selected; ?>>{{ $values_br->nama_kategori_berita }}</option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <?php
                    $keys = "";

                    if(isset($_GET['keyword'])){
                        $keys = rawurldecode($_GET['keyword']);
                    }

                    ?>
                   

                    <div class="col-md-9 col-9" style="position:relative;  margin:0; padding:5px;"> 
                        <div style="position:absolute; top:12px; right:20px; color:#999;" onclick="search_data();">  <i class="bi bi-search"></i>  </div>
                        <input type="text" name="t_keyword_title" id="t_keyword_title" class="form-control" placeholder="Input Blog Title name" style="padding-right:25px; font-size:12px;" value="<?php echo $keys; ?>" />
                    </div>
                   
                </div>

            </div>

            <div class="col-md-12 col-lg-12" style="padding:5px 20px 35px 20px;" id="div_blog_list">

            
                    
            @foreach($berita as $rows_br)
            <?php
                $ex_tgl = explode(" " ,$rows_br->tanggal_berita);
            ?>

                    <div class="row">

                        <div class="col-md-6 col-6" style="border-radius:10px; position:relative;">
                            <div style="position:absolute; top:10px; right:20px; padding:2px 5px; background:rgb(0, 174, 239); border-radius:5px; font-size:9px; color:#eee;"> {{ $rows_br->nama_kategori_berita }} </div>
                            <img class="img-fluid" style="width:100%; height:150px; object-fit:cover; border-radius:10px;" src="<?php echo url('public/berita/foto/'.$rows_br->foto); ?>" /> 
                        </div>
                        <div class="col-md-6 col-6"  style="margin-top:15px;">
                            <h3 style='font-size:14px;' class="judul_berita_cls"> <a href="<?php echo url('blog/'.$rows_br->slug); ?>"> {{ $rows_br->judul_berita }} </a> </h3>
                            <h4 style='font-size:10px; font-weight:normal;'> <small> Posted At &raquo; <?php echo tgl_indo($ex_tgl[0]); ?> </small> </h5>
                            <div style="height:50px; margin-top:10px; overflow:hidden; font-size:11px;"> 
                                <?php echo strip_tags(trim(substr($rows_br->isi_berita , 0 , 120))); ?> ...
                            </div>
                            <div style="font-size:10px; margin-top:10px;"> <i class="bi bi-chat"></i> 0 Comment  &nbsp; <a href="<?php echo url('blog/'.$rows_br->slug); ?>"> <i class="bi bi-eye"></i> View Detail </a> </div>
                            <!-- <h5 style='font-size:13px; font-weight:normal;'> <small> 21 Januari 2023 </small> </h5> -->
                        </div>
                        
                    </div>

                <hr />

            @endforeach

            </div>

            <!-- <center>
                <div class="lds-dual-ring" st></div> 
            </center> -->

            <!-- <center>
                <a href="javascript:void(0);" onclick="ambil_data_blog();"> <div style="width:120px; color:rgb(100, 174, 239); font-size:12px; background:rgb(231, 245, 255); margin-top:40px; border-radius:10px; padding:5px;"> Load More <i class="bi bi-chevron-down"></i> </div> </a>
            </center> -->

            <div id="pagination" style="width:100%; margin-top:10px;">

                <center>

                    <nav aria-label="...">
                    @include('pagination.defaultnew', ['paginator' => $berita])
                    </nav>

                </center>

            </div>


@stop

@section('footer_scripts')


  <script type="text/javascript">
      
      
    var last_segment = 1;

    //   function onScroll() {    
    //         if (window.pageYOffset + window.innerHeight >= document.documentElement.scrollHeight - 500) {
    //             //Console.log('Reached bottom')
    //             //alert("bottom!");
    //             ambil_data_blog();
    //         }
    // }
    function search_data(){

        window.location = "<?php echo url("blog/list"); ?>?keyword="+$('#t_keyword_title').val()+"&cat="+$("#cmb_kategori").val();

    }

    window.addEventListener("scroll", onScroll);

      function ambil_data_blog(){
          last_segment++;

          $.ajax({
              type:"GET",
              data:"page="+last_segment,
              url:"<?php echo url('blog_list_paging'); ?>",
              dataType:"json",
              success:function(data){
                  console.log("datas" , data);

                    $.each(data.data , function(index,element){
                        var url_berita  = "<?php echo url('blog'); ?>"+"/"+element.slug;
                        var slug_foto   = "<?php echo url('public/berita/foto'); ?>"+"/"+element.foto;
                        var ex_tgl      = element.tanggal_berita.split(" ");

                        //alert(element.slug);

                        var append_elements = '<div class="row">'+
                        '<div class="col-md-6 col-6" style="border-radius:10px;">'+
                                '<img class="img-fluid" style="width:100%; height:150px; object-fit:cover; border-radius:10px;" src="'+slug_foto+'"  />'+ 
                        '</div>'+
                           '<div class="col-md-6 col-6"  style="margin-top:15px;">'+
                                '<h3 style="font-size:18px;" class="judul_berita_cls"> <a href="'+url_berita+'"> '+element.judul_berita+' </a> </h3>'+
                                '<h4 style="font-size:14px; font-weight:normal;""> <small> Posted At &raquo; '+ ex_tgl[0] +'</small> </h5>'+
                                '<h5 style="font-size:13px; font-weight:normal;"> <small> <i class="fa fa-eye"> 0 </i> <small> Views </small> </small> </h5>'+
                                '</div></div>';

                        $("#div_blog_list").append(append_elements);

                    });
              }
          })
      }
    
  </script>


@stop