<?php

include_once 'admin/inc/head.php';
include("./data/guvenlik.php");

if (isset($_POST["birimekle"])) { 

    $birimadi = $_POST['birimadi'];
    $kisaltma = $_POST['kisaltma'];
    if($birimadi == ""){ 
	echo '<script>swal("Hata","Depo Adı Alanını Doldurun.","error");</script>';
	}
	else if($kisaltma == ""){ 
	echo '<script>swal("Hata","Açılış Tarihi Alanını Doldurun.","error");</script>';
	}

	else {
        $satir = [                       
'birimadi' => $birimadi,
'kisaltma' => $kisaltma,

        ];
          $sql = "INSERT INTO birim SET birimadi=:birimadi, kisaltma=:kisaltma;";
        $durum = $baglanti->prepare($sql)->execute($satir);

        if ($durum) {
            echo '<script type="text/javascript">
        swal("Başarılı", "Ekleme başarılı şekilde gercekleşti", "success").then((value)=>{ window.location.href = "birimler"});
        </script>
        ';
    
           

        }
        
         else {
            echo '<script type="text/javascript">
            swal("Başarısız", "Ekleme başarılı şekilde gercekleşti", "error");
            </script>
            ';
        }
    }
  
}
?>
<?php 
 if ($kbilgi["yetki"]==1 ){?>
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
                               <form action="birimekle.php" method="POST">
                                   
 <div class="row">                              
        <div class="col-md-12">                       
            <div class="form-group">
                 <label class="control-label">Birim Adı</label>
                    <input type="text"   id="ad" required class="form-control" placeholder="Birim Adı" name="birimadi" >
            </div>
        </div>                             
 </div>                                 
                                  
                                  
 <div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Kısaltma</label>
            <input type="text" name="kisaltma"  id="Kısaltma" required class="form-control" placeholder="Kısaltma" name="kisaltma" >
             </div>
        </div>
</div>

                                    
                                    
                                    

                    <input type="hidden" class="form-control" name="birimekle">
		            <button name="kaydet" type="submit" class="btn btn-success btn-raised btn-block">
                    Kaydet</button>

                               </form>
                               <?php }?>
                               <?php 
 if ($kbilgi["yetki"]==2 ) {?>
 	<h1 class="text-danger">BU SAYFAYI GÖRÜNTÜLEMEYE YETKİNİZ YOK </h1>
 <?php }?>	
                            </div>
                            </div>

                            <!-- Approach -->
                            
                        </div>
                    </div>
                </div>
           

   <?php 
include_once 'admin/inc/footer.php';


?>