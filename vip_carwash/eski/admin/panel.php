<?php
include("ayar.php");
session_start();
if(!isset($_SESSION["login"])){

  header("Refresh: 0; url=index.php");
}else{



?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vip Yıkama</title>
</head>
<body style="background-color: #012a4a;" onload="mf()">
 
<div style="background-color:#2c7da0;" class="position-relative">
	<h1 class="text-light display-5 mx-auto py-3" style="width: 250px; ">Vip Yıkama</h1>
  <div class="position-absolute top-0 end-0 "> <button type="button" class="btn btn-danger m-2"><a href=logout.php class="link-light">Çıkış Yap</a></button></div>
</div>
<div style="background-color:#2c7da0;">
   <ul class="nav px-3 py-2" >
     <li class="nav-item mx-1">
       <button type="button" class="btn btn-outline-light  fw-bold "  data-bs-toggle="modal"  data-bs-target="#aracmodal">Arac Kayıt</button>
     </li>
     <li class="nav-item mx-1">
       <button type="button" class="btn btn-outline-light fw-bold "  data-bs-toggle="modal"  data-bs-target="#yıkamamodal">Yıkama Yap</button>  
     </li>
     <!---<li class="nav-item mx-1">
       <button id="cek" type="button" class="btn btn-outline-light fw-bold " >Tablo Tazele</button>
     </li>--->
     <li class="nav-item m-1">
       <form id="arama">
        <input type="text" class=" m-1 " id="arainput" for="inlineFormInput" name="veriara" placeholder="">
        <button id="ara" type="button" class="btn btn-outline-light fw-bold " name="aramaarac">Arama Yap</button>
       </form>
     </li>
     
   </ul>
</div>
<div class="bg-light"  >
 <h1 class=" display-6 mx-auto py-1 px-5 ">Yıkamalar</h1>
</div>
<div class="bg-light" id="divtable" style="overflow-x:auto;">
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Plaka</th>
      <th scope="col">Model</th>
      <th scope="col">Müşteri</th>
      <th scope="col">Durum</th>
      <th scope="col">Sayı</th>
      <th scope="col">Tarih</th>
    </tr>
  </thead>
  <tbody id="veriler">
    
   
    
  </tbody>
</table>
</div>

<!-- ARAC KAYIT Modal -->
<div class="modal fade" id="aracmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Araç Kayıt</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="gonderilenform">
          <div class="form-row align-items-center">
             <div class="col-auto">
              <input type="text" class="form-control mb-2" id="inlineFormInput" readonly name="arackayıt" placeholder="Araç Kayıt">
            </div>
            <div class="col-auto">
              <label class="sr-only" for="inlineFormInput">Araç Plakası *</label>
              <input type="text" class="form-control mb-2" id="inlineFormInput" name="plaka" placeholder="Veri Girişi Zorunlu">
            </div>
            <div class="col-auto">
              <label class="sr-only" for="inlineFormInput">Araç Model</label>
              <input type="text" class="form-control mb-2" id="inlineFormInput" name="model" placeholder="Veri Girişi Zorunlu DEĞİLDİR">
            </div>
            <div class="col-auto">
              <label class="sr-only" for="inlineFormInput">Müşteri Adı</label>
              <input type="text" class="form-control mb-2" id="inlineFormInput" name="kadı" placeholder="Veri Girişi Zorunlu DEĞİLDİR">
            </div>
            <div class="col-auto">
             <div class="form-check mb-2">
              <input class="form-check-input " name="yıkama" type="checkbox" checked id="autoSizingCheck">
              <label class="form-check-label" for="autoSizingCheck">
               Yıkama Yapılacakmı?
              </label>
             </div>
            </div>
            <div class="col-auto">
              <button id="butonarackayıt" type="button" value="GÖNDER" name="aracgönder" class="btn btn-primary">Kayıt Et</button>
            </div>
           </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Çıkış</button>
        
     </div>
    </div>
  </div>
</div>

<!-- ARAC KAYIT Modal SON-->

<!-- YIKAMA Modal -->
<div class="modal fade" id="yıkamamodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yıkama</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="aramaform">
          <div class="form-row align-items-center">
            <div class="col-auto">
              <input type="text" class="form-control mb-2" id="inlineFormInput" readonly name="aracyıka" placeholder="Yıkama Yap">
            </div>
            <div class="col-auto">
              <label class="sr-only" for="inlineFormInput">Yıkama Yapılacak Araç Plakası *</label>
              <input type="text" class="form-control mb-2" id="inlineFormInput" name="yıkanacakplaka" placeholder="Veri Girişi Zorunlu">
            </div>
            <div class="col-auto">
              <button id="butonarama" type="button" value="GÖNDER" name="aracgönder" class="btn btn-primary">Yıkama Yap</button>
            </div>
           </div>
        </form>
        <div id="divarama" class="bg-warning">
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Çıkış</button>
      </div>
    </div>
  </div>
</div>
<!-- YIKAMA Modal SON-->
<div id="div"></div>












<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
  $("#butonarackayıt").on("click", function(){ // buton idli elemana tıklandığında

     var gonderilenform = $("#gonderilenform").serialize(); // idsi gonderilenform olan formun içindeki tüm elemanları serileştirdi ve gonderilenform adlı değişken oluşturarak içine attı
    
    $.ajax({
      url:'ajax.php', // serileştirilen değerleri ajax.php dosyasına
      type:'POST', // post metodu ile 
      data:gonderilenform, // yukarıda serileştirdiğimiz gonderilenform değişkeni 
      success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
        $("#div").html("").html(e); // div elemanını her gönderme işleminde boşalttı ve gelen verileri içine attı

      }
    });
    
  });
});
</script>

