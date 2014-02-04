<?php
	require_once("ExamDAO.php");

	$email = $_POST['email'];
	$pass = sha1($_POST['password']);

	if(!empty($email) && !empty($pass)){
		$result = ExamDAO::loginAuthenticator($email,$pass);

		if ($result) {
			header("location:question.php");
		} else {
			echo "<script>alert('Invalid Password or Email');window.location.href='login.php'</script>";
		}
	}else{
		echo "<script>alert('Invalid Password or Email');window.location.href='login.php'</script>";
	}


?>