<?php
require("../data/veritabani.php"); 
?>
<?php
		 
	
	if (isset($_REQUEST['id'])) {
		$id = intval($_REQUEST['id']);
			    $okunma = 1;
   
        $satir = [                       

'id' => $id,
'okunma' => $okunma,


        ];
          $sql = "UPDATE mesajlar SET okunma=:okunma WHERE id=:id;";
        $durum = $baglanti->prepare($sql)->execute($satir);
		
	$sorgu = $baglanti->prepare("SELECT * FROM mesajlar Where id=:id");
$sorgu->execute(array(':id'=>$id));
$sonuc = $sorgu->fetch();
		
		?>
<div class="row row-card">


			<div class="col-sm-6 col-md-6">

							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-success bubble-shadow-small">
												<i class="fas fa-address-card"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">GÖNDEREN</p>
												<h4 class="card-title text-success"><?php 
                                                      $gelen = $baglanti->query("SELECT * FROM kullanici where id=".$sonuc["kimden"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
                                                if(count($gelen)>0){


                                                ?>
                                                
                                                
                                           
                                                    <?php
    
                                                        foreach($gelen as $gelenim){
                                                            ?>
                                                    
                                                     <?= $gelenim['kadi'] ?> 
                                                    <?php


                                                        }
                                                            
                                                    
                                                    ?>
       <?php } ?></h4>
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
												<i class="fas fa-calendar"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">MESAJ TARİHİ</p>
												<h4 class="card-title text-warning"><?= $sonuc['mesajtarihi'] ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
<div class="col-sm-6 col-md-12">

							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-primary bubble-shadow-small">
												<i class="fas fa-envelope-open"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">MESAJ İÇERİĞİ</p>
												<h4 class="card-title text-primary"><?= $sonuc['mesaj'] ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
			






</div>




			
		





 <?php } ?> 
		
			
	
			
	


               