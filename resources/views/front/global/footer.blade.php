<br clear="all" />

<?php
$seg  = Request::segment(1);

$dis = "";

if($seg == "form-sumbangan"){
  $dis = "display:none;";
}

if($seg == "" || $seg == "blog" || $seg == "account" || $seg == "mari-menyumbang" || $seg == "privacy-policy"){

?>

<footer style="border-top:1px solid #eeeeee; color:#7f7f7f; padding:20px; <?php echo $dis; ?>" id="footers-new">
        <!-- <h5> Ramadhan, Waktunya Cari Berkah! </h5> <p></p>
    
         Maksimalkan ibadah di bulan suci dengan berdonasi mulai Rp1.000 ke galang dana yang paling dekat di hati. -->

    <!-- <p>&nbsp;</p> -->

    <div class="col-md-12" style="font-size:13px;">

        <div class="col-md-12">

            <div class="row">
                <div class="col-md-4 col-4" style="border-right:1px solid #DDD;">
                    <a href="<?php echo url('about-us'); ?>"> About Us </a>
                </div>
                <div class="col-md-4 col-4" style="border-right:1px solid #DDD;">
                    <a href="<?php echo url('privacy-policy'); ?>"> Privacy & Policy </a>
                </div>
                <div class="col-md-4 col-4">
                    <a href="<?php echo url('help-center'); ?>"> Help Center </a>
                </div>
            </div>

        </div>

        <div class="col-md-12" style="margin-top:40px;">

            <div class="row col-md-12 justify-content-center" >
                <div class="col-md-3 col-3 text-center" style="font-size:24px; text-align:center;">
                    <!-- <div class="col-md-6" style="border-radius:50%; height:30px; background:#DDD; text-align:center;"> -->
                        <a href="#" class="facebook"> <i class="bi bi-facebook"></i> </a>
                    <!-- </div> -->
                </div>
                <div class="col-md-3 col-3 text-center"  style="font-size:24px; text-align:center;">
                    <!-- <div class="col-md-6" style="border-radius:50%; background:#DDD; text-align:center;"> -->
                    <a href="#" class="instagram"> <i class="bi bi-instagram"></i> </a>
                    <!-- </div> -->
                </div>
                <div class="col-md-3 col-3 text-center"  style="font-size:24px; text-align:center;">
                    <!-- <div class="col-md-6" style="border-radius:50%; background:#DDD; text-align:center;"> -->
                    <!-- <a href="#" class="whatsapp">   
                         -->
                    <!-- </div> -->
                    <a href="https://api.whatsapp.com/send?phone=<?php echo $general->no_wa; ?>&text=<?php echo rawurlencode('Hello Admin , I want to ask'); ?>" target="_blank" class="whatsapp">  <i class="bi bi-whatsapp"></i> </a>
                </div>
                <div class="col-md-3 col-3 text-center"  style="font-size:24px; text-align:center;">
                    <!-- <div class="col-md-6" style="border-radius:50%; background:#DDD; text-align:center;"> -->
                    <a href="#" class="youtube">    <i class="bi bi-youtube"></i> </a>
                    <!-- </div> -->
                </div>
            </div>

        </div>
        
    </div>
    
    <p>&nbsp;</p>
    <hr />

    Copyright  &copy; Desa Adat Pererenan

    </footer>

<?php
}
?>

<p>&nbsp;</p>

        <div id="nav_bottom">
            <ul>
                <li class="nav-items"> <a href="<?php echo url('/'); ?>"> <i class="bi bi-house"></i> <br />  Home </a> </li>

                <?php
                if(Session::get("id_usaha") == ""){
                ?>
                    <li class="nav-items"> <a href="<?php echo url('account/punia-tamiu'); ?>"> <i class="bi bi-envelope-heart"></i> <br /> Punia </a> </li>
                <?php
                }
                else{
                ?>
                    <li class="nav-items"> <a href="<?php echo url('account/tenaga-kerja'); ?>"> <i class="bi bi-person"></i> <br /> Employee </a> </li>
                <?php
                }
                ?>
                
                <li class="nav-items"> <a href="<?php echo url('blog/list'); ?>"> <i class="bi bi-book"></i> </br />  Blog </a> </li>
                <li class="nav-items"> <a href="<?php echo url('mari-menyumbang'); ?>"> <i class="bi bi-heart"></i> </br />  Donasi </a> </li>
                <?php
                if(Session::get("id_usaha") == ""){
                ?>
                <li class="nav-items"> <a href="<?php echo url('/account-login'); ?>"> <i class="bi bi-person"></i> </br />  Login </a> </li>
                <?php
                }
                else{
                ?>
                    <li class="nav-items"> <a href="<?php echo url('account/logout-users'); ?>"> <i class="bi bi-door-closed"></i> </br />  Logout </a> </li>
                <?php
                }
                ?>
            </ul>
        </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   -->
<script type="text/javascript" src="<?php echo url('assets/pererenan'); ?>/mdb/js/mdb.min.js"></script>
<script src="<?php echo url('assets/pererenan'); ?>/js/moment.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.js" integrity="sha512-rozBdNtS7jw9BlC76YF1FQGjz17qQ0J/Vu9ZCFIW374sEy4EZRbRcUZa2RU/MZ90X2mnLU56F75VfdToGV0RiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
<script type="text/javascript">
    const bulan = ["Jan" , "Feb" , "Mar" , "Apr" , "May" , "Jun" , "Jul" , "Aug" , "Sep" , "Oct" , 'Nov' , "Des"];

    function format_tanggal(date){
        const date_ex = date.split("-");

        const bulan_ex = bulan[(parseInt(date_ex[1]) - 1)];

        return bulan_ex + "&nbsp;,&nbsp;" + date_ex[2] + " " + date_ex[0];

    }

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>

<script type="text/javascript">
    var cTime = moment().format();
    //alert(cTime);
</script>

@yield ('footer_scripts')