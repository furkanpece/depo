<?php 
session_start();
if(!(isset($_SESSION["Oturum"]) && $_SESSION["Oturum"]=="6789")){
	header("location:profile.php");
}
include("./data/veritabani.php");

$kadi=$_SESSION["email"];
$kbilgi= $baglanti->query("select * from kullanici where email='$kadi'")->fetch();

?>
<!DOCTYPE html>
<html lang="tr">

<head>
    
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <title>Profilim</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="profile">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Paneli<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="profile">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Anasayfa</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                SAYFALAR
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>DÜZENLE</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sayfaları Düzenle:</h6>
                        <a class="collapse-item" href="adminanasayfa">Ana Sayfa</a>
                      
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Depo İşlemleri
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-dolly-flatbed"></i>
                    <span>DEPO İŞLEMLERİ</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">İşlemler:</h6>
                        <a class="collapse-item" href="depolar">
                        <i class="fas fa-cubes"></i>   
                        Depolar
                        
                                    <?php
$depo=$baglanti->prepare("SELECT count(*) AS toplam FROM depolar");
$depo->execute();
$depoyaz= $depo->fetch();
$depotoplam=$depoyaz['toplam'];
?>
								<span class="badge badge-primary"><?= $depotoplam; ?> Depo</span>
                    </a>
                        <a class="collapse-item" href="depotransfer">
                        <i class="fas fa-angle-double-right"></i>    
                        Transfer
                        <?php
$depotransfer=$baglanti->prepare("SELECT count(*) AS toplam FROM depotransfer");
$depotransfer->execute();
$depotransferyaz= $depotransfer->fetch();
$depotransfertoplam=$depotransferyaz['toplam'];
?>
								<span class="badge badge-danger"><?= $depotransfertoplam; ?> Transfer</span>
                    </a> 
                    </div>
                </div>
            </li>
            


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1"
                    aria-expanded="true" aria-controls="collapseUtilities1">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>STOK KARTLARI</span>
                </a>
                <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">İşlemler:</h6>
                        <a class="collapse-item" href="urunler">
                        <i class="fas fa-boxes"></i>    
                        Stoklar
                        <?php
$urunler=$baglanti->prepare("SELECT count(*) AS toplam FROM urunler");
$urunler->execute();
$urunyaz= $urunler->fetch();
$uruntoplam=$urunyaz['toplam'];
?>
								<span class="badge badge-success"><?= $uruntoplam; ?> Ürün</span>
                    </a>
                        <a class="collapse-item" href="urunekle">
                        <i class="fas fa-file-medical"></i>     
                        Ürün Ekle</a> 
                        <a class="collapse-item" href="kategori">
                        <i class="fas fa-cubes"></i>    
                        Kategori
                        <?php
$stokgrup=$baglanti->prepare("SELECT count(*) AS toplam FROM stokgruplar");
$stokgrup->execute();
$stokgrupyaz= $stokgrup->fetch();
$stokgruptoplam=$stokgrupyaz['toplam'];
?>
								<span class="badge badge-primary"><?= $stokgruptoplam; ?> Grup</span>
                    </a> 
                        <a class="collapse-item" href="birimler">
                        <i class="fas fa-balance-scale"></i>    
                        Birimler
                        <?php
$birim=$baglanti->prepare("SELECT count(*) AS toplam FROM birim");
$birim->execute();
$birimyaz= $birim->fetch();
$birimtoplam=$birimyaz['toplam'];
?>
								<span class="badge badge-info"><?= $birimtoplam; ?> Birim</span>
                    </a> 
                        <a class="collapse-item" href="markalar">
                        <i class="fas fa-dove"></i>    
                        Markalar
                        <?php
$marka=$baglanti->prepare("SELECT count(*) AS toplam FROM markalar");
$marka->execute();
$markayaz= $marka->fetch();
$markatoplam=$markayaz['toplam'];
?>
								<span class="badge badge-secondary"><?= $markatoplam; ?> Marka</span>
                    </a> 
                        <a class="collapse-item" href="modeller">
                        <i class="fas fa-info-circle"></i>    
                        Modeller
                        <?php
$model=$baglanti->prepare("SELECT count(*) AS toplam FROM modeller");
$model->execute();
$modelyaz= $model->fetch();
$modeltoplam=$modelyaz['toplam'];
?>
								<span class="badge badge-warning"><?= $modeltoplam; ?> Model</span>
                    </a> 
                        <a class="collapse-item" href="kdv">
                        <i class="fas fa-percent"></i>     
                        KDV
                        <?php
$kdv=$baglanti->prepare("SELECT count(*) AS toplam FROM kdvler");
$kdv->execute();
$kdvyaz= $kdv->fetch();
$kdvtoplam=$kdvyaz['toplam'];
?>
								<span class="badge badge-danger"><?= $kdvtoplam; ?> Kdv</span>
                    </a> 
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                KULLANICI İŞLEMLERİ
            </div>


            
            <?php if($_SESSION["yetki"]=="1"){

?>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="kullanici">
                    <i class="fas fa-users"></i>
                    <span>KULLANICILAR

                    <?php
$personeller=$baglanti->prepare("SELECT count(*) AS toplam FROM kullanici");
$personeller->execute();
$personelyaz= $personeller->fetch();
$personeltoplam=$personelyaz['toplam'];
?>
								<span class="badge badge-primary"><?= $personeltoplam;
  ?></span>
                                
                    </span></a>
            </li>
            <?php 
}
?>
          

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">    <?php
$personeller1=$baglanti->prepare("SELECT count(*) AS toplam FROM mesajlar");
$personeller1->execute();
$personelyaz1= $personeller1->fetch();
$personeltoplam1=$personelyaz1['toplam'];
?>
								<span class="badge badge-primary"><?= $personeltoplam1;
  ?></span></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Mesajlarım
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                
                                <a class="dropdown-item text-center small text-gray-500" href="mesaj">Mesaj Gönder</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $kbilgi['kadi']?></span>
                                <img class="img-profile rounded-circle"
                                    src="admin/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profil">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profilim
                                </a>
                                <a class="dropdown-item" href="aprofildüzenle.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profilimi Düzenle
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->