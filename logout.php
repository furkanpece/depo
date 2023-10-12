<?php
session_start();
session_destroy();
setcookie("cerez","",time()-1);
header("location:anasayfa.php");
?>