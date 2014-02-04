<?php
	session_start();

	$config = array(
			'host' => 'localhost',
			'username' => 'root',
			'password' => '',
			'database' => 'onlineexam'
		);

	$db = new mysqli(
			$config['host'],
			$config['username'],
			$config['password'],
			$config['database']
		);

	if(mysqli_connect_errno()){
		echo "<script>alert('An error occured. Please try again later')</script>";
		exit;
	}
?>