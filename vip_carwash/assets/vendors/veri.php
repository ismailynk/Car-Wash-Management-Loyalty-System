<?php 
extract($_POST);
        //$db = new PDO("mysql:host=localhost;dbname=asd;charset=utf8",'root','');
        $db = new PDO("mysql:host=localhost;dbname=asd;charset=utf8","root","");
	  $postasor=$db->prepare(" SELECT arac.plaka,arac.model,arac.kadi,kayıt.* FROM arac INNER JOIN kayıt on arac.id = kayıt.aracid order by kayıt.Tarih DESC");
      $postasor->execute();
      while ($postacek=$postasor->fetch(PDO::FETCH_ASSOC)) {
      	echo "<tr>";
      	echo "<td>".$postacek['plaka']."</td>";
      	echo "<td>".$postacek['model']."</td>";
      	echo "<td>".$postacek['kadi']."</td>";
        //echo "<td>".$postacek['tel']."</td>";
      	if ($postacek['durum']==0) {
      		echo "<td><span class='badge bg-success'>Ücretli</span></td>";
      	}else{
      		echo "<td><span class='badge bg-danger'>Ücretsiz</span></td>";
      	}
      	
      	echo "<td>".$postacek['sayı']."</td>";
      	echo "<td>".$postacek['Tarih']."</td>";
        //echo "<td>".$postacek['saat']."</td>";
      	echo "</tr>";



      	

      }




$db=null;


 ?>