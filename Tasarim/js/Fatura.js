
    
           
                     

 $(".kisisecilen").click(function () {

	
//Extract the text of the clicked element
var cid = $(this).find(".cid").text();
var unvan = $(this).find(".unvan").text();
var daire = $(this).find(".daire").text();
var tc = $(this).find(".tc").text();
var adres = $(this).find(".adres").text();
var ilce = $(this).find(".ilce").text();
var il = $(this).find(".il").text();
var parabirimi = $(this).find(".parabirimi").text();
  //Set the text and value of option 
  $('#cid').text(cid).val(cid);
  $('#unvan').text(unvan).val(unvan);
$('#daire').text(daire).val(daire);
$('#tc').text(tc).val(tc);
$('#adres').text(adres).val(adres);
$('#ilce').text(ilce).val(ilce);
$('#il').text(il).val(il);
$('#parabirimi').text(il).val(parabirimi);
  //Close the modal
	$('#kisiSeciciPencere').modal('hide');
});



//ekle bağlantısına tıklandığında çalışacak jquery kodlarımız
    //burada table ın tbody kısmına satır (tr) ekleme yöntemi ile ders için input ekliyoruz.
    var sayac = 0; //kaçıncı ders bilgisini tutuyoruz
    $(function () {
        $('.Satirekle').click(function () {
            sayac += 1;
          
var uid = $(this).find(".urunid").text();      
var urun = $(this).find(".urunadi").text();
var model = $(this).find(".model").text();
var marka = $(this).find(".marka").text();
var fiyat = $(this).find(".kdvsizsatisfiyati").text();
var kdvoran = $(this).find(".kdvorani").text();
            
$('#Tablom tbody').append('<tr class="satir"><td><input id="urunadi_' + sayac + '" name="urunadi[]' + '" value="'+uid+'" type="hidden">  <span id="urun_' + sayac + '">'+urun+' - '+model+' - '+marka+'</span></td><td><input id="adet_' + sayac + '" name="adet[]' + '" type="text" class="form-control adet hesaplama " value=""/></td>' + '<td><input id="fiyat_' + sayac + '" name="fiyat[]' + '" type="text" value="'+fiyat+'" class="form-control fiyat hesaplama" /></td>' + '<td><input id="kdvsiztoplam_' + sayac + '" name="kdvsiztoplam[]' + '" type="text" class="kdvsiztoplam hesaplama form-control"/></td>' + '<td><input id="kdvoran_' + sayac + '" name="kdvoran[]' + '" type="text" value="'+kdvoran+'" class="kdvoran hesaplama form-control"/></td>' + '<td><input id="kdvtutar_' + sayac + '" name="kdvtutar[]' + '" type="text" class="kdvtutar hesaplama form-control"/></td>' + '<td><input id="kdvlitoplam_' + sayac + '" name="kdvlitoplam[]' + '" type="text" class="kdvlitutar hesaplama form-control"/></td>' + '<td><button type="button" data-toggle="tooltip" title="Sil" class="sil btn btn-icon btn-round btn-danger" data-original-title="Sil"><i class="fa fa-times"></i></button></td></tr>');
     //Modal pencereyi kapat
	$('#SeciciPencere').modal('hide');

 });
        //sil bağlantısına tıklanınca çalışacak jquery kodumuz
        //sil tıklandığında tablodaki bulunduğu tr yi siliyoruz
        $('#Tablom').on("click", ".sil", function (e) { //user click on remove text
            e.preventDefault();
            $(this).closest("tr").remove();
calcAll();
        })
   

// calculate everything
    $(document).on("keyup", ".hesaplama", calcAll); //
     $(".hesaplama").on("change", calcAll); });
     function calcAll() {
         // calculate total for one row
    $(".satir").each(function () {
        var adet = 0;
        var fiyat = 0;
        var kdvoran = 0;
      

        if (!isNaN(parseFloat($(this).find(".adet").val()))) {
            adet = parseFloat($(this).find(".adet").val());
        }
        if (!isNaN(parseFloat($(this).find(".fiyat").val()))) {
            fiyat = parseFloat($(this).find(".fiyat").val());
        }
        if (!isNaN(parseFloat($(this).find(".kdvoran").val()))) {
            kdvoran = parseFloat($(this).find(".kdvoran").val());
        }
        
        kdvsiztoplam = adet * fiyat;
        $(this).find(".kdvsiztoplam").val(kdvsiztoplam.toFixed(2));
        kdvtutar = kdvsiztoplam * kdvoran/100;
        $(this).find(".kdvtutar").val(kdvtutar.toFixed(2));
        kdvlitutar = kdvsiztoplam + kdvtutar;
        $(this).find(".kdvlitutar").val(kdvlitutar.toFixed(2)); }); //
         var toplam = 0;
     $(".hesaplama").each(function () {
          if (!isNaN(this.value) && this.value.length != 0) {
              toplam *= parseFloat(this.value);
          }
               $("#toplam").val(toplam.toFixed(2));
          if (!isNaN($(this).find(".adet"))) {

          } });
     var aratoplam = 0;
     var kdvtoplam = 0;
    
var odeme = 0;
   
     $(".kdvsiztoplam").each(function () {
         if (!isNaN(this.value) && this.value.length != 0)
         { aratoplam += parseFloat(this.value); } });
     $(".kdvtutar").each(function () {
         if (!isNaN(this.value) && this.value.length != 0) {
             kdvtoplam += parseFloat(this.value); } });
          
             
         odemem = $('#odeme').val();
             
       $("#aratoplam").val(aratoplam.toFixed(2));
     $("#kdvtoplam").val(kdvtoplam.toFixed(2));
     genel = aratoplam + kdvtoplam;
     $("#geneltoplam").val(genel.toFixed(2));
     kalana = genel - odemem;
         $("#kalan").val(kalana.toFixed(2));
      
     }

