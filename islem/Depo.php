<?php
require("baglanti"); 
?>

		
<?php
/* Depo Ekle*/
if (isset($_POST["depoekle"])) { 

    $depoadi = $_POST['depoadi'];
    $aciklama = $_POST['aciklama'];
    $acilistarihi = $_POST['acilistarihi'];
    if($depoadi == ""){ 
	echo '<script>swal("Hata","Depo Adı Alanını Doldurun.","error");</script>';
	}
	else if($acilistarihi == ""){ 
	echo '<script>swal("Hata","Açılış Tarihi Alanını Doldurun.","error");</script>';
	}
else if($aciklama == ""){ 
	echo '<script>swal("Hata","Açıklama Alanını Doldurun.","error");</script>';
	}
	else {
        $satir = [                       
'depoadi' => $depoadi,
'aciklama' => $aciklama,
'acilistarihi' => $acilistarihi,
        ];
          $sql = "INSERT INTO Depolar SET depoadi=:depoadi, aciklama=:aciklama,acilistarihi=:acilistarihi;";
        $durum = $baglanti->prepare($sql)->execute($satir);

        if ($durum) {
            echo '<script>swal({
            title:"Başarılı",
            text: "Başarıyla Kaydedildi.",
icon:"success",
button:"Tamam",	
            }).then((value)=>{ window.location.href = "Depolar.php"});
            </script>';
           

        }
        
         else {
            echo '<script>swal("Hata","Hatalı , Lütfen bilgilerinizi kontrol ediniz.","error");</script>'; 
        }
    }
  
}

/* Depo Ekle*/

/* Depo Düzenle*/
if (isset($_POST["depoduzenle"])) { 

$depoadi = $_POST['depoadi'];
    $aciklama = $_POST['aciklama'];
    $acilistarihi = $_POST['acilistarihi'];
        $id = $_POST['id'];
    if($depoadi == ""){ 
	echo '<script>swal("Hata","Depo Adı Alanını Doldurun.","error");</script>';
	}
	else if($acilistarihi == ""){ 
	echo '<script>swal("Hata","Açılış Tarihi Alanını Doldurun.","error");</script>';
	}
else if($aciklama == ""){ 
	echo '<script>swal("Hata","Açıklama Alanını Doldurun.","error");</script>';
	}
	else {
        $satir = [                       
'depoadi' => $depoadi,
'aciklama' => $aciklama,
'acilistarihi' => $acilistarihi,
'id' => $id,
        ];
          $sql = "UPDATE Depolar SET depoadi=:depoadi, aciklama=:aciklama,acilistarihi=:acilistarihi WHERE id=:id;";
        $durum = $baglanti->prepare($sql)->execute($satir);

        if ($durum) {
            echo '<script>swal({
            title:"Başarılı",
            text: "Başarıyla Kaydedildi.",
icon:"success",
button:"Tamam",	
            }).then((value)=>{ window.location.href = "Depolar.php"});
            </script>';
           

        }
        
         else {
            echo '<script>swal("Hata","Hatalı , Lütfen bilgilerinizi kontrol ediniz.","error");</script>'; 
        }
    }
  
}

/* Depo Düzenle */

/* Depo Sil */
if ($_POST['deposil']) {
		
		
				$pid = intval($_POST['deposil']);
    $depo=$baglanti->prepare('SELECT* FROM AlFatBilgi WHERE depo=:pid');
     $depo->execute(array($pid));

$depo2=$baglanti->prepare('SELECT* FROM SatFatBilgi WHERE depo=:pid');
     $depo2->execute(array($pid));

     if($depo->rowCount() or $depo->rowCount() ){
            echo '<script>swal("Hata","Depoda İşlem Var. Silmek İçin Alış-Satış(ları) Silmelisiniz","error").then((value)=>{ window.location.href = "depolar"});

            </script>';
     }else{
		$query = "DELETE FROM Depolar WHERE id=:pid";
		$durum = $baglanti->prepare( $query );
		$durum->execute(array(':pid'=>$pid));
		
		if ($durum) {
			echo '<script>swal({
            title:"Başarılı",
            text:"Başarıyla Silindi.",
icon:"success",
button:"Tamam",	
            }).then((value)=>{ window.location.href = "depolar"});
            </script>';
		} else {
			echo '<script>swal("Hata","Hatalı , Lütfen bilgilerinizi kontrol ediniz.","error");</script>'; 
		}
		
	}
}
/* Depo Sil */


?>