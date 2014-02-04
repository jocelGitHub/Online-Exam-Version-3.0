<?php
	include_once('ExamDAO.php');
	$answers = $_SESSION['answers'];
	$result = ExamDAO::checkAnswers($answers);
?>
<html>
<head>
	<title>Online Examnation</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap responsive -->
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- Font awesome - iconic font with IE7 support --> 
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome-ie7.css" rel="stylesheet">
    <link href="css/boot-business.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header  style = "background:url('img/(18).jpg') no-repeat;">
  <div class ="container" >
          <div class="navbar">
            <a class="brand font-brand" href="registration.php"> LVCC Examination</a>
          </div>
          <div class = "pull-right">
          	<a href="SignOut.php" style = "margin-top:20px;">Sign-out</a>
          </div>
  </div>
</header>
<div class = "container span8 offset2" style = "margin-top:50px;float:center">
	<div class = "row wellko">
		<label><b>Name:</b> <?=$_SESSION['fname']." ".$_SESSION['lname']?></label>
	</div>
	<div class = "row wellko">
		<h1>Your score is:  <?=$result?></h1>
	</div>
	<div class = "row wellko">
		<?php
			if($result > 7){
				echo "<h2>Congratulation!! You pass the Exam!!!</h2>";
			}else {
				echo "<h2s>Congratulation!! You failed the Exam!!!</h2>";
			}
	?>
	</div>
</div>
</body>
</html>
