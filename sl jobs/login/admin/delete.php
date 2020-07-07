<?php
	$id=$_GET['id'];
	include('db-config.php');
	mysqli_query($conn,"delete from `user_infor` where id='$id'");
	header('location:view.php');
?>