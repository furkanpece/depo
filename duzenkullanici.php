<?php

include_once 'admin/inc/head.php';
include("./data/guvenlik.php");

$sorgu=$baglanti->prepare("SELECT * FROM kullanici WHERE id=:id");
$sorgu->execute(['id'=>(int)$_GET["id"]]);
$sonuc=$sorgu->fetch();
if($_POST){
    $guncelleSorgu=$baglanti->prepare("UPDATE kullanici SET kadi =:kadi ,yetki=:yetki , email=:email ,aktif=:aktif WHERE id=:id");
    $guncelle=$guncelleSorgu->execute([
        'kadi '=>$_POST["kadi"],
        'yetki'=>$_POST["yetki"],
        'email'=>$_POST["email"],
        'aktif'=>$_POST["aktif"],
        'id'=>(int)$_GET["id"],


    ]);

    if ($guncelle) {
        echo '<script type="text/javascript">
        swal("Başarılı", "Güncellleme başarılı şekilde gercekleşti", "success");
        </script>
        ';

    }else{
        echo '<script type="text/javascript">
        swal("Başarısız", "Güncellleme başarılı şekilde gercekleştirilemedi", "error");
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
                               <form action="" method="POST">
                               <div class="row">
	<input type="hidden" class="form-control" name="id" value="<?php echo $sonuc["id"]; ?>">


                                            <div class="col-md-12">
                                                <div class="form-group">
                                
   <label class="control-label">Kullanıcı Adı</label>
 <input type="text" id="ad" class="form-control" placeholder="Kullanıcı Adı" name="kadi " value="<?= $sonuc["kadi"] ?>">
                                                  </div>
                                            </div>
                                         
                                           
                                        </div>
                                     
    <div class="row">


    <div class="col-md-12">
                                                <div class="form-group">
                                
   <label class="control-label">E-mail</label>
 <input type="text" id="ad" class="form-control" placeholder="E-mail" name="email " value="<?= $sonuc["email"] ?>">
                                                  </div>
                                            </div>
                                         
                                           
                                        </div>
                                                                                    
									      <div class="row">
                                          <div class="col-md-12">
                                                <div class="form-group">
                                
   <label class="control-label">Kullanıcı Yetkisi</label>
 <input type="text" id="ad" class="form-control" placeholder="Kullanıcı Yetki" name="yetki " value="<?= $sonuc["yetki"] ?>">
                                                  </div>
                                            </div>
                                         
                                           
                                        </div>

                                        <div class="row">
                                          <div class="col-md-12">
                                                <div class="form-group">
                                
   <label class="control-label">Aktif</label>
 <input type="text" id="ad" class="form-control" placeholder="Kullanıcı Adı" name="aktif " value="<?= $sonuc["aktif"] ?>">
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