<?php

include_once 'admin/inc/head.php';
include("./data/guvenlik.php");

$sorgu=$baglanti->prepare("SELECT * FROM depolar WHERE id=:id");
$sorgu->execute(['id'=>(int)$_GET["id"]]);
$sonuc=$sorgu->fetch();
if($_POST){
    $guncelleSorgu=$baglanti->prepare("UPDATE depolar SET depoadi=:depoadi, acilistarihi=:acilistarihi ,aciklama=:aciklama  WHERE id=:id");
    $guncelle=$guncelleSorgu->execute([
        'depoadi'=>$_POST["depoadi"],
        'acilistarihi'=>$_POST["acilistarihi"],
        'aciklama'=>$_POST["aciklama"],
        'id'=>(int)$_GET["id"],


    ]);

    if ($guncelle) {
        echo '<script type="text/javascript">
        swal("Başarılı", "Düzenleme başarılı şekilde gercekleşti", "success").then((value)=>{ window.location.href = "depolar"});
        </script>
        ';

    }else{
        echo '<script type="text/javascript">
        swal("Başarısız", "Düzenleme başarılı şekilde gercekleştirilemedi", "error");
        </script>
        ';
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
	<input type="hidden" class="form-control" name="id" value="<?php echo $sonuc["id"]; ?>">


                                            <div class="col-md-12">
                                                <div class="form-group">
                                
   <label class="control-label">Depo Adı</label>
 <input type="text" id="ad" class="form-control" placeholder="Depo Adı" name="depoadi" value="<?= $sonuc["depoadi"] ?>">
                                                  </div>
                                            </div>
                                         
                                           
                                        </div>
                                     
    <div class="row">


                                            <div class="col-md-12">
                                                <div class="form-group">
                                
   <label class="control-label">Açılış Tarihi</label>
 <input type="text" id="tarih" class="tarih form-control" placeholder="İşlem Tarihi" name="acilistarihi" value="<?= $sonuc["acilistarihi"] ?>">
                                                  </div>
                                            </div>
                                       
                                           
                                        </div>
                                                                                    
									      <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                
   <label class="control-label">Açıklama</label>
                                        <textarea class="form-control" id="aciklama" rows="3" name="aciklama" value="<?= $sonuc["aciklama"] ?>">

												</textarea>            
                                                  </div>
                                            </div>
                                           
                                           
                                        </div>
                                      
                                    <div class="form-group">
                                        <input type="submit" value="Güncelle" class="btn btn-primary">
                                    </div>		
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