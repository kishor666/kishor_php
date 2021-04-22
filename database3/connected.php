<?php
$server="127.0.0.1";
$user="insta";
$password="010397";
$database="instagram";

$con=mysqli_connect($server,$user,$password,$database);
if($con){
	//echo "connected";
}
else{
	echo "not connected";
}
?>