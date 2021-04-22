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
    require_once("connect.php");
	?>
		<center><h1>Add Product Form</h1></center>
		<form action="product.php" method="post" enctype="multipart/form-data" class="form">

         <?php
         $query="SELECT * FROM category";
          $result_query=mysqli_query($con,$query);
          $data="";
              if($result_query){
              	if(mysqli_num_rows($result_query)>0){
              		$data.="
                        	<p>
				<label for='category'>select category</label>
				<select name='category_id'>
					<option value=''>select category</option>
				";
				while($rows=mysqli_fetch_array($result_query)){
					$id=$rows['id'];
					$category_name=$rows['category_name'];
					$data.="<option value='$id'>category_name</option>";
				}
				$data="
				</select>
			</p>   
			";
              		
              	}
              	 else{
              	echo "No category";
              }
              	

              }
              else{
              	$data.="error".mysqli_error($con);
              }
              echo $data;
         ?>



			<p class="center">
				<label for="category">Select category</label>
				<select name="category_id">
					<option>select category</option>
					<option>HP</option>
					<option>DELL</option>
					<option>VIVO</option>
					<option>Apple</option>
					<option>MI</option>
				</select>
			</p>
			<p>
				<label for="Product_name">Product name</label>
				<input type="text" name="Product_name">
			</p>
			<p>
				<label for="rate">Rate</label>
				<input type="text" name="rate">
			</p>
			<p>
				<label for="qty">Quantity</label>
				<input type="text" name="qty">
			</p>
			<p class="center">
			    <label for="image">Product Image</label>
			    <input type="file" name="image">
			</p>
			<p>
				<label for="details">Details</label>
				<textarea rows="2" name="details"></textarea>
			</p>
			<p class="center">
				<input type="submit" name="submit" value="Add Product">
			</p>
		</form>
	<?php
	require_once("connect.php");
	if(isset($_POST['submit'])){
		//echo "clicked";
	$category_id=$_POST['category_id'];
	$Product_name=$_POST['Product_name'];
	$rate=$_POST['rate'];
	$qty=$_POST['qty'];
	$details=$_POST['details'];
         if(!empty($category_id) && !empty($Product_name) && !empty($rate) && !empty($qty) && !empty($details)){
            // echo "success";

                 $image_name=$_FILES['image']['name'];
                 $image_tmp_name=$_FILES['image']['tmp_name'];
                 $image_size=$_FILES['image']['size']/(1024*1024);
                 $path="product_image/$image_name";
                 $extension=pathinfo($path,PATHINFO_EXTENSION);
                 
              if(($extension)=="jpg"|| ($extension)=="png"){
              	//echo "OK";
              	 if($image_size>5){
              	 	echo "only less than 1/2 mb files are allowed.";
              	 }
              
              else{
              	$image_name=md5(mt_rand(1,10000)).".$extension";
              	$path="product_image/$image_name";
              




             $check_query= "SELECT * FROM product WHERE Product_name='$Product_name' AND category_id='$category_id'";
             $check_result=mysqli_query($con,$check_query);
             if($check_result){
             	//echo "done";
             	if(mysqli_num_rows($check_result)>0){
             		echo "This Product $Product_name added already.";
             	}
             
             else{
             	 $insert_query="INSERT INTO product(category_id,Product_name,qty,rate,product_image,details) VALUES('$category_id','$Product_name','$qty','$rate','$image_name','$details')";
                 $insert_result=mysqli_query($con,$insert_query);
                 if($insert_result){
                 	if(move_uploaded_file($image_tmp_name,$path)){
                 echo "New product $Product_name added.";
             }

          }  
            else{
            	echo "error".mysqli_error($con);
            }

         
               }  	//echo "insert successfully";
                 }
                 else{
                 	echo "error".mysqli_error($con);
                 }

              }

         }
         else{
         	echo "only jpg,png files are allowed.";
         }


     }
         else{
         	echo "Please fill up data";
         }
		
	}

	
	?>
		</div>
		
	</div>

</body>
</html>