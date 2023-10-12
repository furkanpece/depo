<?php

include_once 'admin/inc/head.php';
include("./data/guvenlik.php");

if (isset($_POST["kullaniciduzenle"])) { 

    $id = $_POST['id'];
    
$ad = $_POST['kadi'];


$sifre = (md5($_POST['parola']));

if($ad == ""){ 
echo '<script>swal("Hata","Ad Alanını Doldurun.","error");</script>';
}


elseif($sifre == ""){ 
echo '<script>swal("Hata","Şifre Alanını Doldurun.","error");</script>';
}

else {
    $satir = [                       

'id' => $id,
'kadi' => $ad,

'parola' => $sifre,


    ];
      $sql = "UPDATE kullanici SET kadi=:kadi,parola=:parola WHERE id=:id;";
    $durum = $baglanti->prepare($sql)->execute($satir);

    if ($durum) {
        echo '<script>swal({
        title:"Başarılı",
        text: "Başarıyla Kaydedildi.",
icon:"success",
button:"Tamam",	
        }).then((value)=>{ window.location.href = "profil"});
        </script>';
       

    }
    
     else {
        echo '<script>swal("Hata","Hatalı , Lütfen bilgilerinizi kontrol ediniz.","error");</script>'; 
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
                                <h6 class="m-0 font-weight-bold text-primary"><?= $kbilgi["kadi"] ?>  Kullanıcısı Düzenle</h6>
                                </div>
                                <div class="card-body">
<form id="Duzenle" method="POST">

<div class="row">
<input type="hidden" class="form-control" name="id" value="<?= $kbilgi["id"] ?>">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Adı Soyadı</label>
 <input type="text" class="form-control" placeholder="Ad" name="kadi" value="<?= $kbilgi["kadi"] ?>">
                                                  </div>
                                            </div>

  <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Kullanıcı Şifre</label>
  <input type="text" class="form-control" placeholder="Şifre" name="parola" value="">
                                                  </div>
                                            </div>
                                            <!--/span-->

   <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Mail Adresi</label>
 <input type="text" class="form-control" placeholder="Mail Adresi" name="email" value="<?= $kbilgi["email"] ?>">
                                                  </div>
                                            </div>
                                            <!--/span-->
 
 <div class="col-md-2">
                                                <div class="form-group">
                                
   <label class="control-label">Yetki</label>
 <?php 
 if ($kbilgi["yetki"]==1) {?>
									<h4 class="user-level text-info">Patron</h4>
<?php }?>
<?php 
 if ($kbilgi["yetki"]==2) {?>
									<h4 class="user-level text-primary">Depo Sahibi</h4>
<?php }?>

                                                  </div>
                                            </div>
                                            <!--/span-->
  
  <div class="col-md-12">
                                                <div class="form-group">
                                
   <label class="control-label"></label>
 								<input type="hidden" class="form-control" name="kullaniciduzenle">
		<button type="submit" class="btn btn-success btn-raised btn-block">
Güncelle</button>
                                                  </div>
                                            </div>
                                            <!--/span-->

    
									
									
		
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