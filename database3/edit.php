<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1>Edit record</h1>
	<div class="clock" id="clock"></div>
	<?php
	require_once("menubar.php");
	require_once("connected.php");
	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$mobile=$_POST['mobile'];
		  $update_query="UPDATE user SET fname='$fname',lname='$lname',email='$email',password='$password',mobile='$mobile' WHERE id='$id'";
		  $update_result=mysqli_query($con,$update_query);
		  if($update_query){
		  	echo "successfully update";
		  }
		  else{
		  	echo "update failed:".mysqli_error($con);
		  }
	}
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$query="SELECT * FROM user WHERE id='$id'";
		$result=mysqli_query($con,$query);
		if($result){

	while($row=mysqli_fetch_array($result))	
			{
				$id=$row['id'];
				$fname=$row['fname'];
				$lname=$row['lname'];
				$email=$row['email'];
				$password=$row['password'];
				$mobile=$row['mobile'];
				echo "
				<form action='edit.php?id=$id'  method='post'>
		<input type='hidden' name='id' value='$id'>
		<p>
		<label for='fname'>First name</label>
		<input type='text' name='fname' value='$fname'>
		   </p>
		   <p>
		<label for='lname'>Last name</label>
		<input type='text' name='lname' value='$lname'>
		   </p>
		   <p>
		<label for='email'>Email</label>
		<input type='text' name='email' value='email'>
		   </p>
		   <p>
		<label for='password'>Password</label>
		<input type='text' name='password' value='$password'>
		   </p>
		   <p>
		<label for='mobile'>Mobile</label>
		<input type='text' name='mobile' value='mobile'>
		   </p>
		   <p class='center'>
		   	<input type='submit' name='update' value='insert'>
		   </p>
	</form>
				";
			}
		}
		else{
			echo "failed:".mysqli_error($con);
		}
	}
	?>

</body>
</html>
<script type="text/javascript" src="clock.js"></script>