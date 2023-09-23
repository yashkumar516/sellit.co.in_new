<?php	
	include 'confile.php';
	session_start();
	if(!isset($_SESSION['email']))
	{
		echo '<script>alert("not set session");</script>';
		header('location:pages-signin.php');
	}
?>