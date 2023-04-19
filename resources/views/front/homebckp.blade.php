<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo url('assets/front'); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo url('assets/front'); ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo url('assets/front'); ?>/css/bootstrap-grid.css">    
    <link rel="stylesheet" href="<?php echo url('assets/front'); ?>/css/responsive.css">
    <link rel="stylesheet" href="<?php echo url('assets/front'); ?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo url('assets/front'); ?>/css/owl.theme.default.css">
    <link rel="stylesheet" href="<?php echo url('assets/front'); ?>/css/animate.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;700&family=Source+Sans+Pro:wght@400;700;600&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo url('assets/front'); ?>/images/favicon.png">
    <title>Benang Stokel Garden Villas</title>
</head>
<body>    
    <div class="navbar navbar-expand-md navbar-dark bg-green" role="navigation" style="z-index: 1;">
        <a class="navbar-logo sm-d-none" href="#"><img src="<?php echo url('assets/front'); ?>/images/vert-logo.svg" alt=""></a>
        <a class="mob-navbar-logo sm-d-block d-none" href="#"><img src="<?php echo url('assets/front'); ?>/images/logo-horz.svg" alt=""></a>
        <button class="navbar-toggler ml-auto" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse" style="position: relative;">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a role="button" class="nav-link dropdown-toggle" id="dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="villas.html">The Villas                         
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown2" role="menu">
                        <li class="dropdown-item"><a href="#2">Aruna</a></li>
                        <li class="dropdown-item"><a href="#">Sabitha</a></li>
                        <li class="dropdown-item"><a href="#">Asasta</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#4">Special Offers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Weddings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Restaurant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Spa</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Experience                         
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown1">
                        <li class="dropdown-item" href="#"><a>What to Do</a></li>
                        <li class="dropdown-item" href="#"><a>Where to Go</a></li>                        
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <a href="#" class="nav-book-btn">
                Book<br>Now
            </a>
        </div>
    </div>

    <div class="mobile-nav">
        <div class="button_container" id="toggle">
            <span class="top"></span>
            <span class="middle"></span>
            <span class="bottom"></span>
          </div>

          <div class="overlay" id="overlay">
            <nav class="overlay-menu">
                <div class="overlay-logo">
                    <img src="<?php echo url('assets/front'); ?>/images/vert-logo.svg" alt="">
                </div>
              <ul class="ov-nav">
                <li class="ov-dropdown" id="dd"><a onclick="myFunction()" class="dropbtn">The Villas</a>
                    <ul id="myDropdown" class="dropdown-content">
                        <li><a href="#">Aruna</a></li>
                        <li><a href="#">Sabitha</a></li>
                        <li><a href="#">Asasta</a></li>
                    </ul>
                </li>
                <li><a href="#">Special Offers</a></li>
                <li><a href="#">Weddings</a></li>
                <li><a href="#">Restaurant</a></li>
                <li><a href="#">Spa</a></li>
                <li class="ov-dropdown2" id="dd2"><a onclick="myFunction2()" class="dropbtn2">Experience</a>
                    <ul id="myDropdown2" class="dropdown-content">
                        <li><a href="#">What to Do</a></li>
                        <li><a href="#">Where to Go</a></li>                        
                    </ul>
                </li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </nav>
          </div>
    </div>    

    <!-- Carrousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <?php
          $active = "active";

          foreach($data as $rows){
            ?>
            <div class="carousel-item <?php echo $active; ?>" style="background-image: url('<?php echo url('public'); ?>/GambarSlides/<?php echo $rows->image_name; ?>');">            
            <div class="carousel-caption d-md-block">                
                <p><?php echo $rows->title; ?></p>
                <h5><?php echo $rows->deskripsi; ?></h5>
              </div>
            </div>
            <?php
            $active = "";
          }
          ?>
          <!-- <div class="carousel-item active" style="background-image: url('<?php //echo url('assets/front'); ?>/images/Carousel/1.jpg');">            
            <div class="carousel-caption d-md-block">                
                <p>The ultimate shopisticate and premium</p>
                <h5>All Inclusive & Exclusive</h5>
              </div>
          </div>
          <div class="carousel-item" style="background-image: url('<?php //echo url('assets/front'); ?>/images/Carousel/2.jpg');">
            
          </div>
          <div class="carousel-item" style="background-image: url('<?php //echo url('assets/front'); ?>/images/Carousel/3.jpg');">
             -->
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <!-- welcome video -->
      <section class="p-0">          
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 bg-pale d-flex justify-content-end sm-justify-content-center sm-h-400 wow fadeInLeft" >
                    <div class="welcome-cont justify-content-center align-self-center text-center mr-lg-5">
                      <p>Welcome To</p>
                      <h5>De'Benang Stokel Garden Villas</h5>
                      <a href="#">Explore With Us</a>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 p-0 wow fadeInRight">
                      <a class="video-btn" data-toggle="modal" data-src="https://www.youtube.com/embed/A69xnP6ZEDI"  data-target="#myModal">
                      <div class="welcome-video" style="background-image: url('<?php echo url('assets/front'); ?>/images/Carousel/2.jpg');">
                        <img src="<?php echo url('assets/front'); ?>/images/play.svg" alt="">
                      </div>
                        </a>
                  </div>
              </div>          
            </div>
      </section>

      <!-- Video modal -->
      <div
        class="modal fade"
        id="myModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        >
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content bg-transparent border-0">
            <div class="modal-body">
              <button
                type="button"
                class="close alt-close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
              <!-- 16:9 aspect ratio -->
              <div class="embed-responsive embed-responsive-16by9">
                <iframe
                  class="embed-responsive-item"
                  src=""
                  id="video"
                  allowscriptaccess="always"
                  allow="autoplay" allowfullscreen
                ></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- The Villas -->
      <section class="pb-100">
        <div class="v-header wow fadeInDown">
          <h3>The Villas</h3>
        </div>
        <div class="owl-carousel hotel-carousel owl-theme wow fadeInUp">
          <div class="villa-item">
            <div class="villa-img" style="background-image: url('<?php echo url('assets/front'); ?>/images/1.png');">
            <div class="villa-name">
              <div class="vn-c">
                <h3>Aruna</h3>
                <p>One Bedroom Private Villa + Jacuzzi</p>
              </div>
              <a href="#">Details</a>
            </div>
          </div>
          </div>
          <div class="villa-item">
            <div class="villa-img" style="background-image: url('<?php echo url('assets/front'); ?>/images/bedroom.jpg');">
              <div class="villa-name">
                <div class="vn-c">
                  <h3>Sabitha</h3>
                  <p>One Bedroom Private Villa + Private Pool</p>
                </div>
                <a href="#">Details</a>
              </div>
            </div>
          </div>
          <div class="villa-item">
            <div class="villa-img" style="background-image: url('<?php echo url('assets/front'); ?>/images/Carousel/1.jpg');">
              <div class="villa-name">
                <div class="vn-c">
                  <h3>Asasta</h3>
                  <p>Two Bedroom Private Villa + Pool</p>
                </div>
                <a href="#">Details</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <!-- Special Offers -->
      <section class="bg-green pb-1">
        <div class="container">
          <h3 class="left-b-header text-white wow fadeInLeft">Special Offers</h3>
          <div class="spc-carousel owl-carousel owl-theme wow fadeInRight">
            <div class="spc-item">
              <a href="#2">
                <div class="spc-img" style="background-image: url('<?php echo url('assets/front'); ?>/images/spc1.jpg');"></div>
                <div class="spc-info">
                  <h3>Limited Time Deal</h3>
                  <p>Enjoy special price and special benefit</p>
                </div>
              </a>
            </div>
            <div class="spc-item">
              <a href="#2">
                <div class="spc-img" style="background-image: url('<?php echo url('assets/front'); ?>/images/spc2.jpeg');"></div>
                <div class="spc-info">
                  <h3>Day Pass F&B</h3>
                  <p>IDR 150.000 per person Open from 10.00 AM until 06.00 PM</p>
                </div>
              </a>
            </div>
            <div class="spc-item">
              <a href="#2">
                <div class="spc-img" style="background-image: url('<?php echo url('assets/front'); ?>/images/spc3.jpg');"></div>
                <div class="spc-info">
                  <h3>Spa & Swim</h3>
                  <p>IDR 150.000 per person Open from 10.00 AM until 06.00 PM</p>
                </div>
              </a>
            </div>
            <div class="spc-item">
              <a href="#2">
                <div class="spc-img" style="background-image: url('<?php echo url('assets/front'); ?>/images/spc4.jpg');"></div>
                <div class="spc-info">
                  <h3>Romantic Escape</h3>
                  <p>4 days / 3 nights package
                    Discover the ultimate romantic escape with your loved one</p>
                </div>
              </a>
            </div>
            <div class="spc-item">
              <a href="#2">
                <div class="spc-img" style="background-image: url('<?php echo url('assets/front'); ?>/images/spc5.jpg');"></div>
                <div class="spc-info">
                  <h3>Health and Wellness</h3>
                  <p>Start with 5 days / 4 nights, 6 days / 5 nights & 7 days / 6 nights Package including various Wellness and Healing sessions with our professional staff assistance.</p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </section>

      <!-- Hospitality -->
      <section class="bg-black">
        <div class="container">
          <div class="sub text-white wow fadeInDown">
            Discover our Hospitality
          </div>
          <h3 class="left-b-header text-white wow fadeInLeft">Complete Facilities</h3>
          <div class="hp-carousel owl-carousel owl-theme wow fadeInRight">
            <div class="hp-item">
              <div class="hp-img" style="background-image: url('<?php echo url('assets/front'); ?>/images/hp1.jpg');"></div>
              <h3>Spa</h3>
            </div>
            <div class="hp-item">
              <div class="hp-img" style="background-image: url('<?php echo url('assets/front'); ?>/images/hp3.jpg');"></div>
              <h3>Weddings</h3>
            </div>
            <div class="hp-item">
              <div class="hp-img" style="background-image: url('<?php echo url('assets/front'); ?>/images/hp2.jpg');"></div>
              <h3>Restaurant</h3>
            </div>
            <div class="hp-item">
              <div class="hp-img" style="background-image: url('<?php echo url('assets/front'); ?>/images/hp4.jpg');"></div>
              <h3>Gym</h3>
            </div>            
          </div>
        </div>
      </section>

      <!-- Footer -->
      <footer class="wow fadeInUp">
        <div class="container" style="position: relative;">
          <div class="ft-logo">
            <img src="<?php echo url('assets/front'); ?>/images/logo-horz.svg" alt="">
          </div>
          <div class="ft-address">
            Desa Aik Berik, Batu Keliang Utara, Lombok Tengah<br>Nusa Tenggara Barat.
          </div>
          <div class="ft-soc">
            <div class="copy">&copy; 2022 De’ Benang Stokel. All Rights Reserved.</div>
            <div class="socmed">Follow Us:
              <a href="#"><img src="<?php echo url('assets/front'); ?>/images/socmed/ig.svg" alt=""></a>
            </div>
          </div>
        </div>
      </footer>

    <div class="mobile-book">
        <a href="#">Book Now</a>
    </div>

    <!-- CHat button -->
    <div class="fl-chat">
      <a href="#"><img src="<?php echo url('assets/front'); ?>/images/wa.svg" alt=""> Chat with us</a>
    </div>
</body>

<script src="<?php echo url('assets/front'); ?>/js/jquery.min.js"></script>
<script src="<?php echo url('assets/front'); ?>/js/owl.carousel.js"></script>
<script src="<?php echo url('assets/front'); ?>/js/bootstrap.bundle.js"></script>
<script src="<?php echo url('assets/front'); ?>/js/wow.js"></script>
<script src="<?php echo url('assets/front'); ?>/js/custom.js"></script>
</html>