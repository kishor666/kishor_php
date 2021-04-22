<?php
$server="127.0.0.1";
$user="ecommerce";
$password="12345";
$database="ecommerce";
        $con=mysqli_connect($server,$user,$password,$database);
        if($con){
        	//echo "connected";
        }
        else{
        	echo "not connected";
        }
?>