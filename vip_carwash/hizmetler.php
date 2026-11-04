
<?php
include("ayar.php");
session_start();
if(!isset($_SESSION["login"])){

  header("Refresh: 0; url=index.php");
}else{



?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vip Yıkama-Kayıt</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
   <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="index.html"><h2>Vip Yıkama</h2></a>
                           <!-- <button type="button" class="btn btn-danger m-4  position-absolute top-0 end-0"><a href=logout.php class="link-light">Çıkış Yap</a></button>-->
                        </div>
                        <div class="header-top-right">

                            <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul class="">
                            <!-- <li class="menu-item  ">
                                <a href="dashboard.php" class='menu-link'>
                                    <i class="bi bi-bar-chart-line-fill"></i>
                                    <span>İstatistikler</span>
                                </a>
                            </li> -->
                            <li class="menu-item  ">
                                <a href="araclar.php" class='menu-link'>
                                    <i class="bi bi-people-fill"></i>
                                    <span>Araçlar/Müşteriler</span>
                                </a>
                            </li>
                            <li class="menu-item  ">
                                <a href="panel.php" class='menu-link'>
                                    <i class="bi bi-table"></i>
                                    <span>Kayıt/Yıkama</span>
                                </a>
                            </li>
                            <li class="menu-item  ">
                                <a href="hizmetler.php" class='menu-link'>
                                    <i class="bi bi-card-checklist"></i>
                                    <span>Hizmetler</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

            </header>
            <div class="bg-info">
                <ul class="nav px-3 py-2" >
                  <li class="nav-item mx-1">
                    <button type="button" class="btn btn-primary  fw-bold "  data-bs-toggle="modal"  data-bs-target="#hizmetmodal">Hizmet Ekle</button>
                  </li>
                  
                  <!--<li class="nav-item m-1">
                    <form id="arama">
                     <input type="text" class=" m-1 " id="arainput" for="inlineFormInput" name="veriara" placeholder="">
                     <button id="ara" type="button" class="btn btn-primary fw-bold " name="aramaarac">Arama Yap</button>
                    </form>
                  </li>-->
                </ul>
            </div>
            <div class="page-heading m-4">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Hizmetler</h3>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-body" id="divtable">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th scope="col">Hizmet Adı</th>
                                        <th scope="col">Fiyatı</th>
                                        <th scope="col">Düzenle</th>
                                        <th scope="col">Sil</th>
                                        </tr>
                                </thead>
                                <tbody id="veriler">
                                    <?php 
                                        //$db = new PDO("mysql:host=sql205.epizy.com;dbname=epiz_31238850_vipyikama;charset=utf8","epiz_31238850","mF7Gs5rikx7tR9");
                                        $db = new PDO("mysql:host=localhost;dbname=asd;charset=utf8","root","");
                                        $postasor=$db->prepare(" SELECT * FROM hizmetler ");
                                        $postasor->execute();
                                        while ($postacek=$postasor->fetch(PDO::FETCH_ASSOC)) {
                                          echo "<tr>";
                                          echo "<td>".$postacek['hizmet']."</td>";
                                          echo "<td>".$postacek['fiyat']." TL</td>";
                                          
                                          echo "<td><button type='button' class='btn btn-primary fw-bold '  data-bs-toggle='modal'  data-bs-target='#edit".$postacek['id']."'>Düzenle</button></td>";
                                          echo "<td><button type='button' class='btn btn-danger fw-bold '  data-bs-toggle='modal'  data-bs-target='#sil".$postacek['id']."'>Sil</button></td>";
                                          echo "</tr>";
                                          ?>
                                          <!-- Düzenle Modal -->
                                             <div class="modal fade" id="edit<?php   echo $postacek["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                               <div class="modal-dialog">
                                                 <div class="modal-content">
                                                   <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLabel">Hizmet Düzenle</h5>
                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                   </div>
                                                   <div class="modal-body">
                                                     <form id="editgonderilenform<?php   echo $postacek["id"]; ?>" >
                                                       <div class="form-row align-items-center">
                                                          <div class="col-auto">
                                                           <input type="text" class="form-control mb-2" id="inlineFormInput" readonly name="hizmetedit" value="<?php   echo $postacek["id"]; ?>" placeholder="Düzenle">
                                                         </div>
                                                         <div class="col-auto">
                                                           <label class="sr-only" for="inlineFormInput">Hizmet Adı </label>
                                                           <input type="text" class="form-control mb-2" id="inlineFormInput" name="hizmetad" value="<?php   echo $postacek["hizmet"]; ?>" placeholder="Veri Girişi Zorunlu">
                                                         </div>
                                                         <div class="col-auto">
                                                           <label class="sr-only" for="inlineFormInput">Fiyat</label>
                                                           <input type="text" class="form-control mb-2" value="<?php   echo $postacek["fiyat"]; ?>" id="inlineFormInput" name="hizmetfiyat" placeholder="Veri Girişi Zorunlu DEĞİLDİR">
                                                         </div>
                                                         
                                                         
                                                         <div class="col-auto" onclick="edit(<?php   echo $postacek["id"]; ?>)">
                                                           <button id="butonedithizmet" type="button"  value="GÖNDER" name="hizmetedit"  class="btn btn-primary ">Kayıt Et</button>
                                                           
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

                                        <!-- DüzenleModal SON-->
                                        <!-- SİL Modal -->
                                             <div class="modal fade" id="sil<?php   echo $postacek["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                               <div class="modal-dialog">
                                                 <div class="modal-content">
                                                   <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLabel">Sil</h5>
                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                   </div>
                                                   <div class="modal-body">
                                                     <form id="silgonderilenform<?php   echo $postacek["id"]; ?>" >
                                                       <div class="form-row align-items-center">
                                                          <div class="col-auto">
                                                           <input type="text" class="form-control mb-2" id="inlineFormInput" readonly name="sil" value="<?php   echo $postacek["id"]; ?>" placeholder="Düzenle">
                                                         </div>
                                                         <div class="col-auto p-2">
                                                           <label class="sr-only" for="inlineFormInput"><?php   echo $postacek["hizmet"]; ?> Adlı Hizmet Silinecek EMİNMİSİNİZ??? </label>
                                                         </div>
                                                         <div class="col-auto" onclick="sil(<?php   echo $postacek["id"]; ?>)">
                                                           <button id="butonsil" type="button"  value="GÖNDER" name="sil"  class="btn btn-primary ">Sil</button>
                                                           
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

                                        <!-- SİLModal SON-->



                                          <?php 

                                        }
                                        $db=null;
                                    ?>



                                  
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>

            <!-- ARAC KAYIT Modal -->
            <div class="modal fade" id="hizmetmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hizmet Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form id="gonderilenform">
                      <div class="form-row align-items-center">
                         <div class="col-auto">
                          <input type="text" class="form-control mb-2" id="inlineFormInput" readonly name="hizmet" placeholder="Hizmet">
                        </div>
                        <div class="col-auto">
                          <label class="sr-only text-dark" for="inlineFormInput"><strong> Hizmet Adı *</strong></label>
                          <input type="text" class="form-control mb-2" id="inlineFormInput" name="hizmetad" placeholder="Veri Girişi Zorunlu">
                        </div>
                        <div class="col-auto">
                          <label class="sr-only text-dark" for="inlineFormInput"><strong>Fiyat</strong></label>
                          <input type="text" class="form-control mb-2" id="inlineFormInput" name="hizmetfiyat" placeholder="Veri Girişi Zorunlu">
                        </div>
                        
                        
                        <div class="col-auto">
                          <button id="butonhizmet" type="button" value="GÖNDER" name="hizmetgönder" class="btn btn-primary">Kayıt Et</button>
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
  <div id="div"></div>



            <footer class="bg-primary" style="left: 0;bottom: 0;width: 100%;">
                <div class="container pt-3">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start text-light">
                            <p>2022 &copy; İsmail YANIK</p>
                        </div>
                        <div class="float-end text-light">
                            <p>Dev with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                    >İsmail Yanık</a></p>
                        </div>
                    </div>
                </div>
            </footer> 
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script src="assets/js/main.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/pages/horizontal-layout.js"></script>

    <!--------------------------------------------------------------------------------------------------------------------------------- -->
        <!--------------------------------------------------------------------------------------------------------------------------------- -->

    <!--------------------------------------------------------------------------------------------------------------------------------- -->

    <!--------------------------------------------------------------------------------------------------------------------------------- -->

    <!--------------------------------------------------------------------------------------------------------------------------------- -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
  $("#butonhizmet").on("click", function(){ // buton idli elemana tıklandığında

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
function sil(id) {
    
    let t1=id;
        let t2="#silgonderilenform";
        let t3=t2.concat(t1);
        alert(t3);
     var gonderilenform = $(t3).serialize(); // idsi gonderilenform olan formun içindeki tüm elemanları serileştirdi ve gonderilenform adlı değişken oluşturarak içine attı
    
    $.ajax({
      url:'ajax.php', // serileştirilen değerleri ajax.php dosyasına
      type:'POST', // post metodu ile 
      data:gonderilenform, // yukarıda serileştirdiğimiz gonderilenform değişkeni 
      success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
        $("#div").html("").html(e); // div elemanını her gönderme işleminde boşalttı ve gelen verileri içine attı

      }
    });
     }

</script>

<script>
     function edit(id){
        let t1=id;
        let t2="#editgonderilenform";
        let t3=t2.concat(t1);
        
        var gonderilenform = $(t3).serialize(); // idsi gonderilenform olan formun içindeki tüm elemanları serileştirdi ve gonderilenform adlı değişken oluşturarak içine attı
    
    $.ajax({
      url:'ajax.php', // serileştirilen değerleri ajax.php dosyasına
      type:'POST', // post metodu ile 
      data:gonderilenform, // yukarıda serileştirdiğimiz gonderilenform değişkeni 
      success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
        $("#div").html("").html(e); // div elemanını her gönderme işleminde boşalttı ve gelen verileri içine attı

      }
    });
     }
</script>


<!-- <script>
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
</script> -->
<!-- <script>
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




</script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>





</body>

</html>
<?php } ?>