 <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="clock" id="clock">
	
</div>

	<?php
	require_once("connected.php");
	include_once("menubar.php");
	include_once("main.css");
	if(isset($_POST['submit'])){
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$mobile=$_POST['mobile'];

		if(
			!empty($fname) &&
			!empty($lname) &&
			!empty($password) &&
			!empty($email) &&
			!empty($mobile) 
			)

			{

$date_time=date("Y-m-d H:i:s");

			$query="INSERT INTO user (fname,lname,email,password,mobile,date_time)VALUES('$fname','$lname','$email','$password','$mobile','$date_time')";
			$result=mysqli_query($con,$query);
			if($result){
				echo "record insert successfully";
			}
			   else{
			   	$error=mysqli_error($con);
			   	echo "failed: not inserted $error";
			   }

			}
		
			else{
				echo "please fill up data";
			}
       }

	?>
	<form action="index.php" method="post">
		
		<p>
		<label for="fname">First name</label>
		<input type="text" name="fname">
		   </p>
		   <p>
		<label for="lname">Last name</label>
		<input type="text" name="lname">
		   </p>
		   <p>
		<label for="email">Email</label>
		<input type="text" name="email">
		   </p>
		   <p>
		<label for="password">Password</label>
		<input type="text" name="password">
		   </p>
		   <p>
		<label for="mobile">Mobile</label>
		<input type="text" name="mobile">
		   </p>
		   <p class="center">
		   	<input type="submit" name="submit" value="insert">
		   </p>
	</form>

</body>
</html>
<script type="text/javascript" src="clock.js"></script>