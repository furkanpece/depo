<?php
$sayfa="Depo Düzenle";
include("./admin/inc/head.php");




$sorgu = $baglanti->prepare("SELECT * FROM urunler Where id=:id");
$sorgu->execute(['id' => (int)$_GET["id"]]);
$sonuc = $sorgu->fetch();
if (isset($_POST["urunduzenle"])) { 
    $id = $_POST['id'];
           $urunadi = $_POST['urunadi'];
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
        if($_FILES['resmi']) {
      $uploaddir = 'UrunResimleri/';
      $uploadfile = $uploaddir . basename($_FILES['resmi']['name']);
      $yukle=move_uploaded_file($_FILES['resmi']['tmp_name'], $uploadfile);
           $satir = [                       
   'id' => $id,
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
           ];
             $sql = "UPDATE Urunler SET urunadi=:urunadi, urunkodu=:urunkodu, urunbarkodu=:urunbarkodu, alisfiyati=:alisfiyati, satisfiyati=:satisfiyati, kdvorani=:kdvorani, stokgrubu=:stokgrubu, markasi=:markasi, modeli=:modeli, resmi=:resmi, uyarilimiti=:uyarilimiti, kdvsizalisfiyati=:kdvsizalisfiyati, kdvsizsatisfiyati=:kdvsizsatisfiyati, birimadi=:birimadi, ekleyen=:ekleyen where id=:id;";
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
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Depo Düzenle</h1>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
                               <form action="" method="POST">
                               <div class="row">
                               <input type="text" name="ekleyen" class="form-control" placeholder="ekleyen" readonly="readonly" value="<?= $kbilgi["id"] ?>" hidden="hidden">
<input type="hidden" class="form-control" name="id" value="<?php echo $sonuc["id"]; ?>">


                                            <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Ürün Adı</label>
 <input type="text" id="urunadi" class="form-control" placeholder="Ürün Adı" name="urunadi" value="<?= $sonuc["urunadi"] ?>">
                                                  </div>
                                            </div>
                                            <!--/span-->
                 
                                           
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Ürün Kodu</label>
                                                    <input type="text" id="urunkodu" class="form-control" placeholder="Ürün Kodu" name="urunkodu" value="<?= $sonuc["urunkodu"] ?>">
                                                  </div>
                                            </div>
                                            <!--/span-->
                                           <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Ürün Barkodu</label>
                                                    <input type="number" id="urunbarkodu" class="form-control" placeholder="Barkod" name="urunbarkodu" value="<?= $sonuc["urunbarkodu"] ?>">
                                                  </div>
                                            </div>
                                            <!--/span-->
                                           
                              
                                            <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">KDV Oranı</label>
            <select class="form-control custom-select" id="kdvorani" data-placeholder="KDV Oranı Seçiniz" tabindex="1" name="kdvorani">
            <option value="<?= $sonuc['kdvorani']?>"><?= $sonuc['kdvorani']?></option>                                             
        <?php
			

						$sorguk = $baglanti->prepare('Select * from Kdvler'); // Veritabanındaki Depolar tablosundaki tüm verileri çekiyoruz
						$sorguk->execute(); // Sorgumuzu çalıştırıyoruz

						while($sonuck=$sorguk->fetch()) // While Döngüsü ile Verilerimzi döndürüyoruz
						
						{  // While Başlangıcı

							?>                                               <option value="<?= $sonuck['kdvorani']?>"><?= $sonuck['kdvorani']?></option>
                   <?php
						}  // While Bitiş

						?>
						                                                           
                                                        
                                                    </select>
                                                  </div>
                                            </div>
                                            <!--/span-->
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Vergisiz Alış Fiyatı</label>
                                                    <input type="text" id="kdvsizalisfiyati" class="sayi form-control" placeholder="Vergisiz Alış Fiyatı" name="kdvsizalisfiyati" value="<?= $sonuc["kdvsizalisfiyati"] ?>">
                                                  </div>
                                            </div>
                                            <!--/span-->
                                           <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Vergisiz Satış Fiyatı</label>
                                                    <input type="text" id="kdvsizsatisfiyati" class="sayi form-control" placeholder="Vergisiz Satış Fiyatı" name="kdvsizsatisfiyati" value="<?= $sonuc["kdvsizsatisfiyati"] ?>">
                                                  </div>
                                            </div>
                                            <!--/span-->
                                           
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Vergili Alış Fiyatı</label>
                                                    <input type="text" id="kdvlialisfiyati" class="sayi form-control" placeholder="Vergili Alış Fiyatı" name="alisfiyati" value="<?= $sonuc["alisfiyati"] ?>">
                                                  </div>
                                            </div>
                                            <!--/span-->
                                           <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Vergili Satış Fiyatı</label>
                                                    <input type="text" id="kdvlisatisfiyati" class="sayi form-control" placeholder="Vergili Satış Fiyatı" name="satisfiyati" value="<?= $sonuc["satisfiyati"] ?>">
                                                  </div>
                                            </div>
                                            <!--/span-->
                                           
                                                          <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Stok Grubu</label>
                                                     <select class="form-control custom-select" id="stokgrubu" data-placeholder="Stok Grubu Seçiniz" tabindex="1" name="stokgrubu">
               <option value="<?= $sonuc['stokgrubu']?>"><?= $sonuc['stokgrubu']?></option>                                          
    <?php
			

						$sorgus = $baglanti->prepare('Select * from StokGruplar'); // Veritabanındaki Depolar tablosundaki tüm verileri çekiyoruz
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
              <option value="<?= $sonuc['birimadi']?>"><?= $sonuc['birimadi']?></option>                                           
    <?php
			

						$sorgub = $baglanti->prepare('Select * from Birim'); // Veritabanındaki Depolar tablosundaki tüm verileri çekiyoruz
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
             <option value="<?= $sonuc['markasi']?>"><?= $sonuc['markasi']?></option>                                   
       <?php
			

						$sorgum = $baglanti->prepare('Select * from Markalar'); // Veritabanındaki Depolar tablosundaki tüm verileri çekiyoruz
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
               <option value="<?= $sonuc['modeli']?>"><?= $sonuc['modeli']?></option>                                    
  <?php
			

						$sorgumo = $baglanti->prepare('Select * from Modeller'); // Veritabanındaki Depolar tablosundaki tüm verileri çekiyoruz
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
                                            <!--/span-->
                                           
                                        
                                          
                                            <div class="col-md-6">
                                                <div class="form-group">
                                
   <label class="control-label">Depo Adı</label>
                                                     <select class="form-control custom-select" id="depoadi" data-placeholder="Depo Adını Seçiniz" tabindex="1" name="depoadi">
               <option value="<?= $sonuc['depoadi']?>"><?= $sonuc['depoadi']?></option>                                    
  <?php
			

						$sorgumo = $baglanti->prepare('Select * from depolar'); // Veritabanındaki Depolar tablosundaki tüm verileri çekiyoruz
						$sorgumo->execute(); // Sorgumuzu çalıştırıyoruz

						while($sonucmo=$sorgumo->fetch()) // While Döngüsü ile Verilerimzi döndürüyoruz
						
						{  // While Başlangıcı

							?>                                               <option value="<?= $sonucmo['id']?>" marka-slug="<?= $sonucmo['depoadi']?>"><?= $sonucmo['depoadi']?></option>
                   <?php
						}  // While Bitiş

						?>
						                                                                   
                                                        
                                                    </select>
                                                  </div>
                                            </div>
                                           
                                           
                                           
                                           
                                           
                                             <div class="col-md-">
                                                <div class="form-group">
                                
   <label class="control-label">Stok Uyarı Limiti</label>
                                                    <input type="text" id="uyarilimiti" class="form-control" placeholder="Stok Uyarı Limiti" name="uyarilimiti" value="<?= $sonuc["uyarilimiti"] ?>">
                                                  </div>
                                            </div>
                                            <!--/span-->
                                           
                                        </div>

                                        <div class="col-md-12">
                                          <div class="form-group">
                                
                                <label class="control-label">Ürün Resmi</label>
                                
                               
                                     <input required type="file" id="resmi" class="form-control" placeholder="Ürün Resmi" name="resmi">
                                                     </div>
                                
                                            </div>
                                        <!--/row-->
		<input type="hidden" class="form-control" name="urunduzenle">
		<button name="kaydet" type="submit" class="btn btn-success btn-raised btn-block">
Kaydet</button>
					</form>
          
                            </div>
                        </div>
                    </div>
                </main>
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
<script type="text/javascript">
var $select1 = $( '#marka' ),
		$select2 = $( '#model' ),
    $options = $select2.find( 'option' );
    
$select1.on( 'change', function() {
	$select2.html( $options.filter( '[value="' + this.value + '"]' ) );
} ).trigger( 'change' );
</script>
                <?php
include("./admin/inc/footer.php");
?>       