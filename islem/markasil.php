<?php
include("../data/veritabani.php");
if (isset($_GET['id'])) {
     $id=$_GET['id']; 
    $sorgu=$baglanti->prepare("DELETE FROM markalar WHERE id=?");
    $sorgu->execute(array($id));
}
header('Refresh:1; url=../markalar.php');


?>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">

Swal.fire({
  
  icon: 'success',
  title: 'Silme işlemi başarıyla gerçekleşti',
  showConfirmButton: false,
  timer: 900
})
</script>