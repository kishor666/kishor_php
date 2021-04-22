<ul>
	<li>
		<a href="record.php">view record</a>
	</li>
	<li>
		<a href="index.php">Add record</a>
	</li>
	<li>
		<a href="search.php">Search record</a>
	</li>
	<?php
	if(isset($_SESSION['islogin'])){
		echo "<li><a href='logout.php'>Logout</a></li>";
	}
	else{
		echo "<li><a href='login.php'>Login</a></li>";
	}
	?>
</ul>