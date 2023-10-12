<?php

include_once 'admin/inc/head.php';
include("./data/guvenlik.php");

if (isset($_POST["urunekle"])  ) { 
  
  
    $urunadi = $_POST['urunadi'];// Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz
      $urunkodu = $_POST['urunkodu'];    
  $urunbarkodu = $_POST['urunbarkodu']; 
  $kdvsizalisfiyati = $_POST['kdvsizalisfiyati'];
  $kdvsizsatisfiyati = $_POST['kdvsizsatisfiyati'];
  $alisfiyati = $_POST['alisfiyati'];
  $satisfiyati = $_POST['satisfiyati'];
  $kdvorani = $_POST['kdvorani'];
  $stokgrubu = $_POST['stokgrubu'];
  $markasi = $_POST['markasi'];
  $modeli = $_POST['modeli'];
  
  $birimadi = $_POST['birimadi'];
  $uyarilimiti = $_POST['uyarilimiti'];
  $ekleyen = $_POST['ekleyen'];
  $depoadi=$_POST['depoadi'];
  
  
  
  if($urunadi == ""){ 
      echo '<script>swal("Hata","Ürün Adı Alanını Doldurun.","error");</script>';
      }
      else if($urunkodu == ""){ 
      echo '<script>swal("Hata","Ürün Kodu Alanını Doldurun.","error");</script>';
      }
  else if($urunbarkodu == ""){ 
      echo '<script>swal("Hata","Ürün Barkodu Alanını Doldurun.","error");</script>';
      }
      else if($kdvsizalisfiyati == ""){ 
      echo '<script>swal("Hata","Kdvsiz Alış Fiyatı Alanını Doldurun.","error");</script>';
      }
      else if($kdvsizsatisfiyati == ""){ 
      echo '<script>swal("Hata","Kdvsiz Satış Fiyatı Alanını Doldurun.","error");</script>';
      }
      else if($alisfiyati == ""){ 
      echo '<script>swal("Hata","Kdvli Alış Fiyatı Alanını Doldurun.","error");</script>';
      }
      else if($satisfiyati == ""){ 
      echo '<script>swal("Hata","Kdvli Satış Fiyatı Alanını Doldurun.","error");</script>';
      }
      else if($kdvorani == ""){ 
      echo '<script>swal("Hata","Kdv Oranı Alanını Doldurun.","error");</script>';
      }
      
      else if($stokgrubu == ""){ 
      echo '<script>swal("Hata","Stok Grubu Alanını Doldurun.","error");</script>';
      }
      else if($markasi == ""){ 
      echo '<script>swal("Hata","Marka Alanını Doldurun.","error");</script>';
      }
      else if($modeli == ""){ 
      echo '<script>swal("Hata","Model Alanını Doldurun.","error");</script>';
      }
      
      else if($uyarilimiti == ""){ 
      echo '<script>swal("Hata","Uyarı Limiti Alanını Doldurun.","error");</script>';
      }
      else if($birimadi == ""){ 
      echo '<script>swal("Hata","Birim Alanını Doldurun.","error");</script>';
      }
  else if($depoadi == ""){ 
    echo '<script>swal("Hata","Depo Adı Alanını Doldurun.","error");</script>';
    }
    
  else {
    if ($_FILES['resmi']) {
      $uploaddir = 'urinresim/';
      $uploadfile = $uploaddir . basename($_FILES['resmi']['name']);
      $yukle=move_uploaded_file($_FILES['resmi']['tmp_name'], $uploadfile);
    $satir = [                       
  
      'urunadi' => $urunadi,
      'urunkodu' => $urunkodu, 
  'urunbarkodu' => $urunbarkodu, 
  'kdvsizalisfiyati' => $kdvsizalisfiyati, 
  'kdvsizsatisfiyati' => $kdvsizsatisfiyati, 
  'alisfiyati' => $alisfiyati, 
  'satisfiyati' => $satisfiyati, 
  'kdvorani' => $kdvorani, 
  'stokgrubu' => $stokgrubu, 
  'markasi' => $markasi, 
  'modeli' => $modeli, 
  'resmi' => $uploadfile, 
  'uyarilimiti' => $uyarilimiti,  
  'birimadi' => $birimadi,  
  'ekleyen' => $ekleyen,  
  'depoadi' => $depoadi,
    ];
    
      $sql = "INSERT INTO urunler SET urunadi=:urunadi, urunkodu=:urunkodu, urunbarkodu=:urunbarkodu, alisfiyati=:alisfiyati, satisfiyati=:satisfiyati, kdvorani=:kdvorani, stokgrubu=:stokgrubu, markasi=:markasi, modeli=:modeli, resmi=:resmi, uyarilimiti=:uyarilimiti, kdvsizalisfiyati=:kdvsizalisfiyati, kdvsizsatisfiyati=:kdvsizsatisfiyati, birimadi=:birimadi, ekleyen=:ekleyen ,depoadi=:depoadi;";
    $durum = $baglanti->prepare($sql)->execute($satir);
  
    if ($durum) {
        echo '<script>swal({
        title:"Başarılı",
        text: "Başarıyla Kaydedildi.",
  icon:"success",
  button:"Tamam",	
        }).then((value)=>{ window.location.href = "urunler.php"});
        </script>';
       
  
    }
    
     else {
        echo '<script>swal("Hata","Hatalı , Lütfen bilgilerinizi kontrol ediniz.","error");</script>'; 
    }
  
  
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
                               <form id="Ekle" method="POST" enctype="multipart/form-data" >
                                   
                               <div class="row">


<div class="col-md-6">
    <div class="form-group">

<label class="control-label">Ürün Adı</label>
<input type="text" name="ekleyen" class="form-control" placeholder="ekleyen" readonly="readonly" value="<?= ["id"] ?>" hidden="hidden">
<input type="text" id="urunadi" class="form-control" placeholder="Ürün Adı" name="urunadi">
      </div>
</div>
<!--/span-->                                
                                  
                              <div class="col-md-6">
                                <div class="form-group">
                                
                                    <label class="control-label">Ürün Kodu</label>
                                      <input type="text" id="urunkodu" class="form-control" placeholder="Ürün Kodu" name="urunkodu" value="<?= $rastgelesayi; ?>">
                                </div>
                                </div>
                                            <!--/span-->
                                
                                <div class="col-md-6">
                                  <div class="form-group">
                                  <label class="control-label">Ürün Barkodu</label>
                                  <input type="text" id="urunbarkodu" class="form-control" placeholder="Barkod" name="urunbarkodu" value="<?= $rastgelebarkod; ?>">
                                </div>
                                </div>
                                            
                                            
                                <div class="col-md-6">
                                  <div class="form-group">
                                  <label class="control-label">KDV Oranı</label>
                                  <select class="form-control custom-select" id="kdvorani" data-placeholder="KDV Oranı Seçiniz" tabindex="1" name="kdvorani">
                                                       
                                <?php
			

						$sorguk = $baglanti->prepare('Select * from kdvler'); 
						$sorguk->execute(); 

						while($sonuck=$sorguk->fetch())
						
						{  

							?>                                               <option value="<?= $sonuck['kdvorani']?>"><?= $sonuck['kdvorani']?></option>
                   <?php
						}  

						?>
						                                                           
                                                        
                                                    </select>
                                                  </div>   
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Vergisiz Alış Fiyatı</label>
                                                    <input type="text" id="kdvsizalisfiyati" class="sayi form-control" placeholder="Vergisiz Alış Fiyatı" name="kdvsizalisfiyati">
                                                  </div>
                                            </div>
                                            <!--/span-->
                                           <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Vergisiz Satış Fiyatı</label>
                                                    <input type="text" id="kdvsizsatisfiyati" class="sayi form-control" placeholder="Vergisiz Satış Fiyatı" name="kdvsizsatisfiyati">
                                                  </div>
                                            </div>
                                            <!--/span-->
                                           
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Vergili Alış Fiyatı</label>
                                                    <input type="text" id="kdvlialisfiyati" class="sayi form-control" placeholder="Vergili Alış Fiyatı" name="alisfiyati">
                                                  </div>
                                            </div>
                                            <!--/span-->
                                           <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Vergili Satış Fiyatı</label>
                                                    <input type="text" id="kdvlisatisfiyati" class="sayi form-control" placeholder="Vergili Satış Fiyatı" name="satisfiyati">
                                                  </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Stok Grubu</label>
                                                     <select class="form-control custom-select" id="stokgrubu" data-placeholder="Stok Grubu Seçiniz" tabindex="1" name="stokgrubu">
                                                       
    <?php
			

						$sorgus = $baglanti->prepare('Select * from stokgruplar'); // Veritabanındaki Depolar tablosundaki tüm verileri çekiyoruz
						$sorgus->execute(); // Sorgumuzu çalıştırıyoruz

						while($sonucs=$sorgus->fetch()) // While Döngüsü ile Verilerimzi döndürüyoruz
						
						{  // While Başlangıcı

							?>                                               <option value="<?= $sonucs['id']?>"><?= $sonucs['stokgrupadi']?></option>
                   <?php
						}  // While Bitiş

						?>
						                                                                 
                               </select>
                                                  </div>
                                            </div>
                                            <!--/span-->                              


           <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Birimi</label>
                                                     <select class="form-control custom-select" id="birimadi" data-placeholder="Birim Seçiniz" tabindex="1" name="birimadi">
                                                       
    <?php
			

						$sorgub = $baglanti->prepare('Select * from birim'); // Veritabanındaki Depolar tablosundaki tüm verileri çekiyoruz
						$sorgub->execute(); // Sorgumuzu çalıştırıyoruz

						while($sonucb=$sorgub->fetch()) // While Döngüsü ile Verilerimzi döndürüyoruz
						
						{  // While Başlangıcı

							?>                                               <option value="<?= $sonucb['id']?>"><?= $sonucb['kisaltma']?> ---> <?= $sonucb['birimadi']?></option>
                   <?php
						}  // While Bitiş

						?>
						                                                                 
                               </select>
                                                  </div>
                                            </div>
                                            <!--/span-->                                                   
                  
                                            <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Marka</label>
            <select class="form-control custom-select" id="markalar" data-placeholder="Marka Seçiniz" tabindex="1" name="markasi">
           <option value="">Seçiniz</option>                                     
       <?php
			

						$sorgum = $baglanti->prepare('Select * from markalar'); // Veritabanındaki Depolar tablosundaki tüm verileri çekiyoruz
						$sorgum->execute(); // Sorgumuzu çalıştırıyoruz

						while($sonucm=$sorgum->fetch()) // While Döngüsü ile Verilerimzi döndürüyoruz
						
						{  // While Başlangıcı

							?>                                               <option value="<?= $sonucm['id']?>"  slug="<?= $sonucm['id']?>"><?= $sonucm['markaadi']?></option>
                   <?php
						}  // While Bitiş

						?>
						                                        
                                                    </select>
                                                  </div>
                                            </div>
                                            <!--/span-->
                                           <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Model</label>
                                                     <select class="form-control custom-select" id="modeller" data-placeholder="Model Seçiniz" tabindex="1" name="modeli">
  <option value="">Seçiniz</option>                                                  
  <?php
			

						$sorgumo = $baglanti->prepare('Select * from modeller'); // Veritabanındaki Depolar tablosundaki tüm verileri çekiyoruz
						$sorgumo->execute(); // Sorgumuzu çalıştırıyoruz

						while($sonucmo=$sorgumo->fetch()) // While Döngüsü ile Verilerimzi döndürüyoruz
						
						{  // While Başlangıcı

							?>                                               <option value="<?= $sonucmo['id']?>" marka-slug="<?= $sonucmo['markadi']?>"><?= $sonucmo['modeladi']?></option>
                   <?php
						}  // While Bitiş

						?>
						                                                                   
                                                        
                                                    </select>
                                                  </div>
                                            </div>
                                    
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label">Stok Uyarı Limiti</label>
                                                <input type="text" id="uyarilimiti" class="sayi form-control" placeholder="Stok Uyarı Limiti" name="uyarilimiti">
												</div>
   
       </div>
                                            



                                            <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Depo Adı</label>
                                                     <select class="form-control custom-select" id="depoadi" data-placeholder="Depo Adını Seçiniz" tabindex="1" name="depoadi">
  <option value="">Seçiniz</option>                                                  
  <?php
			

						$sorgude = $baglanti->prepare('Select * from depolar'); // Veritabanındaki Depolar tablosundaki tüm verileri çekiyoruz
						$sorgude->execute(); // Sorgumuzu çalıştırıyoruz

						while($sonucde=$sorgude->fetch()) // While Döngüsü ile Verilerimzi döndürüyoruz
						
						{  // While Başlangıcı

							?>                                               <option value="<?= $sonucde['id']?>" marka-slug="<?= $sonucde['depoadi']?>"> <?= $sonucde['depoadi']?></option>
                   <?php
						}  // While Bitiş

						?>
						                                                                   
                                                        
                                                    </select>
                                                  </div>
                                            </div>


                                          
                                            <div class="col-md-12">
                                            
                                            <div class="form-group">
                                
   <label class="control-label">Ürün Resmi</label>
   
  
				<input required type="file" id="resmi" class="form-control" placeholder="Ürün Resmi" name="resmi">
												</div>
   
       </div>
                                          
                                            </div>
                                            <!--/span-->
                                           
                                        </div>
                                        <input type="hidden" class="form-control" name="urunekle">
		<button name="kaydet" type="submit" class="btn btn-success btn-raised btn-block">
Kaydet</button>

                               </form>
                            </div>

                            <!-- Approach -->
                            
                        </div>
                    </div>
                </div>
                      
                <script>
$( "#kdvsizalisfiyati, #kdvsizsatisfiyati, #kdvlialisfiyati, #kdvlisatisfiyati, #kdvorani" ).change(function() {
var kdvsizalis = parseFloat($("#kdvsizalisfiyati").val());
var kdvsizsatis = parseFloat($("#kdvsizsatisfiyati").val());
var kdvlialis = parseFloat($("#kdvlialisfiyati").val());
var kdvlisatis = parseFloat($("#kdvlisatisfiyati").val());
var kdv = parseFloat($("#kdvorani").val());
var aliskdvsi = parseFloat(kdvsizalis*kdv/100);
var satiskdvsi = parseFloat(kdvsizsatis*kdv/100);
$("#kdvlialisfiyati").val(kdvsizalis+aliskdvsi);
$("#kdvlisatisfiyati").val(kdvsizsatis+satiskdvsi);
});
</script>
   <?php 
include_once 'admin/inc/footer.php';


?>