<?php

include_once 'admin/inc/head.php';
include("./data/guvenlik.php");
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
                                <button id="Kaydet" name="kaydet" type="submit" class="btn btn-success btn-raised btn-block" onclick="window.location.href='dtransferekle.php'">
Depo Transfer Ekle</button>
                                </div>
                                <div class="card-body">
                                <div class=" table-responsive">
   <table class="musteritablosu table table-head-bg-<?= $tema['tablorenk']?> table-hover">
                                                        <thead>
                                                            <tr>
 <th>İşlem Tarihi</th>
<th>Ürün Adı</th>
<th>Marka</th>
<th>Model</th>
<th>Çıkan Depo</th>
<th>Giren Depo</th>                                          
<th>Miktar</th> 
<th>İşlem</th> 
  </tr>
</thead>
        <tbody id="Urunlistesi">       
    
     <?php $sorgu = $baglanti->query("SELECT * FROM DepoTransfer")->fetchAll();

                                                            foreach ($sorgu as $sonuc) {

     
                                                        ?> 
                                                     	
                                      
<tr id="secilen" class="Satirekle">
<td><?= $sonuc['islemtarihi']?></td>
 <td><span>
                                           <?php 
                                                      $urunlerim = $baglanti->query("SELECT * FROM Urunler where id=".$sonuc["urun"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
                                                if(count($urunlerim)>0){


                                                ?>
                                                
                                                
                                           
                                                    <?php
    
                                                        foreach($urunlerim as $urunum){
                                                            ?>
<?php echo $urunum['urunadi'] ?>
       <?php } ?>
         	
         <?php


                                                        }
                                                            
                                                    
                                                    ?>        
</span></td>
 <td class="marka">
 <?php 
                                                      $marka = $baglanti->query("SELECT * FROM Markalar where id=".$urunum["markasi"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
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
                                                      $model = $baglanti->query("SELECT * FROM Modeller where id=".$urunum["modeli"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
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
<td>
	<span class="text-danger">
         <?php 
                                                      $depo = $baglanti->query("SELECT * FROM Depolar where id=".$sonuc["cikandepo"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
                                                if(count($depo)>0){


                                                ?>
                                                
                                                
                                           
                                                    <?php
    
                                                        foreach($depo as $deposu){
                                                            ?>
                                                    
                                                     <?php echo $deposu['depoadi']; ?>
                                                    <?php


                                                        }
                                                            
                                                    
                                                    ?>
       <?php } ?>        
</span>                  
</td>
<td>
	<span class="text-success">
                    <?php 
                                                      $depo = $baglanti->query("SELECT * FROM Depolar where id=".$sonuc["girendepo"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
                                                if(count($depo)>0){


                                                ?>
                                                
                                                
                                           
                                                    <?php
    
                                                        foreach($depo as $deposu){
                                                            ?>
                                                    
                                                     <?php echo $deposu['depoadi']; ?>
                                                    <?php


                                                        }
                                                            
                                                    
                                                    ?>
       <?php } ?>           
                   </span>             
</td>	     

<td>
	<span class="text-primary">
<?= $sonuc['miktar']?>
	        </span>             
</td>    
<td>
	<div class="form-button-action">
	
														
	<button  type="button" data-toggle="tooltip" title="Düzenle" class="btn btn-icon btn-round btn-warning" data-original-title="Düzenle" onclick="window.location.href='dtransferdüzenle.php?id=<?= $sonuc["id"] ?>'">
																<i class="fa fa-edit"></i>
										</button>
															

										<a onClick="sil(<?= $sonuc["id"]; ?>)" title="Sil" class="btn btn-icon btn-round btn-danger"  >
                                        <i class="fa fa-times"></i>
                        </a>

														</div>
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
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    function sil(id){
       // alert(id);
Swal.fire({
  title: 'Emin misiniz? ',
  text: "Silmek istediğinize emin misiniz?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Evet',
  cancelButtonText: 'İptal',
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href='islem/dtransfersil.php?id='+id;
  }
})
}
        </script>
   <?php 
include_once 'admin/inc/footer.php';


?>