<?php

include_once 'admin/inc/head.php';
include("./data/guvenlik.php");

if($kbilgi["yetki"]!="1"){
    echo '<script type="text/javascrit" src="admin/js/sweetalert2.all.min.js"></script>';
        echo "<script> $wal.fire( {title:'Hata!', text:'Yetkisiz Kullanıcı' , icon:'error' , confirmButtonText:'Kapat'}).then((value)=>{
            if(value.isConfirmed){window.location.href='adminanasayfa'}})
        </script>";
        exit;
}
if (isset($_POST["kategoriekle"])) { 

    $kategoriadi = $_POST['kdvorani'];
  
    if($kategoriadi == ""){ 
	echo '<script>swal("Hata","Kategori Adı Alanını Doldurun.","error");</script>';
	}
	
	else {
        $satir = [                       
'kdvorani' => $kategoriadi,

        ];
          $sql = "INSERT INTO kdvler SET kdvorani=:kdvorani";
        $durum = $baglanti->prepare($sql)->execute($satir);

        if ($durum) {
            echo '<script type="text/javascript">
        swal("Başarılı", "Ekleme başarılı şekilde gercekleşti", "success").then((value)=>{ window.location.href = "kdv"});
        </script>
        ';
    
           

        }
        
         else {
            echo '<script type="text/javascript">
        swal("Başarısız", "Ekleme başarılı şekilde gercekleştirilemedi", "error");
        </script>
        ';
        }
    }
  
}

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
                                <h6 class="m-0 font-weight-bold text-primary"><?= $kbilgi["kadi"] ?>  Kullanıcısı DEPO EKLEME</h6>
                                </div>
                                <div class="card-body">
                               <form action="eklekdv.php" method="POST">
                                   
 <div class="row">                              
        <div class="col-md-12">                       
            <div class="form-group">
                 <label class="control-label">KDV Oranı Adı</label>
                    <input type="text" name="kdvorani"  id="ad" required class="form-control" placeholder="KDV Oranı"  >
            </div>
        </div>                             
 </div>                                 
                                  
                                  


                    <input type="hidden" class="form-control" name="kategoriekle">
		            <button name="kaydet" type="submit" class="btn btn-success btn-raised btn-block">
                    Kaydet</button>

                               </form>
                               
                            </div>
                            </div>

                            <!-- Approach -->
                            
                        </div>
                    </div>
                </div>
           

   <?php 
include_once 'admin/inc/footer.php';


?>