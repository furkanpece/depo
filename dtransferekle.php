<?php

include_once 'admin/inc/head.php';
include("./data/guvenlik.php");

if (isset($_POST["transferekle"])) { 

    $urun = $_POST['urun'];
    $islemtarihi = $_POST['islemtarihi'];
    $cikandepo= $_POST['cikandepo'];
    $girendepo= $_POST['girendepo'];
    $miktar = $_POST['miktar'];
    if($urun == ""){ 
	echo '<script>swal("Hata","Transfer Yapılacak Ürün Alanını Doldurun.","error");</script>';
	}
	else if($islemtarihi == ""){ 
	echo '<script>swal("Hata","İşlem Tarihi Alanını Doldurun.","error");</script>';
	}
else if($cikandepo == ""){ 
	echo '<script>swal("Hata","Çıkış Yapılacak Depo Alanını Doldurun.","error");</script>';
	}
	else if($girendepo == ""){ 
	echo '<script>swal("Hata","Giriş Yapılacak Depo Alanını Doldurun.","error");</script>';
	}
	else if($miktar == ""){ 
	echo '<script>swal("Hata","Miktar Alanını Doldurun.","error");</script>';
	}
	else {
        $satir = [                       
'urun' => $urun,
'islemtarihi' => $islemtarihi,
'girendepo' => $girendepo,
'cikandepo' => $cikandepo,
'miktar' => $miktar,
        ];
          $sql = "INSERT INTO depotransfer SET urun=:urun, girendepo=:girendepo, cikandepo=:cikandepo, islemtarihi=:islemtarihi, miktar=:miktar;";
        $durum = $baglanti->prepare($sql)->execute($satir);

        if ($durum) {
            echo '<script>swal({
            title:"Başarılı",
            text: "Başarıyla Kaydedildi.",
icon:"success",
button:"Tamam",	
            }).then((value)=>{ window.location.href = "depotransfer"});
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
                                <h6 class="m-0 font-weight-bold text-primary"><?= $kbilgi["kadi"] ?>  Kullanıcısı DEPO EKLEME</h6>
                                </div>
                                <div class="card-body">
<form id="Duzenle" method="POST">
<div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group">
                                
   <label class="control-label">Transfer Yapılacak Ürün</label>
   
   <div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text card-success" id="username-addon"  data-toggle="modal"
                    data-backdrop="false" data-target="#urunsecicipencere">Ürün Seç</span>
													</div>
<input type="text"  id="urunid" hidden="hidden" name="urun">

<input type="text" class="form-control" placeholder="Transfer Yapılacak Ürün" aria-label="Transfer Yapılacak Ürün" aria-describedby="username-addon" id="urunadi">
												</div>
   
       </div>
                                            </div>
                                             <!--/span-->
                                           
                                           
                                        <div class="col-md-12">
                                                <div class="form-group">
                                
   <label class="control-label">İşlem Tarihi</label>
                                                    <input type="text" id="tarih" name="islemtarihi" class="tarih form-control" placeholder="İşlem Tarihi" value="<?php echo date('Y-m-d H:i'); ?>" />
                                                  </div>
                                            </div>
                                            <!--/span-->   
                                           
                               
                  <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
								 <div class="form-group">
                   
   <label class="control-label text-danger">Çıkış Yapılacak Depo</label>
                                                  
<select class="form-control custom-select text-danger" name="cikandepo" data-placeholder="Depo Seçiniz" tabindex="1">
                                     <?php
			

						$sorgud = $baglanti->prepare('Select * from Depolar'); // Veritabanındaki Depolar tablosundaki tüm verileri çekiyoruz
						$sorgud->execute(); // Sorgumuzu çalıştırıyoruz

						while($sonucd=$sorgud->fetch()) // While Döngüsü ile Verilerimzi döndürüyoruz
						
						{  // While Başlangıcı

							?>                                               <option value="<?= $sonucd['id']?>"><?= $sonucd['depoadi']?></option>
                   <?php
						}  // While Bitiş

						?>
						                                        
                                                    </select>
                                                        
                                                    </select>
                                                  </div>

									</div>
									<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
								 <div class="form-group">
                 
   <label class="control-label text-success">Giriş Yapılacak Depo</label>
                                                  
<select class="form-control custom-select text-success" name="girendepo" data-placeholder="Depo Seçiniz" tabindex="1">
                                     <?php
			

						$sorgud = $baglanti->prepare('Select * from Depolar'); // Veritabanındaki Depolar tablosundaki tüm verileri çekiyoruz
						$sorgud->execute(); // Sorgumuzu çalıştırıyoruz

						while($sonucd=$sorgud->fetch()) // While Döngüsü ile Verilerimzi döndürüyoruz
						
						{  // While Başlangıcı

							?>                                               <option value="<?= $sonucd['id']?>"><?= $sonucd['depoadi']?></option>
                   <?php
						}  // While Bitiş

						?>
						                                        
                                                    </select>
                                                        
                                                    </select>
                                                  </div>

									</div>
									
                     <div class="col-md-12">
                                                <div class="form-group">
                                
   <label class="control-label">Transfer Miktarı</label>
 <input type="text" class="sayi form-control" placeholder="Transfer Miktarı" name="miktar">
                                                  </div>
                                            </div>
                                            <!--/span-->
                  
                  
                  
				         </div>  
                         <input type="hidden" class="form-control" name="transferekle">
		<button name="kaydet" type="submit" class="btn btn-success btn-raised btn-block">
Kaydet</button>
</form>
									
									
					</div>
                            </div>

                            <div class="modal fade bd-example-modal-lg" id="urunsecicipencere" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
                      <div class="modal-content bg-<?= $tema['arkaplan']?>">
                        <div class="modal-header bg-<?= $tema['tablorenk']?>">
                          <h4 class="modal-title" id="myModalLabel8">Ürün Seçici</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">X</span>
                          </button>
                        </div>
                        <div class="modal-body table-responsive">
              <table class="tablo2 table table-head-bg-<?= $tema['tablorenk']?> table-hover table-responsive mt-3">
                                                        <thead>
                                                            <tr>
 <th hidden="hidden">id</th>  
   <th>Ürün Resmi</th>                                               
                    <th>Ürün Kodu</th>
 <th>Ürün Adı</th>
<th>Model</th>
<th>Marka</th>
 <th>Kdvsiz Satış Fiyatı</th>
 <th>Kdv Oran</th>
 <th>Kdvli Satış Fiyatı</th>

                    
                
  </tr>
</thead>
        <tbody id="Kisilistesi">       
<?php
			

						$sorgu = $baglanti->prepare('Select * from Urunler'); // Veritabanındaki Depolar tablosundaki tüm verileri çekiyoruz
						$sorgu->execute(); // Sorgumuzu çalıştırıyoruz

						while($sonuc=$sorgu->fetch()) // While Döngüsü ile Verilerimzi döndürüyoruz
						
						{  // While Başlangıcı

							?>
 
<tr id="secilen" class="urunsecilen">
<td class="urunid"  hidden="hidden"><?= $sonuc['id']?></td>
<td><img class="g100" width="100" height="150" src="<?= $sonuc['resmi']?>" alt="image profile"></td>
   <td class="urunkodu"><?= $sonuc['urunkodu']?></td>
                    <td class="urunadi"><?= $sonuc['urunadi']?></td>
 <td class="model">
 <?php 
                                                      $model = $baglanti->query("SELECT * FROM Modeller where id=".$sonuc["modeli"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
                                                if(count($model)>0){


                                                ?>
                                                
                                                
                                           
                                                    <?php
    
                                                        foreach($model as $modeli){
                                                            ?>
                                                    
                                                     <?php echo $modeli['modeladi']; ?>
                                                    <?php


                                                        }
                                                            
                                                    
                                                    ?>
       <?php } ?>
</td>       
 <td class="marka">
<?php $marka = $baglanti->query("SELECT * FROM Markalar where id=".$sonuc["markasi"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
                                                if(count($marka)>0){


                                                ?>
                                                
                                                
                                           
                                                    <?php
    
                                                        foreach($marka as $markasi){
                                                            ?>
                                                    
                                                     <?php echo $markasi['markaadi']; ?>
                                                    <?php


                                                        }
                                                            
                                                    
                                                    ?>
       <?php } ?>

</td>       
<td class="kdvsizsatisfiyati text-primary"><?= $sonuc['kdvsizsatisfiyati']?></td>
 <td class="kdvorani text-warning"><?= $sonuc['kdvorani']?></td>     
 <td class="satisfiyati text-danger"><?= $sonuc['satisfiyati']?></td>


 
         
             </tr>


<?php
						}  // While Bitiş

						?>
						           
 



                                                        </tbody>
                                                    </table>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
							Kapat</button>
                       
                        </div>
                      </div>
                    </div>
                  </div>

                            <!-- Approach -->
                            
                        </div>
                    </div>
                </div>
           
                <?php
require("js.php"); 
?>
   <?php 
include_once 'admin/inc/footer.php';


?>