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
                                <a href="" class='menu-link'>
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
                    <button type="button" class="btn btn-primary  fw-bold "  data-bs-toggle="modal"  data-bs-target="#aracmodal">Arac Kayıt</button>
                  </li>
                  <li class="nav-item mx-1">
                    <button type="button" class="btn btn-primary fw-bold "  data-bs-toggle="modal"  data-bs-target="#yıkamamodal">Yıkama Yap</button>  
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
                            <h3>Yıkamalar</h3>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-body" id="divtable">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th scope="col">Plaka</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">Müşteri</th>
                                        <th scope="col">Telefon</th>
                                        <th scope="col">Durum</th>
                                        <th scope="col">Sayı</th>
                                        <th scope="col">Tarih(Yıl/Ay/Gün)</th>
                                        <th scope="col">İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody id="veriler">
                                    <?php 
                                       //$db = new PDO("mysql:host=sql205.epizy.com;dbname=epiz_31238850_vipyikama;charset=utf8","epiz_31238850","mF7Gs5rikx7tR9");
                                       $db = new PDO("mysql:host=localhost;dbname=asd;charset=utf8","root","");
                                        $postasor=$db->prepare(" SELECT arac.*,kayıt.*,kayıt.id as kid FROM arac INNER JOIN kayıt on arac.id = kayıt.aracid order by kayıt.Tarih DESC");
                                        $postasor->execute();
                                        while ($postacek=$postasor->fetch(PDO::FETCH_ASSOC)) {
                                          echo "<tr>";
                                          echo "<td>".$postacek['plaka']."</td>";
                                          echo "<td>".$postacek['model']."</td>";
                                          echo "<td>".$postacek['kadi']."</td>";
                                          echo "<td>".$postacek['tel']."</td>";
                                          if ($postacek['durum']==0) {
                                              echo "<td><span class='badge bg-success'>Ücretli</span></td>";
                                          }else{
                                              echo "<td><span class='badge bg-danger'>Ücretsiz</span></td>";
                                          }
                                          
                                          echo "<td>".$postacek['sayı']."</td>";
                                          echo "<td>".$postacek['Tarih']."</td>";
                                          echo "<td><button type='button' onclick='islemcek(".$postacek['kid'].")' class='btn btn-warning text-dark  fw-bold '  data-bs-toggle='modal'  data-bs-target='#islemmodal'>Görüntüle</button></td>";
                                          echo "</tr>";
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
                          <label class="sr-only" for="inlineFormInput">Telefon</label>
                          <input type="text" class="form-control mb-2" id="inlineFormInput" name="tel" placeholder="Veri Girişi Zorunlu DEĞİLDİR">
                        </div>
                        <hr size="5px"  >
                        <div class="col-auto">
                         <div class="form-check mb-2">
                          <input class="form-check-input " name="yıkama" type="checkbox" checked id="autoSizingCheck">
                          <label class="form-check-label" for="autoSizingCheck">
                           Yıkama Yapılacakmı?
                          </label>
                         </div>
                        </div>
                        <?php 
                                       //$db = new PDO("mysql:host=sql205.epizy.com;dbname=epiz_31238850_vipyikama;charset=utf8","epiz_31238850","mF7Gs5rikx7tR9");
                                       $db = new PDO("mysql:host=localhost;dbname=asd;charset=utf8","root","");
                                        $postasor=$db->prepare(" SELECT * from hizmetler");
                                        $postasor->execute();
                                        while ($postacek=$postasor->fetch(PDO::FETCH_ASSOC)) {?>
                                          
                                        <div class="col-auto">
                                         <div class="form-check mb-2">
                                          <input class="form-check-input " name="tasks[]" value="<?php echo $postacek['id'];?>" type="checkbox"  id="autoSizingCheck">
                                          <label class="form-check-label" for="autoSizingCheck">
                                           <?php echo $postacek['hizmet']." - ".$postacek["fiyat"]." TL"; ?>
                                          </label>
                                         </div>
                                        </div>  
                                        <?php  }
                                        $db=null;
                                    ?>
                        <div class="col-auto">
                          <button id="butonarackayıt" type="button" value="GÖNDER" name="aracgönder" class="btn btn-primary">Kayıt Et</button>
                        </div>
                       </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Çıkış</button>
                    
                 </div><!--şimdiye-->
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
                         <?php 
                                       //$db = new PDO("mysql:host=sql205.epizy.com;dbname=epiz_31238850_vipyikama;charset=utf8","epiz_31238850","mF7Gs5rikx7tR9");
                                        $db = new PDO("mysql:host=localhost;dbname=asd;charset=utf8","root","");
                                        $postasor=$db->prepare(" SELECT * from hizmetler");
                                        $postasor->execute();
                                        while ($postacek=$postasor->fetch(PDO::FETCH_ASSOC)) {?>
                                          
                                        <div class="col-auto">
                                         <div class="form-check mb-2">
                                          <input class="form-check-input " name="tasks[]" value="<?php echo $postacek['id']; ?>" type="checkbox"  id="autoSizingCheck">
                                          <label class="form-check-label" for="autoSizingCheck">
                                           <?php echo $postacek['hizmet']." - ".$postacek["fiyat"]." TL"; ?>
                                          </label>
                                         </div>
                                        </div>  
                                        <?php  }
                                        $db=null;
                                    ?>
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
<!-- İşlem Modal -->
            <div class="modal fade" id="islemmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yapılan İşlemler</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" id="islemsonuc">
                   
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Çıkış</button>
                  </div>
                </div>
              </div>
            </div>
<!-- İşlem Modal SON--><div id="div"></div>


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
    function islemcek(id){
        //alert(id);
          $.ajax({
      url:'veri.php', // serileştirilen değerleri ajax.php dosyasına
      type:'POST', // post metodu ile 
      data:{kid:id}, // yukarıda serileştirdiğimiz gonderilenform değişkeni 
      success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
        $('#islemsonuc').html("").html(e); // div elemanını her gönderme işleminde boşalttı ve gelen verileri içine attı
      }
    });}
</script>

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>





</body>

</html>
<?php } ?>