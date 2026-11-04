<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vip Yıkama - İstatistikler</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
   
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <style>
        #myChart{
            style="width:100%;
            height: 100%; 
            max-width:600px; 
            min-height: 400px;
            margin:auto;
        }
    </style>
    
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="index.html"><h2>Vip Yıkama</h2></a>
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
                            <li class="menu-item  ">
                                <a href="layout-horizontal.html" class='menu-link'>
                                    <i class="bi bi-bar-chart-line-fill"></i>
                                    <span>İstatistikler</span>
                                </a>
                            </li>
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
                        </ul>
                    </div>
                </nav>

            </header>

            <div class="content-wrapper container">

                <div class="page-heading">
                    <h3>İstatistikler</h3>
                </div>
                <div class="page-content">
                    <?php 
                                        $db = new PDO("mysql:host=localhost;dbname=asd;charset=utf8","root","");
                                        $postasor=$db->prepare(" SELECT kayıt.Tarih as Tarih from kayıt where Tarih BETWEEN '2022-03-01' AND '2022-03-29'");
                                        $postasor->execute();
                                        $count = $postasor->rowCount();
                                        $db=null;
                                    ?>
                    <section class="row">
                        <div class="col-12 col-lg-9">
                            <div class="row">
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon purple">
                                                        <i class="iconly-boldShow"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Aylık Yıkama</h6>
                                                    <h6 class="font-extrabold mb-0"><?php   echo $count; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon blue">
                                                        <i class="iconly-boldProfile"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Haftalık Yıkama</h6>
                                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon green">
                                                        <i class="iconly-boldAdd-User"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Günlük Yıkama</h6>
                                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon red">
                                                        <i class="iconly-boldBookmark"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Günlük Kazanç</h6>
                                                    <h6 class="font-extrabold mb-0">112</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Profile Visit</h4>
                                        </div>
                                        <div >
                                            <canvas  id="myChart" ></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            
                            
                        </div>
                        
                            
                            
                        
                    </section>
                </div>

            </div>
            

            <footer class="bg-primary" style="
   left: 0;
   bottom: 0;width: 100%;">
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

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="assets/js/pages/horizontal-layout.js"></script>
    <!-- <script src="assets/charts/charts.js"></script> -->


</script>
   
</body>

</html>