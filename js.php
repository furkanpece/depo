<!--   Core JS Files   -->
<script src="Tasarim/js/core/jquery.3.2.1.min.js"></script>
	<script src="Tasarim/js/core/popper.min.js"></script>
	<script src="Tasarim/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="Tasarim/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="Tasarim/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="Tasarim/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="Tasarim/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="Tasarim/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="Tasarim/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="Tasarim/js/plugin/datatables/datatables.min.js"></script>
<script src="Tasarim/js/plugin/datatables/dataTables.buttons.min.js"></script>
<script src="Tasarim/js/plugin/datatables/buttons.print.min.js"></script>
<script src="Tasarim/js/plugin/datatables/pdfmake.min.js"></script>
<script src="Tasarim/js/plugin/datatables/vfs_fonts.js"></script>
<script src="Tasarim/js/plugin/datatables/buttons.html5.min.js"></script>
<script src="Tasarim/js/plugin/datatables/jszip.min.js"></script>
<script src="Tasarim/js/plugin/datatables/dataTables.bootstrap4.min.js"></script>
<script src="Tasarim/js/plugin/datatables/moment.min.js"></script>
<script src="Tasarim/js/plugin/datatables/dataTables.dateTime.min.js"></script>




	<!-- Bootstrap Notify -->
	<script src="Tasarim/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="Tasarim/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="Tasarim/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="Tasarim/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="Tasarim/js/atlantis.min.js"></script>
	
	<!-- Fatura JS -->
	<script src="Tasarim/js/Fatura.js"></script>
<script src="Tasarim/js/setting-demo.js"></script>
    <script src="Tasarim/tarihsecici/jquery.datetimepicker.full.min.js"></script>
    <script>
    $(document).ready(function () {
                'use strict';

            
                $.datetimepicker.setLocale('tr');
              $('.tarih').datetimepicker({
                format:'Y-m-d H:i',
                  dayOfWeekStart: 1
              });
        
            });
        
    </script>

<script type="text/javascript">



$(".urunsecilen").click(function () {

   
//Extract the text of the clicked element
var urunid = $(this).find(".urunid").text();

var urunadi = $(this).find(".urunadi").text();


 $('#urunid').text(urunid).val(urunid);
 $('#urunadi').text(urunadi).val(urunadi);

 //Close the modal
   $('#urunsecicipencere').modal('hide');
});





   
  </script>
   
	
	
   <script type="text/javascript">
$(window).bind("load", function() { 

   $('#yukleniyor').fadeOut(500);
});
</script>



    