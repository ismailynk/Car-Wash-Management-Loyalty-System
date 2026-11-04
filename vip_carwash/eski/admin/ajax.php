
<?php 

extract($_POST); // eract fonksiyonu ile değişkenleri gelen isimleriyle kullanılır hale getirdik ve aldık. 
include 'conn.php';  
           					 
           					
           		
	if(isset($_POST['arackayıt'])){ // eğer post işlemi varsa
		$plaka=strtoupper($plaka);
		$model=strtoupper($model);
		$kadı=strtoupper($kadı);
		//$db = new PDO("mysql:host=localhost;dbname=asd;charset=utf8",'root','');
		$db = new PDO("mysql:host=sql205.epizy.com;dbname=epiz_31238850_vipyikama;charset=utf8","epiz_31238850","mF7Gs5rikx7tR9");
		
		if (empty($plaka)) {
			echo  "<script type='text/javascript'>alert('Plaka Alanı Boş Bırakılamaz! Tekrar Deneyiniz.');</script>";

		}else{
				$postasor=$db->prepare(" SELECT count(plaka) from arac where plaka= '$plaka' ");
				$postasor->execute();
				$count = $postasor->fetchColumn();
				if ($count>0) {
					echo  "<script type='text/javascript'>alert('Plaka Sisteme Kayıtlıdır Yıkama Yapabilirsiniz.');</script>";
				}else{ 
					echo  "<script type='text/javascript'>alert(".$count.");</script>";
					if (empty($yıkama)) {
      					$sql=$db->prepare("INSERT INTO arac set plaka=:p,model=:m,kadi=:k  ");
	
	     		 			$ekle = $sql->execute(array(
	  		      			"p" => $plaka,
	  		      			"m" => $model,
	  		      			"k" => $kadı,
	  		     			  ));

      				}else{
      				$sql=$db->prepare("INSERT INTO arac set plaka=:p,model=:m,kadi=:k,counter=:c  ");
     		 		$ekle = $sql->execute(array(
  		      		"p" => $plaka,
  		      		"m" => $model,
  		      		"k" => $kadı,
  		      		"c" => 1,
  		     		  ));
     		 			$postasor=$db->prepare("SELECT * FROM arac WHERE plaka = '$plaka'");
 						$postasor->execute();
 						$postacek=$postasor->fetch(PDO::FETCH_ASSOC);
 						yıkamakayıt($postacek["id"],1,0);
      				}
     					 
      						
     		 
			

   			   	    if ($ekle) {
           				  echo "<script type='text/javascript'>alert('eklendi ');</script>";}
           				  else {
           				  	echo "<script type='text/javascript'>alert('eklendi ');</script>";
           				  }
				}
      			
      
     			 
      
          
		}
		$db=null;
	}

	if (isset($_POST['aracyıka'])) {
		//$db = new PDO("mysql:host=localhost;dbname=asd;charset=utf8",'root','');
		$db = new PDO("mysql:host=sql205.epizy.com;dbname=epiz_31238850_vipyikama;charset=utf8","epiz_31238850","mF7Gs5rikx7tR9");
		
		$postasor=$db->prepare("SELECT * FROM arac WHERE plaka = '$yıkanacakplaka'");
 		$postasor->execute();
 		$count=$postasor->rowCount();
 		if ($count>0) {
 			$postacek=$postasor->fetch(PDO::FETCH_ASSOC);
 		
 			$sayı=$postacek["counter"]+1;
 			if ($postacek["durum"]==0) {
 				yıkamakayıt($postacek["id"],$sayı,0);
 				if (($sayı%10)==0) {
 			 		update($postacek["id"],$postacek["plaka"],$postacek["model"],$postacek["kadi"],$sayı,1);
 			 

 				}else{
 				 update($postacek["id"],$postacek["plaka"],$postacek["model"],$postacek["kadi"],$sayı,0);

 				}
 			
 			
 			}else{
 				$sayı=$sayı-1;
 				 update($postacek["id"],$postacek["plaka"],$postacek["model"],$postacek["kadi"],$sayı,0);
 			 	yıkamakayıt($postacek["id"],$sayı,1);
 			  	echo "<script type='text/javascript'>alert('Bedava Yıkama Uygulanacak!!!');</script>";
 			}
 		}else{echo "<script type='text/javascript'>alert('Arac Sisteme Kayıtlı Değil. Lütfen Önce Kayıt Ediniz.');</script>";}
 		

 		$db=null;

	}

	function yıkamakayıt($aid,$sayı,$durum){
		//$db = new PDO("mysql:host=localhost;dbname=asd;charset=utf8",'root','');
		$db = new PDO("mysql:host=sql205.epizy.com;dbname=epiz_31238850_vipyikama;charset=utf8","epiz_31238850","mF7Gs5rikx7tR9");
		
     	    try {
     	    	$sql=$db->prepare("INSERT INTO kayıt set aracid=:p,Tarih=:m,sayı=:k,durum=:d ");
     	   				 $ekle = $sql->execute(array(
  		    			 "p" => $aid,
  		   				 "m" => date('d/m/Y'),
  		   				 "k" => $sayı,
  		   				 "d" => $durum,
  		    				 ));
        				    
           				  echo "<script type='text/javascript'>alert('eklendi ');</script>";
      			 } catch (PDOException $e) {
     			       
           				 echo "<script type='text/javascript'>alert('tryolmadı');</script>";
     			 }
     			 if ($ekle) {
     			 	echo "<script type='text/javascript'>alert('oldu');</script>";
     			 }else{
     			 	echo "<script type='text/javascript'>alert('olmadı');</script>";
     			 }
     		$db=null;	 
      
	}

	function update($id,$plaka,$model,$kadi,$counter,$durum){
		//$db = new PDO("mysql:host=localhost;dbname=asd;charset=utf8",'root','');
		$db = new PDO("mysql:host=sql205.epizy.com;dbname=epiz_31238850_vipyikama;charset=utf8","epiz_31238850","mF7Gs5rikx7tR9");
		
		 $sql=$db->prepare("update arac set plaka=:p,model=:m,kadi=:k,counter=:c,durum=:d WHERE id= $id  ");
     		 $ekle = $sql->execute(array(
  		     "p" => $plaka,
  		     "m" => $model,
  		     "k" => $kadi,
  		     "c" => $counter,
  		     "d" => $durum,
  		      ));
     		 $db=null;
	}

	if (isset($_POST['veriara'])) {
		
	}
?>