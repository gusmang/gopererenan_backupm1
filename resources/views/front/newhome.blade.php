<html>

<head>

@include('front.global.top')

</head>

<body>

<?php

//echo "tes".Request::segment(1);
if(Request::segment(1) == "account"){
    ?>

        <div id="div-header-wrapper">

        @include('front.global.account_header')

        </div>

    <?php
}
?>

 @yield('isi_content')     

@include('front.global.footer')
  
</body>


</html>
