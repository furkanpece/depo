<?php

include_once 'admin/inc/head.php';
include("./data/guvenlik.php");
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">DEPOLAR</h1>
                        
                    </div>

                            <div class="row">
                            

                        <div class="container-fluid">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                <?php 
 if ($kbilgi["kdv"]==1) {?>
                                <button id="Kaydet" name="kaydet" type="submit" class="btn btn-success btn-raised btn-block" onclick="window.location.href='eklekdv.php'">
KDV Oranı Ekle</button>
<?php }?>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>İD</th>
                                                <th>KDV Oranı</th>
                                            
                                                <th>İşlem</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody id="Urunlistesi">  
<?php
			

						$sorgu = $baglanti->prepare('Select * from kdvler'); 
						$sorgu->execute();

						while($sonuc=$sorgu->fetch())
						
						{  

							?>
<tr id="secilen" class="Satirekle">
	      <td class="id"><?= $sonuc['id']?></td>
          <td class="kdvorani"><?= $sonuc['kdvorani']?></td>
         <         
     	 
  
                <td>

                                        <div class="form-button-action">
														
                                        <?php 
 if ($kbilgi["kdv"]==1) {?>              
                                        <button  type="button" data-toggle="tooltip" title="Düzenle" class="btn btn-icon btn-round btn-warning" data-original-title="Düzenle" onclick="window.location.href='düzenlekdv.php?id=<?= $sonuc["id"] ?>'">
											<i class="fa fa-edit"></i>
										</button>
<?php } ?>
<?php 
 if ($kbilgi["kdv"]==1) {?>
                                        <button id="sil" type="button" data-toggle="tooltip" title="Sil" class="btn btn-icon btn-round btn-danger" data-original-title="Sil" data-id="<?= $sonuc["id"] ?>" href="javascript:void(0)">
																<i class="fa fa-times"></i>
															</button>
  <?php } ?>                                                        
                        </td>   
                        </tr>
                        <?php
                        }
						?>                </tbody>
                                        </div>
                                    </table>
                                </div
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
    window.location.href='islem/deposil.php?id='+id;
  }
})
}
        </script>
   <?php 
include_once 'admin/inc/footer.php';


?>