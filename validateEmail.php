<?php
	require_once("ExamDAO.php");
	$_email = $_POST['email'];
	$check = ExamDAO::checkEmail($_email);

	if($check){
		echo "<input type = 'hidden' id = 'checkedEmail' value = 'F'>";
		echo "<p style = 'color:red'>Email is Used</p>";
	}else{
		echo "<input type = 'hidden' id = 'checkedEmail' value = 'T'>";
		echo "<img src='img/check.jpg' class = 'img1'>";
	}

?>
