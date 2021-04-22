<?php
session_start();
/*
create
get
access
*/

$url="index.php";

if(isset($_SESSION['islogin'])){
	$islogin=$_SESSION['islogin'];
	if($islogin=="yes"){
		//allow
		//echo "allowed";
	}
	else{
       //not allow
		header("Location:$url");
		exit();
	}
}
else{
	header("Location:$url");
	exit();
}
?>