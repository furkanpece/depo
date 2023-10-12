
<?php

include("./data/veritabani.php");


if(isset($_POST["kaydet"]))
{
  
    $name=$_POST["kullanici1"];
    $email=$_POST["email"];
    $password=md5($_POST["parola"]);
	

    if(isset($name) && isset($email) && isset($password)){

    $sorgu=$baglanti->prepare("INSERT INTO kullanici (kadi , parola,yetki, email,aktif,stokgrup,depo,transfer,kategori,birim,marka,model,kdv,kullanici) VALUES ('$name','$password','2','$email','1','1','1','1','0','0','1','1','0','0')");
    $sorgu->execute();

    if($sorgu){
        echo '<div class="alert alert-success" role="alert">
        Kayıt başarılı şekilde eklendi.
      </div>';
    }
    else{
        echo '<div class="alert alert-danger" role="alert">
        Kayıt eklenirken hata oluştu.
      </div>';
    }

    
	}
}
?>



<!DOCTYPE html>
<html lang="tr">
<head>
	<title>KAYIT OL</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="./assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="./assets/images/img-01.png" alt="IMG">
				</div>

				<form action="kayit.php " method="POST" class="login100-form validate-form">
					<span class="login100-form-title">
						KAYIT OL
					</span>

					<div class="wrap-input100 validate-input" data-validate =" <?php echo $username_err;?>">
						<input class="input100" type="text" name="kullanici1" placeholder="Kullanıcı Adı">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Geçerli bir e-posta gereklidir: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Geçerli bir parola giriniz">
						<input class="input100" type="password" name="parola" placeholder="Parola">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn" >
                        
						<button type="submit" name="kaydet" class="login100-form-btn">
							Kayıt
                            
						</button>
					</div>

					<div class="text-center p-t-12">
						
						<a class="txt2" href="giris.php">
							GİRİŞ YAP
						</a>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="./assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="./assets/vendor/bootstrap/js/popper.js"></script>
	<script src="./assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="./assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="./assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="./assets/js/main.js"></script>

</body>
</html>