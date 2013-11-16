<?php
	include "sensitivedata.php";
	$con = mysqli_connect($host, $login, $pass);
	$link = mysqli_select_db($con, $db_name);
	if($link){
		echo "hello world";
	}
?>