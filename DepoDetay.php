<?php

include_once 'admin/inc/head.php';
include("./data/guvenlik.php");

$depo = $baglanti->prepare("SELECT * FROM Depolar Where id=:id");
$depo->execute(['id' => (int)$_GET["id"]]);
$depom = $depo->fetch();
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
                                <h6 class="m-0 font-weight-bold text-primary"><?= $depom['depoadi']?> - DEPO GİRİŞ - ÇIKIŞ LİSTESİ</h6>
                                </div>
                                <div class="card-body">
                                <div class=" table-responsive">

<br>
<table class="musteritablosu table table-head-bg-<?= $tema['tablorenk']?> table-hover">
                                                        <thead>
                                                            <tr>
 <th>Ürün Kodu</th>                                          
 <th>Ürün Adı</th>
<th>Model</th>   
<th>Marka</th>
 
<th>Stok Grubu</th> 
<th>Stok Giriş</th> 
<th>Stok Çıkış</th>    
   <th>Stok Kalan</th>
<th>Birim</th> 
  </tr>
</thead>
        <tbody id="Urunlistesi">       
    
     <?php $sorgu = $baglanti->query("SELECT * FROM Urunler")->fetchAll();
                                                            foreach ($sorgu as $sonuc) {

     
                                                        ?> 
                                                        	
                                                
<tr id="secilen" class="Satirekle">
	      <td class="urunkodu"><?= $sonuc['urunkodu']?></td>
                    <td class="urunadi"><?= $sonuc['urunadi']?></td>
 <td class="marka">
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
 <td class="model">
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
<td>
<?php
$alistopla=$baglanti->prepare("SELECT SUM(adet) AS alis FROM AlisFaturasi where urunadi='$sonuc[id]' and depo='$depom[id]'");
$alistopla->execute();
$alisyaz= $alistopla->fetch();
$alistoplam=$alisyaz['alis'];
?>
	
	<?php
$alistransfer=$baglanti->prepare("SELECT SUM(miktar) AS alis FROM DepoTransfer where urun='$sonuc[id]' and girendepo='$depom[id]'");
$alistransfer->execute();
$alistransferyaz= $alistransfer->fetch();
$alistransfertoplam=$alistransferyaz['alis'];
?>
	<?php
$alisgiren  = $alistoplam;
$depogiren = $alistransfertoplam;
$giren  = $alisgiren + $depogiren;
?>
	<span class="text-success">
	<?= $giren;?>
</span>
</td> 
<td>
<?php
$satistopla=$baglanti->prepare("SELECT SUM(adet) AS satis FROM SatisFaturasi where urunadi='$sonuc[id]' and depo='$depom[id]'");
$satistopla->execute();
$satisyaz= $satistopla->fetch();
$satistoplam=$satisyaz['satis'];
?>
	<?php
$satistransfer=$baglanti->prepare("SELECT SUM(miktar) AS satis FROM DepoTransfer where urun='$sonuc[id]' and cikandepo='$depom[id]'");
$satistransfer->execute();
$satistransferyaz= $satistransfer->fetch();
$satistransfertoplam=$satistransferyaz['satis'];
?>
	<?php
$satiscikan = $satistoplam;
$depocikan = $satistransfertoplam;
$cikan = $satiscikan + $depocikan;
?>
	<span class="text-danger">
	<?= $cikan;?>
</span>
</td> 
<td>
<?php
$alis  = $giren;
$satis  = $cikan;
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
 <td class="model">
<?php 
                                                      $birim = $baglanti->query("SELECT * FROM Birim where id=".$sonuc["birimadi"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
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

</td>              

 
      </tr>
									
						                  
<?php } ?>
                                                                                
                                                        </tbody>
                                                    </table>
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