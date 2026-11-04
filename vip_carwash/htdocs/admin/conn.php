<?php 

$db=null;
      
 function conopen(){
	try {
		  $host='sql205.epizy.com';
		$dbname='epiz_31238850_vipyikama';
		$user='epiz_31238850';
		$pass='mF7Gs5rikx7tR9';
		$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pass);
		//$db = new PDO("mysql:host=sql205.epizy.com;dbname=epiz_31238850_vipyikama;charset=utf8",epiz_31238850,mF7Gs5rikx7tR9);

		 echo  "<script type='text/javascript'>alert('sucsess');</script>";
		return $db;
		} catch (Exception $e) {
		echo "Başarısız Bağlantı $e";
		}
		

	}
	// function conclose(){$db=null;}

 


 
 function conopenloc(){
	try {
		  $host='localhost';
		$dbname='asd';
		$user='root';
		$pass='';
		$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pass);
		 echo  "<script type='text/javascript'>alert('sucsess');</script>";
		return $db;
		} catch (Exception $e) {
		echo "Başarısız Bağlantı $e";
		}
		

	}
	 function conclose(){$db=null;}

 


 ?>