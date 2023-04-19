@extends('front.newhome')

@section('isi_content')
   
<div id="header">
    <div class="container">
        <div class="sub-head first"> <img src="<?php echo url('assets/pererenan'); ?>/img/favicon.png"  /> </div> <div class="sub-head second"> <input type="text" placeholder="Masukkan Pencarian Anda Di Sini ... " /> </div>
    </div>
</div>

<div id="container-body">

    <div class="slider-container">
            <div class="slider-caption"> 
                <h5> Selamat Datang di GoPererenan </h5>
                <div class="caption-sub"> <marquee></small> Layanan publik untuk dana punia dan sumbangan </small></marquee></div>
            </div>
    </div>

    <div id="main-two">
        <ul style="font-size:13px;">
            <li>
                 <center> 
                     <a href="<?php echo url('account/punia-tamiu'); ?>">
                        <img src="<?php echo url('public/menu/Punia.png'); ?>" width="50" class="punia-bottom-menu"  /> 
                    </a>
                     <p></p>
                    Punia
                 </center> 
            </li>
            <li>
                <center> 
                <a href="<?php echo url('mari-menyumbang'); ?>">
                    <img src="<?php echo url('public/menu/Sumbangan.png'); ?>" width="50" class="punia-bottom-menu" /> 
                </a>
                    <p></p>
                    Donation
                 </center> 
            </li>
            <li>
                <center> 
                <a href="<?php echo url('account/tenaga-kerja'); ?>">    
                    <img src="<?php echo url('public/menu/tenagakerja.png'); ?>" width="50" class="punia-bottom-menu" /> <p></p>
                </a>
                Employee
                 </center> 
            </li>
            <li>
                <center> 
                <a href="<?php echo url('blog/list'); ?>">  
                    <img src="<?php echo url('public/menu/blog.png'); ?>" width="50" class="punia-bottom-menu" /> 
                </a>
                    <p></p>
                    Blog
                 </center> 
            </li>
        </ul>
    </div>

    <br clear="all" />

    <div class="slider-container-two">
        
    <div id="carouselExampleCaptions" class="carousel slide" data-mdb-ride="carousel">
    <!-- <div style="position:absolute; top:0; left:0; background:rgba(50,50,50,0.5); z-index:10; width:100%; height:100%;"></div> -->
        <div class="carousel-indicators">
        <?php
        $ans = 0;
        foreach($data as $rows){
        $active = $ans == 0 ? "active" : "";
        ?>  

            <button
            type="button"
            data-mdb-target="#carouselExampleCaptions"
            data-mdb-slide-to="<?php echo $ans; ?>"
            class="<?php echo $active; ?>"
            aria-current="true"
            aria-label="Slide <?php echo $ans+1; ?>"
            ></button>
        <?php
        $ans++;
        }
        ?>
            <!-- <button
            type="button"
            data-mdb-target="#carouselExampleCaptions"
            data-mdb-slide-to="1"
            aria-label="Slide 2"
            ></button>
            <button
            type="button"
            data-mdb-target="#carouselExampleCaptions"
            data-mdb-slide-to="2"
            aria-label="Slide 3"
            ></button> -->
        </div>
        <div class="carousel-inner">
            <?php
            $ans = 0;
                foreach($data as $rows){
                $active = $ans == 0 ? "active" : "";
                ?>  
                 <div class="carousel-item <?php echo $active; ?>">
                    <img src="<?php echo url('public/GambarSlides/'.$rows->image_name); ?>" class="d-block w-100" style="height:200px; object-fit:cover;" alt="Wild Landscape"/>
                    <!-- <div class="carousel-caption d-none d-md-block" style="background:rgba(50,50,50,0.5); margin-bottom:20px;">
                        <h5><?php //echo  $rows->title; ?></h5>
                        <p><?php //echo  $rows->deskripsi; ?></p>
                    </div> -->
                </div>
                <?php
                $ans++;
                }
            ?>
           

        </div>
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleCaptions" data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleCaptions" data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    </div>


    <div class="blog-container-sub-title"> 
        <div class="sub float-left"> <h4> Kegiatan Kami </h4> </div>
        <div class="sub float-right">  <a href="<?php echo url('blog/list'); ?>"> <h5> Lihat Lainnya <i class="bi bi-chevron-right"></i> </h5>  </a></div>
    </div>

    <div class="blog-container">


        
        <div class="blog-container-sub-2">

        <?php
            //$ans = 0;
                foreach($berita as $rows){
                //$active = $ans == 0 ? "active" : "";
               // $tanggal = explode(" " , $rows->tanggal_berita);
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



    
@stop

@section('isi_content')


@stop