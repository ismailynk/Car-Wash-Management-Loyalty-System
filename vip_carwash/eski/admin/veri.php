<?php 
extract($_POST);
        //$db = new PDO("mysql:host=localhost;dbname=asd;charset=utf8",'root','');
        $db = new PDO("mysql:host=sql205.epizy.com;dbname=epiz_31238850_vipyikama;charset=utf8",'epiz_31238850','mF7Gs5rikx7tR9');
	  $postasor=$db->prepare(" SELECT arac.plaka,arac.model,arac.kadi,kayıt.* FROM arac INNER JOIN kayıt on arac.id = kayıt.aracid where plaka LIKE '%$veriara%' order by kayıt.Tarih DESC");
      $postasor->execute();
      while ($postacek=$postasor->fetch(PDO::FETCH_ASSOC)) {
      	echo "<tr>";
      	echo "<th scope='row'>".$postacek['plaka']."</th>";
      	echo "<td>".$postacek['model']."</td>";
      	echo "<td>".$postacek['kadi']."</td>";
      	if ($postacek['durum']==0) {
      		echo "<td> Ücretli </td>";
      	}else{
      		echo "<td class=' text-danger'> Ücretsiz </td>";
      	}
      	
      	echo "<td>".$postacek['sayı']."</td>";
      	echo "<td>".$postacek['Tarih']."</td>";
      	echo "</tr>";



      	

      }




$db=null;


 ?>