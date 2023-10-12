<?php

include_once 'admin/inc/head.php';
include("./data/guvenlik.php");
if (isset($_POST["mesajekle"])) { 

    $baslik = $_POST['baslik'];
    $mesaj = $_POST['mesaj'];
 $kimden = $_POST['kimden'];
 $kime = $_POST['kime'];
 $okunma = $_POST['okunma'];
 $mesajtarihi = $_POST['mesajtarihi'];

    if($baslik == ""){ 
	echo '<script>swal("Hata","Mesaj Başlığı Alanını Doldurun.","error");</script>';
	}
if($mesaj == ""){ 
	echo '<script>swal("Hata","Mesaj Alanını Doldurun.","error");</script>';
	}
if($kime == ""){ 
	echo '<script>swal("Hata","Gönderilcek Alanını Doldurun.","error");</script>';
	}
	else {
        $satir = [                       
'baslik' => $baslik,
'mesaj' => $mesaj,
'kimden' => $kimden,
'kime' => $kime,
'okunma' => $okunma,
'mesajtarihi' => $mesajtarihi,


        ];
          $sql = "INSERT INTO mesajlar SET baslik=:baslik, mesaj=:mesaj, kimden=:kimden, kime=:kime, okunma=:okunma, mesajtarihi=:mesajtarihi;";
        $durum = $baglanti->prepare($sql)->execute($satir);

        if ($durum) {
            echo '<script>swal({
            title:"Başarılı",
            text: "Başarıyla Kaydedildi.",
icon:"success",
button:"Tamam",	
            }).then((value)=>{ window.location.href = "mesaj"});
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
                                <h6 class="m-0 font-weight-bold text-primary"><?= $kbilgi["kadi"] ?>  Kullanıcısı Mesaj Gönder</h6>
                                </div>
                                
                            </div>
                            <div class="card-body">

<form id="Ekle" method="POST">

<div class="row">
 <div class="col-md-12">
                                                <div class="form-group">
  <input type="text" name="kimden" class="form-control" placeholder="Kimden" readonly="readonly" value="<?= $kbilgi["id"] ?>" hidden="hidden">
  <input type="text" name="okunma" class="form-control" placeholder="Okunma" readonly="readonly" value="0" hidden="hidden">      
  <input type="text" name="mesajtarihi" class="form-control" placeholder="Mesaj Tarihi" readonly="readonly" value="<?php echo date('Y-m-d H:i'); ?>" hidden="hidden">                             
   <label class="control-label">Kime Mesaj Göndereceksin?</label>
            <select class="form-control custom-select text-info" id="kime" data-placeholder="Kime Mesaj Göndereceksin?" tabindex="1" name="kime">
                                                       
        <?php
			

						$sorguk = $baglanti->prepare('Select * from kullanici'); 
						$sorguk->execute(); 

						while($sonuck=$sorguk->fetch()) 
						
						{  // While Başlangıcı

							?>                                               <option value="<?= $sonuck['id']?>"><?= $sonuck['kadi']?> </option>
                   <?php
						}  // While Bitiş

						?>
						                                                           
                                                        
                                                    </select>
                                                  </div>
                                            </div>
                                            <!--/span-->

                                            <div class="col-md-12">
                                                <div class="form-group">
                                
   <label class="control-label">Mesaj Başlığı</label>
 <input type="text" id="birimadi" class="form-control" placeholder="Mesaj Başlığı" name="baslik">
                                                  </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                
   <label class="control-label">Mesaj İçeriği</label>
           <textarea class="form-control" id="mesaj" rows="5" name="mesaj"></textarea>            
                                                  </div>
                                            </div>
                                            <!--/span-->



                                        </div>
                                        <!--/row-->
   
    
									
									
									<input type="hidden" class="form-control" name="mesajekle">
		<button type="submit" class="btn btn-success btn-raised btn-block">
Mesajı Gönder</button>
</form>
									
									
									
					</div>
                            
                            
                        </div>
                    </div>
                </div>
                <?php
require("js.php"); //logo - üst navigasyon menü
?>           

   <?php 
include_once 'admin/inc/footer.php';


?>