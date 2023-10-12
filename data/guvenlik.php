<?php
$kadi=$_SESSION["email"];
$kbilgi= $baglanti->query("select * from kullanici where email='$kadi'")->fetch();

?>