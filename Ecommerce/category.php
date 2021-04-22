<!DOCTYPE html> 
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="product.css">
</head>
<body>
  <div class="container">
    <div class="row">
      
   
	<?php 
  include_once("menubar.php");
  ?>
		<center><h1>Create category form</h1></center>
			<form action="category.php" method="post" class="form">
				<p class="center">
					<label for="category_name">Category name</label>
					<input type="text" name="category_name">
				</p>
				<p class="center">
					<input type="submit" name="submit" value="Create category">
				</p>
			</form>
	<?php
	require_once("connect.php");
	if(isset($_POST['submit'])){
      $category_name=$_POST['category_name'];
      if(!empty($category_name)){
      	//echo "OK";

         $sql1="SELECT * FROM category WHERE category_name='$category_name'";
               $result1=mysqli_query($con,$sql1);
               if($result1){
               		$total=mysqli_num_rows($result1);
              	if($total>0){
               echo "This $category_name category already exists.";
               }
               else{
               	    $sql="INSERT INTO category(category_name) VALUES('$category_name')";
              $result=mysqli_query($con,$sql);
              if($result){
              	//echo "created successfully";
              
              	echo "New category $category_name created.";
              }
              else{
              	echo "Failed:".mysqli_error($con);
              }

                    
               }


      }
      else{
      	echo "Failed".mysqli_error($con);
      }
  }
      else{
      	echo "Please enter new category.";
      }
     
}
	
	?>
   </div>
    
  </div>

</body>
</html>