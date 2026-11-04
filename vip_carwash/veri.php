<?php 
extract($_POST);
    //$db = new PDO("mysql:host=sql205.epizy.com;dbname=epiz_31238850_vipyikama;charset=utf8","epiz_31238850","mF7Gs5rikx7tR9");
    $db = new PDO("mysql:host=localhost;dbname=asd;charset=utf8","root","");
	  $postasor=$db->prepare(" SELECT * from islemler where islemler.yid = $kid");
      $postasor->execute();
      while ($postacek=$postasor->fetch(PDO::FETCH_ASSOC)) {
      	
         echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
        echo "<p class='text-dark'><strong>".$postacek['had']."</strong></p>";
        echo "<span class='badge bg-primary rounded-pill'>";
        echo $postacek['fiyat']." TL";
        echo "</span></li>";}
$db=null; ?>