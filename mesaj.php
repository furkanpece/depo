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
                                <button id="Kaydet" name="kaydet" type="submit" class="btn btn-success btn-raised btn-block" onclick="window.location.href='eklemesaj.php'">
Mesaj Gönder</button>
                                </div>
                                <div class="row">
						<div class="col-md-12">
							     <?php $mesaj = $baglanti->query("Select * from Mesajlar order by mesajtarihi desc")->fetchAll();
                                                         foreach ($mesaj as $mesajim) {
                                                        ?> 

							<ul class="timeline">
<?php if($mesajim["kime"] == $kbilgi["id"] && $mesajim["alanpasif"] == 0){?>
								<li>
									<div class="timeline-badge success">
<?php if($mesajim["okunma"] == 1){?>
<i class="fas fa-envelope-open"></i>
 <?php } ?>
<?php if($mesajim["okunma"] == 0){?>
<i class="fas fa-envelope"></i>
 <?php } ?>
</div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h4 class="timeline-title text-success"><?php 
                                                      $gelen = $baglanti->query("SELECT * FROM kullanici where id=".$mesajim["kime"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
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
										<div class="timeline-body">
<p class="text-info"><?= $mesajim['mesajtarihi']?></p>
											<p><?= $mesajim['baslik']?></p>
<hr>
<div class="form-button-action">
<button  type="button" data-toggle="modal" title="Göster" data-target="#goster" data-id="<?= $mesajim['id']?>" id="fatura" class="btn btn-icon btn-round btn-success" data-original-title="Göster">
																<i class="fa fa-eye"></i>
															</button>
	<button id="alanpasif" type="button" data-toggle="tooltip" title="Sil" class="btn btn-icon btn-round btn-danger" data-original-title="Sil" data-id="<?= $mesajim["id"] ?>" href="javascript:void(0)">
																<i class="fa fa-times"></i>
															</button>
</div>
										</div>
									</div>
								</li>

	<?php } ?>
<?php if($mesajim["kimden"] == $kbilgi["id"] && $mesajim["gonderenpasif"] == 0){?>
								<li class="timeline-inverted">
									<div class="timeline-badge danger">
<?php if($mesajim["okunma"] == 1){?>
<i class="fas fa-envelope-open"></i>
 <?php } ?>
<?php if($mesajim["okunma"] == 0){?>
<i class="fas fa-envelope"></i>
 <?php } ?>
</div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h4 class="timeline-title text-danger"><?php 
                                                      $giden = $baglanti->query("SELECT * FROM kullanici where id=".$mesajim["kime"])->fetchAll(PDO::FETCH_ASSOC);
                                                                
                                                if(count($giden)>0){


                                                ?>
                                                
                                                
                                           
                                                    <?php
    
                                                        foreach($giden as $gidenim){
                                                            ?>
                                                    
                                                     <?= $gidenim['kadi'] ?> 
                                                    <?php


                                                        }
                                                            
                                                    
                                                    ?>
       <?php } ?></h4>
										</div>
										<div class="timeline-body">
<p class="text-info"><?= $mesajim['mesajtarihi']?></p>
											<p><?= $mesajim['baslik']?></p>
<hr>
<div class="form-button-action">
<button type="button" data-toggle="tooltip" title="Düzenle" class="btn btn-icon btn-round btn-warning" data-original-title="Düzenle" onclick="window.location.href='MesajDuzenle.php?id=<?= $mesajim["id"] ?>'">
																<i class="fa fa-edit"></i>
															</button>
		<button id="gonderenpasif" type="button" data-toggle="tooltip" title="Sil" class="btn btn-icon btn-round btn-danger" data-original-title="Sil" data-id="<?= $mesajim["id"] ?>" href="javascript:void(0)">
																<i class="fa fa-times"></i>
															</button>
</div>
										</div>
									</div>
								</li>
							
	
	<?php } ?>
<?php }?>
							</ul>
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
    window.location.href='islem/deposil.php?id='+id;
  }
})
}
        </script>

<script>
$(document).ready(function(){
	
	$(document).on('click', '#fatura', function(e){
		
		e.preventDefault();
		
		var uid = $(this).data('id');   // it will get id of clicked row
		
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader
		
		$.ajax({
			url: 'islem/MesajGoster.php',
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
   <?php 
include_once 'admin/inc/footer.php';



?>