<?php require_once("connect.php"); ?>
<!DOCTYPE html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css">
 
</head>
<body>
	<div class="container">
		<div class="menubar">
			<ul>
				<li class="brand_name">DailyShopMart</li>
			</ul>
			<form class="search_form">
				<input type="search" name="search" class="search_input" placeholder="Ex: HP,DELL,VIVO,LENOVO">
				<input type="submit" name="search_button" class="search_button" value="Search">
				
			</form>
			<div class="clock" id="clock"></div>
			
		</div>
		<div class="sidebar">
			<?php
			$data="";
			$sql="SELECT * FROM category";
			$result=mysqli_query($con,$sql);
			    if($result){
			    	if(mysqli_num_rows($result)>0){

			    		$data.="<ul class='category_list'>";
			    		while($rows=mysqli_fetch_array($result)){
			    			$category_name=$rows['category_name'];
			    			$data.="<li>$category_name</li>";
			    		}
			    		$data.="</ul>";
			    	}

 
                }
            else{
            	$data.="error";
            }
            echo $data;
			?>
			
		</div>
		<div class="child_container">
			<?php
			$data1="";
			$sql1="SELECT * FROM product ORDER BY id DESC";
			  $result1=mysqli_query($con,$sql1);
			  if($result1){
			  	if(mysqli_num_rows($result1)>0){
			  		while($rows=mysqli_fetch_array($result1)){
			  			$category_id=$rows['category_id'];
			  			$product_name=$rows['product_name'];
			  			$product_image=$rows['product_image'];
			  			$qty=$rows['qty'];
			  			$rate=$rows['rate'];
			  			$details=$rows['details'];
			  			$img_url="product_image/$product_image";

		$sql2="SELECT * FROM category WHERE id='$category_id'";
		  $result2=mysqli_query($con,$sql2);
		     if($result2){
		     	while($rows=mysqli_fetch_array($result2)){
		     		$category_name=$rows['category_name'];

		     	}
		     }	 
		     		
		     	$data1.="                 
                 <div class='child'>
                 <div class='inner_child'>
                 <span class='company'>$category_name</span>
                     <div class='image_container'>
                     <img src='$img_url' class='product_image' alt='$product_name'
                     </div>
                     <div class='product_details'>
                     Qty: $qty <br>
                     Rate:$rate <br>
        			<button type='button' class='add_cart_button'>Add Cart</button>
                     </div>
                   </div>
                </div>  
                </div>                
		     "; 


			  		}
			  	}

			  }
			  else{
			  	$data1.="error";
			  }
			  echo $data1;
			?>
			
		</div>

		
	</div>

</body>
</html>
<script type="text/javascript" src="clock.js"></script>