<script>
$(document).ready(function(){
  $("#butonarama").on("click", function(){ // buton idli elemana tıklandığında
    var form = $("#aramaform").serialize(); // idsi gonderilenform olan formun içindeki tüm elemanları serileştirdi ve gonderilenform adlı değişken oluşturarak içine attı
    
    $.ajax({
      url:'ajax.php', // serileştirilen değerleri ajax.php dosyasına
      type:'POST', // post metodu ile 
      data:form, // yukarıda serileştirdiğimiz gonderilenform değişkeni 
      success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
        $("#divarama").html("").html(e); // div elemanını her gönderme işleminde boşalttı ve gelen verileri içine attı
      }
    });
    
  });
});
</script>
<script>
$(document).ready(function(){
  $("#ara").on("click", function(){ // buton idli elemana tıklandığında
    var form = $("#arama").serialize(); // idsi gonderilenform olan formun içindeki tüm elemanları serileştirdi ve gonderilenform adlı değişken oluşturarak içine attı
    $("#arainput").val("");
    $.ajax({
      url:'veri.php', // serileştirilen değerleri ajax.php dosyasına
      type:'POST', // post metodu ile 
      data:form, // yukarıda serileştirdiğimiz gonderilenform değişkeni 
      success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
        $('#veriler').html("").html(e); // div elemanını her gönderme işleminde boşalttı ve gelen verileri içine attı
      }
    });
    
  });
});
</script>
 <script>
    function mf(){
          $.ajax({
      url:'veri.php', // serileştirilen değerleri ajax.php dosyasına
      type:'POST', // post metodu ile 
      data:{veriara:""}, // yukarıda serileştirdiğimiz gonderilenform değişkeni 
      success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
        $('#veriler').html("").html(e); // div elemanını her gönderme işleminde boşalttı ve gelen verileri içine attı
      }
    });}




</script>
<script>
  /*$(function(){
    $("#cek").click(function(){
      $.ajax({
        url:'veri.php',
        type:'POST',
        success:function(result){
          $('#veriler').html(result);
        }
      });
    });
  });*/
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>
</html>
<?php } ?>