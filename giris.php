<!DOCTYPE html>
<html lang="tr">
<head>
	<title>GİRİŞ YAP</title>
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
<?php 
session_start();
include("./data/veritabani.php");
if(isset($_SESSION["Oturum"]) && $_SESSION["Oturum"]=="6789"){
	header("location:profile");
}elseif(isset($_COOKIE["cerez"])){
	$sorgu=$baglanti->prepare("SELECT email,yetki FROM kullanici WHERE aktif=1");
	$sorgu->execute();
	while ($sonuc=$sorgu->fetch()) {
		if ($_COOKIE["cerez"]==md5("aa".$sonuc["email"]."bb")) {
			$_SESSION["Oturum"]="6789";
			$_SESSION["email"]=$sonuc["email"];
			$_SESSION["yetki"]=$sonuc["yetki"];
			header("location:profile");
		}
	}
}

if (isset($_POST["giris"])) {
	$kadi=$_POST["email"];
	$parola=$_POST["pass"];
}
//echo md5("123456");
?>
				<form method="POST" action="giris.php"  class="login100-form validate-form">
					<span class="login100-form-title">
						GİRİŞ
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email adresini giriniz">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Parolanızı ">
						<input class="input100" type="password" name="pass" placeholder="Parolanızı giriniz">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="giris">
							GİRİŞ YAP
						</button>
					</div>


					<div class="text-center p-t-136">
						<a class="txt2" href="kayit">
							Hesap oluştur
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            
			<?php
			if (isset($_POST["giris"])) {
				$sorgu=$baglanti->prepare("SELECT parola,yetki FROM kullanici WHERE email=:email AND aktif=1");
				$sorgu->execute(['email'=>htmlspecialchars($kadi)]);
				$sonuc=$sorgu->fetch();
				if(md5($parola)==$sonuc["parola"]){
					$_SESSION["Oturum"]="6789";
					$_SESSION["email"]=$kadi;
					$_SESSION["yetki"]=$sonuc["yetki"];
					setcookie("cerez");
					header("location:profile");
				}
				else {
					echo '<script type="text/javascript">
        swal("Hata", "Hatalı , Lütfen bilgilerinizi kontrol ediniz.", "error");
        </script>
        ';
				}
			}

			?>

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