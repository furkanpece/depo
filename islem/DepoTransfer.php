<?php
require("../data/veritabani.php"); 
?>

<?php
		

/* Depo Ekle*/
if (isset($_POST["transferekle"])) { 

    $urun = $_POST['urun'];
    $islemtarihi = $_POST['islemtarihi'];
    $cikandepo= $_POST['cikandepo'];
    $girendepo= $_POST['girendepo'];
    $miktar = $_POST['miktar'];
    if($urun == ""){ 
	echo '<script>swal("Hata","Transfer Yapılacak Ürün Alanını Doldurun.","error");</script>';
	}
	else if($islemtarihi == ""){ 
	echo '<script>swal("Hata","İşlem Tarihi Alanını Doldurun.","error");</script>';
	}
else if($cikandepo == ""){ 
	echo '<script>swal("Hata","Çıkış Yapılacak Depo Alanını Doldurun.","error");</script>';
	}
	else if($girendepo == ""){ 
	echo '<script>swal("Hata","Giriş Yapılacak Depo Alanını Doldurun.","error");</script>';
	}
	else if($miktar == ""){ 
	echo '<script>swal("Hata","Miktar Alanını Doldurun.","error");</script>';
	}
	else {
        $satir = [                       
'urun' => $urun,
'islemtarihi' => $islemtarihi,
'girendepo' => $girendepo,
'cikandepo' => $cikandepo,
'miktar' => $miktar,
        ];
          $sql = "INSERT INTO DepoTransfer SET urun=:urun, girendepo=:girendepo, cikandepo=:cikandepo, islemtarihi=:islemtarihi, miktar=:miktar;";
        $durum = $baglanti->prepare($sql)->execute($satir);

        if ($durum) {
            echo '<script>swal({
            title:"Başarılı",
            text: "Başarıyla Kaydedildi.",
icon:"success",
button:"Tamam",	
            }).then((value)=>{ window.location.href = "DepoTransferleri.php"});
            </script>';
           

        }
        
         else {
            echo '<script>swal("Hata","Hatalı , Lütfen bilgilerinizi kontrol ediniz.","error");</script>'; 
        }
    }
  
}

/* Depo Ekle*/

/* Depo Düzenle*/
if (isset($_POST["transferduzenle"])) { 

$urun = $_POST['urun'];
    $islemtarihi = $_POST['islemtarihi'];
    $cikandepo= $_POST['cikandepo'];
    $girendepo= $_POST['girendepo'];
    $miktar = $_POST['miktar'];
        $id = $_POST['id'];
       
     if($urun == ""){ 
	echo '<script>swal("Hata","Transfer Yapılacak Ürün Alanını Doldurun.","error");</script>';
	}
	else if($islemtarihi == ""){ 
	echo '<script>swal("Hata","İşlem Tarihi Alanını Doldurun.","error");</script>';
	}
else if($cikandepo == ""){ 
	echo '<script>swal("Hata","Çıkış Yapılacak Depo Alanını Doldurun.","error");</script>';
	}
	else if($girendepo == ""){ 
	echo '<script>swal("Hata","Giriş Yapılacak Depo Alanını Doldurun.","error");</script>';
	}
	else if($miktar == ""){ 
	echo '<script>swal("Hata","Miktar Alanını Doldurun.","error");</script>';
	}
	else {
        $satir = [                       
'urun' => $urun,
'islemtarihi' => $islemtarihi,
'girendepo' => $girendepo,
'cikandepo' => $cikandepo,
'miktar' => $miktar,
'id' => $id,
        ];
          $sql = "UPDATE DepoTransfer SET urun=:urun, girendepo=:girendepo, cikandepo=:cikandepo, islemtarihi=:islemtarihi, miktar=:miktar WHERE id=:id;";
        $durum = $baglanti->prepare($sql)->execute($satir);

        if ($durum) {
            echo '<script>swal({
            title:"Başarılı",
            text: "Başarıyla Kaydedildi.",
icon:"success",
button:"Tamam",	
            }).then((value)=>{ window.location.href = "DepoTransferleri.php"});
            </script>';
           

        }
        
         else {
            echo '<script>swal("Hata","Hatalı , Lütfen bilgilerinizi kontrol ediniz.","error");</script>'; 
        }
    }
  
}

/* Depo Düzenle */

/* Depo Sil */
if ($_POST['transfersil']) {
		
		
		$pid = intval($_POST['transfersil']);
		$query = "DELETE FROM DepoTransfer WHERE id=:pid";
		$durum = $baglanti->prepare( $query );
		$durum->execute(array(':pid'=>$pid));
		
		if ($durum) {
			echo '<script>swal({
            title:"Başarılı",
            text:"Başarıyla Silindi.",
icon:"success",
button:"Tamam",	
            }).then((value)=>{ window.location.href = "DepoTransferleri.php"});
            </script>';
		} else {
			echo '<script>swal("Hata","Hatalı , Lütfen bilgilerinizi kontrol ediniz.","error");</script>'; 
		}
		
	}
/* Depo Sil */


?>