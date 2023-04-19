@extends('front.newhome')

@section('isi_content')
   
<div id="header">
    <div class="container">
        <div class="sub-head first"> <img src="<?php echo url('assets/pererenan'); ?>/img/favicon.png"  /> </div> <div class="sub-head second"> <input type="text" placeholder="Masukkan Pencarian Anda Di Sini ... " /> </div>
    </div>
</div>

<div id="container-body">

    <div class="slider-container" style="background:url('<?php echo url('public/GambarSlides/'.$head[0]->image_name); ?>'); background-size:cover;
    background-position: center;">
            <div class="slider-caption"> 
                <h5> Welcome to GoPererenan</h5>
                <div class="caption-sub"> <marquee></small> Public Service for dana punia and Donation </small></marquee></div>
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
                 <a href="<?php echo $rows->url_link; ?>">
                    <img src="<?php echo url('public/GambarSlides/'.$rows->image_name); ?>" class="d-block w-100" style="height:200px; object-fit:cover;" alt="Wild Landscape"/>
                 </a>
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

    <div class="col-md-12 blog-new-containers" style="background:#FFF!impotant; width:100%; padding:20px;">
        
        <div class="col-md-12" style="background:#FFF!impotant;">

            <div class="row"  style="background:#FFF!impotant; width:100%;">

            <!-- <nav class="nav nav-pills nav-fill">

                <a class="nav-item nav-link active" href="#">Active</a>
                <a class="nav-item nav-link" href="#">Link</a>
                <a class="nav-item nav-link" href="#">Link</a>
                <a class="nav-item nav-link disabled" href="#">Disabled</a>
            </nav> -->

            <?php
                //$ans = 0;
                foreach($berita as $rows){
                $active = $ans == 0 ? "active" : "";
                $tanggal = explode(" " , $rows->tanggal_berita);
                ?>  
                    
                    <div class="col-md-12 col-12" style="margin:20px 0; padding-right:0;">

                    <div class="row">

                        <div class="col-md-5 col-5">
                            <div class="col-md-12" style="background:#FFF!impotant;">
                                <img src="<?php echo url('public/berita/foto/'.$rows->foto); ?>" style="object-fit:cover; border-radius:10px; height:100px; width:100%;" />
                            </div>
                        </div>

                        <div class="col-md-7 col-7" style="margin:0; padding:0;">
                            <div class="col-md-12">
                                <h5> <a href="<?php echo url('blog/'.$rows->slug); ?>" style="font-size:14px;">  <?php echo $rows->judul_berita; ?> </a> </h5>
                                <div class="caption-sub" style="font-size:10px;"><small> Diposting pada : <?php echo tgl_indo($tanggal[0]); ?> </small>

                                <div style="height:30px; margin-top:10px; overflow:hidden; font-size:11px;"> 
                                    <?php echo strip_tags(trim(substr($rows->isi_berita , 0 , 120))); ?>
                                </div>
                                
                                <div style="font-size:10px; margin-top:10px;"> <i class="bi bi-chat"></i> 0 Comment  &nbsp; <a href="<?php echo url('blog/'.$rows->slug); ?>"> <i class="bi bi-eye"></i> View Detail </a> </div>
                            </div>
                        </div>

                    </div>

                    </div>

                <?php
                }
            ?>

            </div>

        </div>

    </div>

    
@stop

@section('isi_content')


@stop