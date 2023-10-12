<?php

include_once 'admin/inc/head.php';
include("./data/guvenlik.php");

if (isset($_POST["depoekle"])) { 

    $depoadi = $_POST['modeladi'];
    $aciklama = $_POST['markaadi'];
    
    if($depoadi == ""){ 
	echo '<script>swal("Hata","Depo Adı Alanını Doldurun.","error");</script>';
	}

else if($aciklama == ""){ 
	echo '<script>swal("Hata","Açıklama Alanını Doldurun.","error");</script>';
	}
	else {
        $satir = [                       
'modeladi' => $depoadi,


        ];
          $sql = "INSERT INTO modeller SET modeladi=:modeladi;";
        $durum = $baglanti->prepare($sql)->execute($satir);

        if ($durum) {
            echo '<script type="text/javascript">
            swal("Başarılı", "Ekleme başarılı şekilde gercekleşti", "success").then((value)=>{ window.location.href = "modeller"});
            </script>
            ';
    
           

        }
        
         else {
            echo '<script type="text/javascript">
            swal("Başarısız", "Ekleme başarılı şekilde gercekleştirilemedi", "error");
            </script>
            ';
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
                                <h6 class="m-0 font-weight-bold text-primary"><?= $kbilgi["kadi"] ?>  Kullanıcısı DEPO EKLEME</h6>
                                </div>
                                <div class="card-body">
                               <form action="modelekle.php" method="POST">
                                   
 <div class="row">                              
        <div class="col-md-12">                       
            <div class="form-group">
                 <label class="control-label">Model Adı</label>
                    <input type="text" name="modeladi"  id="ad" required class="form-control" placeholder="Depo Adı"  >
            </div>
        </div>                             
 </div>                                 
                                  
                                  
 <div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Marka Adı</label>
            <select class="form-control custom-select" data-placeholder="Marka Seçiniz" tabindex="1" name="markaadi">
                                                       
    <?php
                                                                  
                                                      
            $sorgup = $baglanti->prepare('SELECT * FROM markalar'); 
            $sorgup->execute(); 
                                                      
                        while($sonucp=$sorgup->fetch()) 
                                                                              
                             {  
                                                      
     ?>  
     <option value="<?= $sonucp['id']?>"><?= $sonucp['markaadi']?></option>
         <?php
            }  
                                                      
             ?>
            </select>

                    
             </div>
        </div>
</div>

                                    
                                    
                                    

                    <input type="hidden" class="form-control" name="depoekle">
		            <button name="kaydet" type="submit" class="btn btn-success btn-raised btn-block">
                    Kaydet</button>

                               </form>
                            </div>
                            </div>

                            <!-- Approach -->
                            
                        </div>
                    </div>
                </div>
           

   <?php 
include_once 'admin/inc/footer.php';


?>