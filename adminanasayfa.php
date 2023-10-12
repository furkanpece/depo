<?php

include_once 'admin/inc/head.php';
include("./data/guvenlik.php");
$sorgu=$baglanti->prepare("SELECT * FROM anasayfa");
$sorgu->execute();
$sonuc=$sorgu->fetch();
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                        
                    </div>

                            <div class="row">
                            

                        <div class="container-fluid">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><?= $kbilgi["kadi"] ?>  Kullanıcısı Anasayfa Verilerini Güncelle</h6>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                            <tr>
                                                <th>Üst Başlık</th>
                                                <th>altbaslik</th>
                                                <th>altbaslik2</th>
                                                <th>altbaslik3</th>
                                                <th>altbaslik4</th>
                                                <th>altbaslik5</th>
                                                <th>altbaslik6</th>
                                                <th>altbaslik7</th>
                                                <th>linkmetin</th>
                                                <th>link</th>
                                                <th>İşlem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?=$sonuc["üstbaslik"]?></td>
                                                <td><?=$sonuc["altbaslik"]?></td>
                                                <td><?=$sonuc["altbaslik2"]?></td>
                                                <td><?=$sonuc["altbaslik3"]?></td>
                                                <td><?=$sonuc["altbaslik4"]?></td>
                                                <td><?=$sonuc["altbaslik5"]?></td>
                                                <td><?=$sonuc["altbaslik6"]?></td>
                                                <td><?=$sonuc["altbaslik7"]?></td>
                                                <td><?=$sonuc["linkmetin"]?></td>
                                                <td><?=$sonuc["link"]?></td>
                                                <td class="text-center">
                                                    <?php if($_SESSION["yetki"]=="1"){

                                                    ?>
                                                <a href="güncelle?id=<?=$sonuc["id"]?>">
                                                    <span class="fa fa-edit fa-2x"></span>
                                                </a>
                                            <?php
                                                    }
                                            ?>
                                            
                                            </td>
                                                
                                            </tr>
                                        </tbody>
                                        
                                        
                                        </div>
                                    </table>
                                </div>
                            </div>

                            <!-- Approach -->
                            
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script type="text/javascript">
    function sil(id){
       // alert(id);
Swal.fire({
  title: 'Emin misiniz? ',
  text: "Silmek istediğinize emin misiniz?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Evet',
  cancelButtonText: 'İptal',
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href='islem/deposil.php?id='+id;
  }
})
}
        </script>
   <?php 
include_once 'admin/inc/footer.php';


?>