<?php
session_start();
session_unset();
session_destroy();
$url="index.php";
header("Location:$url");
exit();
?>
<script type="text/javascript" src="clock.js"></script>