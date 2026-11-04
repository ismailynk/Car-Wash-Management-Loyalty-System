<?php
include("ayar.php");
session_start();
ob_start();
if(($_POST["username"]==$user) and ($_POST["password"]==$pass)){
$_SESSION["login"] = "true";
$_SESSION["user"] = $user;
$_SESSION["pass"] = $pass;
header("Location:panel.php");
}else{

echo  "<script type='text/javascript'>alert('Kullancı Adı veya Şifre Yanlış. Giriş sayfasına yönlendiriliyorsunuz.');</script>";

header("Refresh: 0; url=index.php");
}
ob_end_flush();
?>