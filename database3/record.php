 <!DOCTYPE html>
<html>
<head>
	<title></title>
  <style type="text/css">
    body{
      background-color: pink;
    }
    .table{
      background-color: yellow;
      padding: 5%;
      margin-left: 5%;
      width: 80%;
    }
    table,tr,td,th{
      border: 1px solid black;
    }
    table{
      width: 100%;
      color: black;
      border-collapse: collapse;
    }
    th{
      height: 50px;
      vertical-align: bottom;
    }
    td{
      height: 35px;
      text-align: center;
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
  <div class="clock" id="clock">
    
  </div>
	<?php

  require_once("menubar.php");
	require_once("connected.php");
     if(isset($_POST['delete'])){
      $id=$_POST['id'];
      $delete_query="DELETE FROM user WHERE id='$id'";
      $delete_result=mysqli_query($con,$delete_query);
        if($delete_result){
          echo "Record deleted successfully.";
        }
        else{
          echo "error:".mysqli_error($con);
        }
     }
      if(isset($_POST['edit'])){
        $id=$_POST['id'];
        $url="edit.php?id=$id";
        header("Location:$url");
        exit();
      }
      $data="";
       $query="SELECT * FROM user ORDER BY id ";
       $result=mysqli_query($con,$query);
       if($result){
       //	echo "success";

          $total_record=mysqli_num_rows($result);
         // echo "total $total_record record found";
     

          $data.="
          <div class='table'>
          <h1>Total $total_record records found.</h1>
          <table>
          <thead>
          <tr>
          <th>Sr no. </th>
          <th>ID</th>
          <th>FIRST NAME</th>
          <th>LAST NAME</th>
          <th>EMAIL</th>
          <th>PASSWORD</th>
          <th>MOBILE</th>
          <th>DATE TIME</th>
          <th>DELETE</td>
          <th>EDIT</th>
          </tr>
          </thead>
          </tbody>
          ";
          //$row=sda,$result=mda
          //value=sda
          $n=1;
          while($row=mysqli_fetch_array($result)){
          	$id=$row['id'];
          		$fname=$row['fname'];
          			$lname=$row['lname'];
          				$email=$row['email'];
          					$password=$row['password'];
          						$mobile=$row['mobile'];
          							$date_time=$row['date_time'];
          		$data.="
          		<tr>
                     <td>$n</td>
                     <td>$id</td>
                     <td>$fname</td>
                     <td>$lname</td>
                     <td>$email</td>
                     <td>$password</td>
                     <td>$mobile</td>
                     <td>$date_time</td>
                     <td>
                     <form action='record.php' method='post'>
                     <input type='hidden' name='id' value='$id'>
                     <input type='submit' name='delete' value='Delete'>
                     </form>
                     </td>
                     <td>
                     <form action='record.php' method='post'>
                     <input type='hidden' name='id' value='$id'>
                     <input type='submit' name='edit' value='Edit'>
                     </form>
                     </td>

                     </tr>
          		";
          		$n++;					
          }
          $data.="</tbody></table></div>";
          echo "$data";


       }
       else{
       	echo "failed".mysqli_error($con);
       }
	?>

</body>
</html>
<script type="text/javascript" src="clock.js?ewqrrqw"></script>