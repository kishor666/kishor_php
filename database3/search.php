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
	<?php
		require_once("menubar.php");
	?>
	<center>
		<h1>Search record</h1><hr>
	</center>
	<div class="searchBox">
	<form action="search.php" method="post">
		<input type="search" name="search" placeholder="Search ex: kishor" class="searchInput" value="<?php if(isset($_POST['search'])){echo $_POST['search'];}?>">
		<input type="submit" name="searchButton" value="search" class="searchButton">
	</form>
	</div>
	 <?php
	 include_once("connected.php");
	  if(isset($_POST['searchButton'])){
	  	$search=$_POST['search'];
	  	if(!empty($search)){
	  	$data="";
	  	//echo "success";
          $search_query="SELECT * FROM user WHERE fname LIKE '%$search%'";

         $search_result=mysqli_query($con,$search_query);
         if($search_result){
         	$total_record=mysqli_num_rows($search_result);
         	$data="
         	<div class='center'>
         	Total $total_record records found
         	</div>
         	";

         	while($rows=mysqli_fetch_array($search_result)){
         		$fname=$rows['fname'];
         		$lname=$rows['lname'];
         		$email=$rows['email'];
         		$password=$rows['password'];
         		$mobile=$rows['mobile'];
         		$data.="
         		<center>
         		<div class='userBox'>
         		First name: $fname <br>
         		Last name: $lname <br>
         		Email: $email <br>
         		Password: $password <br>
         		mobile: $mobile <br>
         		</div>
         		</center>
         		";
         	}
         	echo "$data";
         }
         else{
         	echo "failed:".mysqli_error($con);
         }
        } 
         else{
         	echo "BHOSDK pahle seach box m kuch likh to le.";
         }
	  }
	 ?>

</body>
</html>
<script type="text/javascript" src="clock.js"></script>