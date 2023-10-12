<?php
require("../data/veritabani.php"); 
?>

<?php
		 
	
	if (isset($_REQUEST['id'])) {
			
		$id = intval($_REQUEST['id']);
	$sorgu = $baglanti->prepare("SELECT * FROM urunler Where id=:id");
$sorgu->execute(array(':id'=>$id));
$sonuc = $sorgu->fetch();//sorgu çalıştırılıp veriler alınıyor
		
		?>
<div class="row row-card-no-pd">


			<div class="col-sm-12 col-md-12">

							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-success bubble-shadow-small">
												<i class="far fa-file-alt"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">ÜRÜN ADI</p>
												<h4 class="card-title text-success"><?= $sonuc["urunadi"] ?>
</h4>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>

			<div class="col-sm-6 col-md-6">

							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-warning bubble-shadow-small">
												<i class="fas fa-balance-scale"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">ÜRÜN BİRİMİ</p>
												<h4 class="card-title text-warning">
<?php 
                                                      $birim = $baglanti->query("SELECT * FROM birim where id=".$sonuc["birimadi"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
                                                if(count($birim)>0){


                                                ?>
                                                
                                                
                                           
                                                    <?php
    
                                                        foreach($birim as $birimi){
                                                            ?>
                                                    
                                                     <?php echo $birimi['birimadi']; ?>
                                                    <?php


                                                        }
                                                            
                                                    
                                                    ?>
       <?php } ?>
</h4>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>

			<div class="col-sm-6 col-md-6">

							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-danger bubble-shadow-small">
												<i class="fab fa-modx"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">ÜRÜN MODELİ</p>
												<h4 class="card-title text-danger">
  <?php 
                                                      $model = $baglanti->query("SELECT * FROM modeller where id=".$sonuc["modeli"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
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
</h4>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>

			<div class="col-sm-6 col-md-6">

							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-primary bubble-shadow-small">
												<i class="fab fa-meetup"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">ÜRÜN MARKASI</p>
												<h4 class="card-title text-primary">
 <?php 
                                                      $marka = $baglanti->query("SELECT * FROM markalar where id=".$sonuc["markasi"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
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
</h4>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
	<div class="col-sm-6 col-md-6">

							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-info bubble-shadow-small">
												<i class="fas fa-qrcode"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">ÜRÜN KODU</p>
												<h4 class="card-title text-info">
<?= $sonuc["urunkodu"] ?>
</h4>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
	<div class="col-sm-6 col-md-6">

							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-secondary bubble-shadow-small">
												<i class="fas fa-barcode"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">ÜRÜN BARKODU</p>
												<h4 class="card-title text-secondary">
<?= $sonuc["urunbarkodu"] ?>
</h4>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
	<div class="col-sm-6 col-md-6">

							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-success bubble-shadow-small">
												<i class="fas fa-boxes"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">STOK GRUBU</p>
												<h4 class="card-title text-success">
 <?php 
                                                      $stokgrup = $baglanti->query("SELECT * FROM StokGruplar where id=".$sonuc["stokgrubu"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
                                                if(count($stokgrup)>0){


                                                ?>
                                                
                                                
                                           
                                                    <?php
    
                                                        foreach($stokgrup as $grubu){
                                                            ?>
                                                    
                                                     <?php echo $grubu['stokgrupadi']; ?>
                                                    <?php


                                                        }
                                                            
                                                    
                                                    ?>
       <?php } ?>
</h4>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
	<div class="col-sm-6 col-md-6">

							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-warning bubble-shadow-small">
												<i class="fas fa-file-image"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">ÜRÜN RESMİ</p>
												<h4 class="card-title text-warning">
<img class="g120" width="120" height="240" src="<?= $sonuc['resmi']?>" alt="image profile">
</h4>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
<div class="col-sm-6 col-md-6">

							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-danger bubble-shadow-small">
												<i class="fas fa-percent"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">KDV ORANI</p>
												<h4 class="card-title text-danger">
<?= $sonuc["kdvorani"] ?>
</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
	</div>

	<div class="col-sm-6 col-md-6">

							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-info bubble-shadow-small">
												<i class="fas fa-file-import"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">VERGİSİZ ALIŞ FİYATI</p>
												<h4 class="card-title text-info">
<?= number_format($sonuc['kdvsizalisfiyati'], 2, ',', '.');?>
</h4>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
	<div class="col-sm-6 col-md-6">

							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-secondary bubble-shadow-small">
												<i class="fas fa-file-export"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">VERGİSİZ SATIŞ FİYATI</p>
												<h4 class="card-title text-secondary">
<?= number_format($sonuc['kdvsizsatisfiyati'], 2, ',', '.');?>
</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
</div>
	<div class="col-sm-6 col-md-6">

							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-success bubble-shadow-small">
												<i class="fas fa-file-import"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">VERGİLİ ALIŞ FİYATI</p>
												<h4 class="card-title text-success">
<?= number_format($sonuc['alisfiyati'], 2, ',', '.');?>
</h4>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
	<div class="col-sm-6 col-md-6">

							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-warning bubble-shadow-small">
												<i class="fas fa-file-export"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">VERGİLİ SATIŞ FİYATI</p>
												<h4 class="card-title text-warning">
<?= number_format($sonuc['satisfiyati'], 2, ',', '.');?>
</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
</div>
	

<div class="col-sm-6 col-md-6">

							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-danger bubble-shadow-small">
												<i class="fas fa-chart-line"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">UYARI LİMİTİ</p>
												<h4 class="card-title text-danger">
<?= $sonuc['uyarilimiti'];?>
</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
	</div>
<div class="col-sm-6 col-md-6">

							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-primary bubble-shadow-small">
												<i class="fas fa-user-plus"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">EKLEYEN</p>
												<h4 class="card-title text-primary">
 <?php 
                                                      $kullanicilar= $baglanti->query("SELECT * FROM depolar where id=".$sonuc["ekleyen"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
                                                if(count($kullanicilar)>0){


                                                ?>
                                                
                                                
                                           
                                                    <?php
    
                                                        foreach($kullanicilar as $kullanici){
                                                            ?>
                                                    
                                                     <?php echo $kullanici['depoadi']; ?> 
                                                    <?php


                                                        }
                                                            
                                                    
                                                    ?>
       <?php } ?>
</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
	</div>







</div>




			
		





 <?php } ?> 
		
			
	
			
	


               