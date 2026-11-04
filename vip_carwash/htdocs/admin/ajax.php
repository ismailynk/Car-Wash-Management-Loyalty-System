
<?php 

extract($_POST); // eract fonksiyonu ile değişkenleri gelen isimleriyle kullanılır hale getirdik ve aldık. 

           					 
           					
           		
	if(isset($_POST['arackayıt'])){ // eğer post işlemi varsa
		$plaka = str_replace(' ', '', strtoupper($plaka));
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
					//echo  "<script type='text/javascript'>alert(".$count.");</script>";
					if (empty($yıkama)) {
      					$sql=$db->prepare("INSERT INTO arac set plaka=:p,model=:m,kadi=:k,tel=:t  ");
	
	     		 			$ekle = $sql->execute(array(
	  		      			"p" => $plaka,
	  		      			"m" => $model,
	  		      			"k" => $kadı,
	  		      			"t" => $tel,
	  		     			  ));

      				}else{
      					$sql=$db->prepare("INSERT INTO arac set plaka=:p,model=:m,kadi=:k,tel=:t,counter=:c  ");
     		 			$ekle = $sql->execute(array(
  		      				"p" => $plaka,
  		      				"m" => $model,
  		      				"k" => $kadı,
  		      				"t" => $tel,
  		      				"c" => 1,
  		     		  	));
     		 			$postasor=$db->prepare("SELECT * FROM arac WHERE plaka = '$plaka'");
 						$postasor->execute();
 						$postacek=$postasor->fetch(PDO::FETCH_ASSOC);
 						yıkamakayıt($postacek["id"],1,0);
      				}
     					 
      						
     		 
			

   			   	    if ($ekle) {
           				  echo "<script type='text/javascript'>alert('Araç Başarıyla Eklendi ');</script>";}
           				  else {
           				  echo "<script type='text/javascript'>alert('Ekleme Başarısız ');</script>";
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
 			 		update($postacek["id"],$postacek["plaka"],$postacek["model"],$postacek["kadi"],$postacek["tel"],$sayı,0);
 			 

 				}else{
 				 update($postacek["id"],$postacek["plaka"],$postacek["model"],$postacek["kadi"],$postacek["tel"],$sayı,0);

 				}
 			
 			
 			}else{
 				
 				 update($postacek["id"],$postacek["plaka"],$postacek["model"],$postacek["kadi"],$postacek["tel"],$sayı,0);
 			 	yıkamakayıt($postacek["id"],$sayı,0);
 			  	//echo "<script type='text/javascript'>alert('Bedava Yıkama Uygulanacak!!!');</script>";
 			}
 		}else{echo "<script type='text/javascript'>alert('Arac Sisteme Kayıtlı Değil. Lütfen Önce Kayıt Ediniz.');</script>";}
 		

 		$db=null;

	}

	if (isset($_POST['edit'])) {
		 
		//$db = new PDO("mysql:host=localhost;dbname=asd;charset=utf8",'root','');
		$db = new PDO("mysql:host=sql205.epizy.com;dbname=epiz_31238850_vipyikama;charset=utf8","epiz_31238850","mF7Gs5rikx7tR9");
		
		$postasor=$db->prepare("SELECT * FROM arac WHERE id = '$edit'");
		$postasor->execute();
		$postacek=$postasor->fetch(PDO::FETCH_ASSOC);
		$id=$postacek["id"];
		//echo "<script type='text/javascript'>alert('$id');</script>";
 		
 		update($postacek["id"],$plaka,$model,$kadı,$tel,$postacek["counter"],0);
 		

 		$db=null;

	}

	function yıkamakayıt($aid,$sayı,$durum){
		//$db = new PDO("mysql:host=localhost;dbname=asd;charset=utf8",'root','');
		$db = new PDO("mysql:host=sql205.epizy.com;dbname=epiz_31238850_vipyikama;charset=utf8","epiz_31238850","mF7Gs5rikx7tR9");
		
     	    try {
     	    	$sql=$db->prepare("INSERT INTO kayıt set aracid=:p,Tarih=:m,sayı=:k,durum=:d ");
     	   				 $ekle = $sql->execute(array(
  		    			 "p" => $aid,
  		   				 "m" => date("Y-m-d H:i:s"),
  		   				 "k" => $sayı,
  		   				 "d" => $durum,
  		    				 ));
        				    
           				
      			 } catch (PDOException $e) {
     			       
           				 echo "<script type='text/javascript'>alert('Yıkama Kayıt Edilirken Hata Oluştu');</script>";
     			 }
     			
     		$db=null;	 
      
	}

	function update($id,$plaka,$model,$kadi,$tel,$counter,$durum){
	//$db = new PDO("mysql:host=localhost;dbname=asd;charset=utf8",'root','');
	$db = new PDO("mysql:host=sql205.epizy.com;dbname=epiz_31238850_vipyikama;charset=utf8","epiz_31238850","mF7Gs5rikx7tR9");
		
		 $sql=$db->prepare("update arac set plaka=:p,model=:m,kadi=:k,tel=:t,counter=:c,durum=:d WHERE id= $id  ");
     		 $ekle = $sql->execute(array(
  		     "p" => $plaka,
  		     "m" => $model,
  		     "k" => $kadi,
  		     "t" => $tel,
  		     "c" => $counter,
  		     "d" => $durum,
  		      ));
     		 $db=null;
     		 if ($ekle) {
     		 	echo "<script type='text/javascript'>alert('$plaka Plakalı Araç Başarıyla Güncellendi.');</script>";
     		 }else{echo "<script type='text/javascript'>alert('Araç Güncellemede Hata Meydana Geldi.');</script>";}
	}

	
?>