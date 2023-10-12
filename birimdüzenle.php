<?php

include_once 'admin/inc/head.php';
include("./data/guvenlik.php");

$sorgu=$baglanti->prepare("SELECT * FROM birim WHERE id=:id");
$sorgu->execute(['id'=>(int)$_GET["id"]]);
$sonuc=$sorgu->fetch();
if($_POST){
    $guncelleSorgu=$baglanti->prepare("UPDATE birim SET birimadi=:birimadi, kisaltma=:kisaltma  WHERE id=:id");
    $guncelle=$guncelleSorgu->execute([
        'birimadi'=>$_POST["birimadi"],
        'kisaltma'=>$_POST["kisaltma"],
        'id'=>(int)$_GET["id"],


    ]);

    if ($guncelle) {
        echo '<script type="text/javascript">
        swal("Başarılı", "Güncellleme başarılı şekilde gercekleşti", "success").then((value)=>{ window.location.href = "birimler"});
        </script>
        ';
            
    }
    else{
        echo '<script type="text/javascript">
        swal("Başarısız", "Güncellleme yaparken bir sorun meydana geldi", "error");
        </script>';
    }
    
}
?>
<?php 
 if ($kbilgi["yetki"]==1 ){?>

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
                               <form action="" method="POST">
                               <div class="row">
	<input type="hidden" class="form-control" name="id" value="<?php echo $sonuc["id"]; ?>">


                                            <div class="col-md-12">
                                                <div class="form-group">
                                
   <label class="control-label">Birim Adı</label>
 <input type="text" id="ad" class="form-control" placeholder="Birim Adı" name="birimadi" value="<?= $sonuc["birimadi"] ?>">
                                                  </div>
                                            </div>
                                         
                                           
                                        </div>
                                     
    <div class="row">


                                            <div class="col-md-12">
                                                <div class="form-group">
                                
   <label class="control-label">Kısaltma</label>
 <input type="text" id="kisaltma" class="tarih form-control" placeholder="Kısaltma" name="kisaltma" value="<?= $sonuc["kisaltma"] ?>">
                                                  </div>
                                            </div>
                                       
                                           
                                        </div>
                                                                                    
									      
                                      
                                    <div class="form-group">
                                        
                                        <input type="submit" value="Güncelle" class="btn btn-primary">
                                        
                                    </div>

                               </form>
                               <?php }?>
                               <?php 
 if ($kbilgi["yetki"]==2 ) {?>
 	<h1 class="text-danger">BU SAYFAYI GÖRÜNTÜLEMEYE YETKİNİZ YOK </h1>
 <?php }?>	
                            </div>
                            </div>

                            <!-- Approach -->
                            
                        </div>
                    </div>
                </div>
           

   <?php 
include_once 'admin/inc/footer.php';


?>