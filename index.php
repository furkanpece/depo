<?php 
$sayfa="Ana Sayfa";
include("./data/veritabani.php");
include("./assets/ainc/head.php");

$sorgu=$baglanti->prepare("SELECT * FROM anasayfa");
$sorgu->execute();
$sonuc=$sorgu->fetch();
?>
<style>
#baslik {
    font-weight: 700;
    box-sizing: border-box;
    font-size: 36px;
    color: #3c3c3b;
    letter-spacing: -1px;
   
    font-family: "Roboto",Arial,sans-serif;
   }
   #yazi1 {
    margin-bottom: 20px;
    font-weight: 300;
    line-height: 1.4;
    font-size: 21px;

   }
   #baslik2 {
    font-weight: 700;
    color: #f47836;
    font-family: "Roboto",Arial,sans-serif;
    box-sizing: border-box;
    cursor: pointer;
    line-height: 1.3em !important;
    font-size: 30px;
   }

   #yazi2 {
    color: #666;
    margin: 0 0 20px;
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    box-sizing: border-box;
   }
   #arkaplan {
    background-color: #666;
   }
   html section.section-dark {
    background-color: #616174 !important;
    border-color: #616174 !important;
}
section.section-img2 {
    background-image: url(https://cdn.satin-alma.com/public/website/template3/css/images/bg_1440x676_transparan.webp);
    background-position: left top;
    background-repeat: no-repeat;
    background-size: cover;
    min-height: 480px;
}
section.section {
    background: #f4f4f4;
    border-top: 5px solid #f1f1f1;
    margin: 30px 0;
    padding: 50px 0;
}
.pb-none {
    padding-bottom: 0 !important;
}
.container {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
.pb-xlg {
    padding-bottom: 30px !important;
}
.pt-xlg {
    padding-top: 30px !important;
}
.row {
    margin-right: -15px;
    margin-left: -15px;
}

.col-sm-6 {
    width: 50%;
}

.col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
    float: left;
}
.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.feature-box {
    clear: both;
}
.mb-xl {
    margin-bottom: 50px !important;
}
div {
    display: block;
}
.feature-box.feature-box-style-2 .feature-box-info {
    padding-left: 60px;
}
.feature-box.feature-box-style-2 .feature-box-icon {
    background: transparent;
    width: 50px;
    height: 50px;
}
.feature-box .feature-box-icon {
    background: #CCC;
    border-radius: 35px;
    color: #FFF;
    display: inline-block;
    
    height: 35px;
    line-height: 35px;
    margin-right: 10px;
    position: relative;
    text-align: center;
    top: 5px;
    width: 35px;
}
.feature-box.feature-box-style-2 .feature-box-icon i.fa, .feature-box.feature-box-style-2 .feature-box-icon .icons {
    color: #f47836;
}
.feature-box.feature-box-style-2 .feature-box-icon i.fa, .feature-box.feature-box-style-2 .feature-box-icon i.icons {
    font-size: 28px;
}
.fa, .fas {
    font-weight: 900;
}
.fa, .far, .fas {
    font-family: "Font Awesome 5 Free";
}
.fa, .fab, .fad, .fal, .far, .fas {
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    line-height: 1;
}
.feature-box-info p {
    text-align: justify;
    font-size: 16px !important;
}

.mb-lg {
    margin-bottom: 40px !important;
}
p {
    color: #666;
    line-height: 24px;
    margin: 0 0 20px;
}


   </style>

        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading"><?= $sonuc["üstbaslik"] ?></div>
                <div class="masthead-heading text-uppercase"><?= $sonuc["altbaslik"] ?></div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="<?= $sonuc["link"] ?>"><?= $sonuc["linkmetin"] ?></a>
            </div>
        </header>
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
            
            
            <div class="row">
            <div class="mt-4 " >
                <div id="baslik">
                        <strong><?= $sonuc["altbaslik3"] ?></strong>
</div>
                    </div>
                    <div class="mt-4 " >
                        <div id="yazi1">
                    <p> YoneTeam SatınAlma Yazılımının Depo Yönetim Sistemi, SatınAlma süreci sonrasındaki işlemlerinizinin dijitalleşmesi yolundaki ilk adımınızdır. Tüm projelerinizdeki depoları tek ekrandan ilişkilendirin,kontrol edin, hakimiyet sizde olsun.
                    
                    Teslim alınan malzeme/ürünler tanımladığınız depolara girişi yapılarak, SatınAlma sürecinizi takip eden diğer evreler için otomasyonu başlatın
                </p>
                </div>
                    </div>
            </div>
            <div class="row">
                

                    <div class="col-md-5 col-sm-5 my-3">
                        <img  class="img-fluid d-block mx-auto" src="./assets/images/anasayfa/transfer.PNG"  alt="" />
                    </div>
                   
                    <div class="col-md-6 col-sm-6 my-3">
                    <div id="baslik2">
                    <strong><?= $sonuc["altbaslik5"] ?></strong>
                    </div>
                    <div id="yazi2">
                    <p><?= $sonuc["altbaslik2"] ?></p>   
                    </div>
                    </div>

                    </div>

                    <div class="row">
                    <div class="col-md-6 col-sm-6 my-3">
                    <div id="baslik2">
                    <p><?= $sonuc["altbaslik6"] ?></p>
                    </div>
                    <div id="yazi2">
                    <p>Deponuzda meydana gelen malzeme giriş ve çıkışlarını tek bir tablo üzerinden inceleyebilir, depolarınızdaki hareketlilik durumunu anlık kontrol edebilirsiniz
                        
                        Depodaki malzeme nereye, kim tarafından çıkışı yapılmış, hangi malzeme hangi irsaliye ile depoya girmiş gibi sorulara tek tık ile cevap bulabilir depolama ve iş gücü maliyetinizi %15 oranında düşürebilirsiniz.
</p>   
                    </div>
                    </div>
                    

                    <div class="col-md-5 col-sm-7 my-3">
                        <img class="img-fluid d-block mx-auto" src="./assets/images/anasayfa/model ekle.PNG" alt="" />
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-5 col-sm-7 my-3">
                        <img class="img-fluid d-block mx-auto"  src="./assets/images/anasayfa/ürünekle.png" alt="" />
                    </div>
                   
                    <div class="col-md-6 col-sm-6 my-3">
                    <div id="baslik2">
                    <p><?= $sonuc["altbaslik7"] ?></p>
                    </div>
                    <div id="yazi2">
                    <p><?= $sonuc["altbaslik2"] ?></p>   
                    </div>
                    </div>
                    </div>
                    
            </div>
            <div class="row">
                <div id="arkaplan"></div>
                <section style="padding-top: 30px; padding-bottom: 30px;">
</section>
            <div class="row pt-xlg pb-xlg ">
<div class="col-md-4 col-sm-6">
<div class="feature-box feature-box-style-2 reverse mb-xl">
<div class="feature-box-icon"><i class="fa fa-mobile" aria-hidden="true"></i></div>

<div class="feature-box-info">
<h4 class="mb-sm">Her Cihazdan Erişin</h4>

<p class="mb-lg">Web tabanlı yapısı sayesinde ister cep, ister tablet, ister akıllı tv, her yerden erişim.</p>
</div>
</div>

<div class="feature-box feature-box-style-2 reverse mb-xl">
<div class="feature-box-icon"><i class="fa fa-shield text-muted" aria-hidden="true"></i></div>

<div class="feature-box-info">
<h4 class="mb-sm">Verileriniz Güvende</h4>

<p class="mb-lg">Günlük yedekleme ve amazon veritabanı servislerinde tüm verileriniz güvende.</p>
</div>
</div>

<div class="feature-box feature-box-style-2 reverse mb-xl">
<div class="feature-box-icon"><i class="fa fa-globe" aria-hidden="true"></i></div>

<div class="feature-box-info">
<h4 class="mb-sm">Sınırlardan Kurtulun</h4>

<p class="mb-lg">Tüm ekibiniz dünyanın neresinde olurlarsa olsunlar aynı ekranda çalışabilir.</p>
</div>
</div>
</div>

<div class="col-md-4 col-sm-6 hidden-sm"><img alt="" border="0" loading="lazy" src="assets/images/anasayfa/talep_5cab673874424.png"></div>

<div class="col-md-4 col-sm-6">
<div class="feature-box feature-box-style-2 mb-xl">
<div class="feature-box-icon"><i class="fa fa-heart text-muted" aria-hidden="true"></i></div>

<div class="feature-box-info">
<h4 class="mb-sm">Muhteşem Destek</h4>

<p class="mb-lg">Müşteri başarısı en önemli kriterimiz ve başarımızın sırrı. Her adımda yanınızdayız.</p>
</div>
</div>

<div class="feature-box feature-box-style-2 mb-xl">
<div class="feature-box-icon"><i class="fa fa-map-signs" aria-hidden="true"></i></div>

<div class="feature-box-info">
<h4 class="mb-sm">İster Satılık İster Kiralık</h4>

<p class="mb-lg">Kiralık Bulut ve Satılık On-Premise seçenekleri ile önce kiralayıp sonra satın alabilirsiniz.</p>
</div>
</div>

<div class="feature-box feature-box-style-2 mb-xl">
<div class="feature-box-icon"><i class="fa fa-sitemap text-muted" aria-hidden="true"></i></div>

<div class="feature-box-info">
<h4 class="mb-sm">Gelişmiş Yetkilendirme</h4>

<p class="mb-lg">Kullanıcı grupları, proje ve şirket bazında herkes sadece kendi ekranlarına sahip olur.</p>
</div>
</div>
</div>
</div>
</div>
<section class="section section-dark pb-none mb-none mt-none section-img2">
<div class="container">
<div class="row">
<div class="col-md-offset-1 col-md-10 center mt-xlg mb-xlg">
<h1>Fiyat Veritabanı Oluşturun, Pahalı SatınAlmalara Son Verin</h1>

<p class="featured">Tüm malzeme ve hizmetlerinizin fiyatlarını detaylı olarak takip ederek, uyarı mekanizmaları ile pahalı satınalmaları engelleyebilirsiniz.</p>
</div>

<div class="col-md-offset-1 col-md-10 center"><img alt="" border="0" class="largeImageFrame"  src="//cdn.satin-alma.com/public/website/images/image/malzeme-yonetimi-buyuk-resim_925x383_615f0958b6aba.png" width="925px"></div>
</div>
</div>
</section>



            </div>
        </div>
       <?php
        include("./assets/ainc/footer.php");
       ?>