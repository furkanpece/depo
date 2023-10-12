<?php
$sayfa=="Ürünler";
include("./assets/ainc/head.php");
?>
<body class="animated <?= $tema['animasyon']?>" data-background-color="<?= $tema['arkaplan']?>">
	<div class="wrapper">
		


		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
				
					<div class="card">


<div class="card-header">
<div class="row">
<div class="col-sm-9 col-md-9">

									<h4 class="card-title">ÜRÜN LİSTESİ</h4>
								</div>


</div>


</div>
<section style="padding-top: 30px; padding-bottom: 30px;">
</section>


								<div id="yazdir" class="card-body ">
	
<div class=" table-responsive">

<br>
      <table class="musteritablosu table table-head-bg-<?= $tema['tablorenk']?> table-hover">
                                                        <thead>
                                                            <tr>
<th>Ürün Resmi</th>   
 <th>Ürün Kodu</th>                                          
 <th>Ürün Adı</th>

<th>Marka</th>   
<th>Model</th>  
  <th>Barkodu</th>
                  
<th>Satış Fiyatı</th>  
<th>Stok Grubu</th>    
   <th>Stok Miktarı</th>
 <th>Depo Adı</th>
<th>İşlem</th> 
  </tr>
</thead>
        <tbody id="Urunlistesi">       
    
     <?php $sorgu = $baglanti->query("SELECT * FROM Urunler")->fetchAll();
foreach ($sorgu as $sonuc) {
?> 
                                                        	
                                                
<tr id="secilen" class="Satirekle">
<td><img class="g100" width="100" height="170" src="<?= $sonuc['resmi']?>" alt="image profile"></td>
	      <td class="urunkodu"><?= $sonuc['urunkodu']?></td>
                    <td class="urunadi"><?= $sonuc['urunadi']?></td>
 
 <td class="marka">
 <?php 
                                                      $marka = $baglanti->query("SELECT * FROM Markalar where id=".$sonuc["markasi"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
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
     <td class="barkod"><?= $sonuc['urunbarkodu']?></td>
  

  <td class="satisfiyati"><?= number_format($sonuc['satisfiyati'], 2, ',', '.');?></td>    
                    <td class="stokgrubu">
  
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
                                                                                                                  
</td> 
<td class="kdvorani">
<?php
$alistopla=$baglanti->prepare("SELECT SUM(adet) AS alis FROM AlisFaturasi where urunadi=".$sonuc["id"]);
$alistopla->execute();
$alisyaz= $alistopla->fetch();
$alistoplam=$alisyaz['alis'];
?>
<?php
$satistopla=$baglanti->prepare("SELECT SUM(adet) AS satis FROM SatisFaturasi where urunadi=".$sonuc["id"]);
$satistopla->execute();
$satisyaz= $satistopla->fetch();
$satistoplam=$satisyaz['satis'];
?>
<?php
$alis  = $alistoplam;
$satis  = $satistoplam;
$kalan  = $alis - $satis;
if ($kalan > 0) {
    $renk = "success";
} 
 elseif ($kalan < 0){
    $renk = "danger";
}
elseif ($kalan == 0) {
$renk = "primary";
}

?>
	
	<span class="text-<?= $renk ?>">
	<?= $kalan;?>
  	</span>
</td>   
<td class="depoadi">
<?php 
                                                      $birim = $baglanti->query("SELECT * FROM depolar where id=".$sonuc["depoadi"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
                                                if(count($birim)>0){


                                                ?>
                                                
                                                
                                           
                                                    <?php
    
                                                        foreach($birim as $birimi){
                                                            ?>
                                                    
                                                     <?php echo $birimi['depoadi']; ?>
                                                    <?php


                                                        }
                                                            
                                                    
                                                    ?>
       <?php } ?>
</td>      
<td>
														<div class="form-button-action">
	<button  type="button" data-toggle="modal" title="Düzenle" data-target="#goster" data-id="<?= $sonuc['id']?>" id="fatura" class="btn btn-icon btn-round btn-primary" data-original-title="Göster">
																<i class="fa fa-eye"></i>
															</button>
											

														</div>
													</td>
 
      </tr>
									
						                  
<?php } ?>
                                                                                
                                                        </tbody>
                                                    </table>
							</div>		
									
									
					</div>
			</div>
						<div class="modal fade bd-example-modal-lg" id="goster" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
                      <div class="modal-content bg">
                        <div class="modal-header bg-">
                          <h4 class="modal-title" id="myModalLabel8">ÜRÜN DETAYI</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">X</span>
                          </button>
                        </div>
                        <div class="modal-body table-responsive">

                       	   <div id="modal-loader" style="display: none; text-align: center;">
                       	   	<img src="assets/images/hesapp.gif">
                       	   </div>                            
                           <!-- content will be load here -->                          
                           <div id="dynamic-content"></div>    

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-<?= $tema['tablorenk']?>" data-dismiss="modal">
							Kapat</button>
                       
                        </div>
                      </div>
                    </div>
                  </div>
					
				</div>
			</div>
<div type="hidden" id="sonuc">
	</div>
		
		</div>
		
	</div>
	
	<?php
require("js.php"); 
?>
	
	
<script>
$(document).ready(function(){
	
	$(document).on('click', '#fatura', function(e){
		
		e.preventDefault();
		
		var uid = $(this).data('id');   // it will get id of clicked row
		
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader
		
		$.ajax({
			url: 'Islem/UrunGoster.php',
			type: 'POST',
			data: 'id='+uid,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content').html('');    
			$('#dynamic-content').html(data); // load response 
			$('#modal-loader').hide();		  // hide ajax loader	
		})
		.fail(function(){
					$('#dynamic-content').html('<div class="card card-stats card-round"><div class="card-body "><div class="row align-items-center"><div class="col-icon"><div class="icon-big text-center icon-danger bubble-shadow-small"><i class="fas fa-times"></i></div></div><div class="col col-stats ml-3 ml-sm-0"><div class="numbers"><p class="card-category text-danger">Hata</p><h5 class="card-title text-warning">Birşeyler Yanlış Gitti. Daha Sonra Tekrar Deneyiniz.</h5></div></div></div></div></div>');
			$('#modal-loader').hide();
		});
		
	});
	
});

</script>	

	
</body>


<?php
include("./assets/ainc/footer.php");
?>