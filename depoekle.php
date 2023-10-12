<?php

include_once 'admin/inc/head.php';
include("./data/guvenlik.php");

if (isset($_POST["depoekle"])) { 

    $depoadi = $_POST['depoadi'];
    $aciklama = $_POST['aciklama'];
    $acilistarihi = $_POST['acilistarihi'];
    if($depoadi == ""){ 
	echo '<script>swal("Hata","Depo Adı Alanını Doldurun.","error");</script>';
	}
	else if($acilistarihi == ""){ 
	echo '<script>swal("Hata","Açılış Tarihi Alanını Doldurun.","error");</script>';
	}
else if($aciklama == ""){ 
	echo '<script>swal("Hata","Açıklama Alanını Doldurun.","error");</script>';
	}
	else {
        $satir = [                       
'depoadi' => $depoadi,
'aciklama' => $aciklama,
'acilistarihi' => $acilistarihi,
        ];
          $sql = "INSERT INTO depolar SET depoadi=:depoadi, aciklama=:aciklama,acilistarihi=:acilistarihi;";
        $durum = $baglanti->prepare($sql)->execute($satir);

        if ($durum) {
            echo '<script type="text/javascript">
            swal("Başarılı", "Ekleme başarılı şekilde gercekleşti", "success").then((value)=>{ window.location.href = "depolar"});
            </script>
            '
            ;
    
           

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
<form id="Duzenle" method="POST">



<div class="row">                              
        <div class="col-md-12">                       
            <div class="form-group">
                 <label class="control-label">Depo Adı</label>
                    <input type="text" name="depoadi"  id="ad" required class="form-control" placeholder="Depo Adı" name="depoadi" >
            </div>
        </div>                             
 </div>                                 
                                  
                                  
 <div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Açılış Tarihi</label>
                    <input type="text" id="tarih" required class="tarih form-control" placeholder="İşlem Tarihi" name="acilistarihi" value="<?php echo date('Y-m-d H:i'); ?>" />
             </div>
        </div>
</div>

                                    
                                    
                                    
<div class="row">
     <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Açıklama</label>
                    <textarea required class="form-control" id="aciklama" rows="3" name="aciklama"></textarea>            
            </div>
         </div>
 </div>
                    <input type="hidden" class="form-control" name="depoekle">
		            <button name="kaydet" type="submit" class="btn btn-success btn-raised btn-block">
                    EKLE</button>
    
									
									
		
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