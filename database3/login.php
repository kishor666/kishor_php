<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<style type="text/css">
		body{
			background-color: pink;
		}
		    .clock{
       	margin-left: 80%;
       	font-size: 30px;
       	border-radius: 2px;
       	background-color: green;
       	color: white;

       }

	</style>
</head>
<body>
	<div class="clock" id="clock"></div>
	<div class="container">
		<div class="row">
	<?php include_once("menubar.php");?>
	<form action="login.php" method="post">
		   <p>
		<label for="email">Email</label>
		<input type="text" name="email">
		   </p>
		   <p>
		<label for="password">Password</label>
		<input type="text" name="password">
		   </p>
		   <p>
		   	<center>
		   	<input type="submit" name="login" value="Login">
		   	</center>
		   </p>
		   <?php
		   require_once("connected.php");
		   if(isset($_POST['login'])){
		   	$email=$_POST['email'];
		   	$password=$_POST['password'];
		   	$islogin="no";


		   	   if(!empty($email) && !empty($password))
		   	   {
        
        $sql="SELECT * FROM user WHERE email='$email' AND password='$password'";
       $result=mysqli_query($con,$sql);
       if($result){
       	$total=mysqli_num_rows($result);
       	if($total>0){
       		$_SESSION['islogin']="yes";
       		$url="user_dashboard.php";
       		header("Location:$url");
       		exit();
       	}
       	else{
       			echo "Invalid email or password";
       	}

     }
     else{
     	echo "Failed:".mysqli_error($con);
     }

 }
       else{
		   	   	echo "Please fill up data.";
		   	   }

			    
		   }
		   ?>
	</form>

		</div>
	</div>

</body>
</html>
<script type="text/javascript" src="clock.js"></script>
