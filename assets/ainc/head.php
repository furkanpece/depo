<?php 
include("./data/veritabani.php");
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $sayfa ?></title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="./assets/css/styles.css" rel="stylesheet" />
    </head>
    
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top <?php if($sayfa<>"Ana Sayfa") echo"bg-dark" ?>" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger"  href="anasayfa"><img width="110" height="500" src="./assets/images/logo.png"  alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger <?php if($sayfa=="Ana Sayfa") echo "active" ?>" href="anasayfa">Anasayfa</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger <?php if($sayfa=="Ürünler") echo "active" ?>" href="urun">Ürünler</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger <?php if($sayfa=="Üye Giriş") echo "active" ?>" href="giris">Üye Giriş</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger <?php if($sayfa=="Üye Ol") echo "active" ?>" href="kayit">Üye Ol</a></li>   
                        
                    </ul>
                </div>
            </div>
        </nav>