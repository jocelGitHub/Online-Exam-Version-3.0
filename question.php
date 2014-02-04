<?php
include_once("ExamDAO.php");
define('Question_NUMBER', 10);

$que_num = (isset($_POST['q_num'])) ? $_POST['q_num']+1 : 1;

$answers = (isset($_POST['answers'])) ? $_POST['answers'] : '';

$answer = (isset($_POST['answer'])) ? $_POST['answer'] : '';

$answers .= $answer;

if($que_num > Question_NUMBER){
	$_SESSION['answers'] = $answers;
	header('location:result.php');
}

$Questions = ExamDAO::getQuestionChoices($que_num);
foreach ($Questions as $value):
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
			<div class = "row wellko" id = "question_noAndquestion">
					<h3 id ="num">Question #&nbsp;<?=$que_num?></h3>
					<div  id = "question"><?= $value['questions']?></div>
			</div>
			<div class = "row wellko" id = "choices">
				<form method = "POST" action = "<?= $_SERVER['PHP_SELF']?>">
					<input type = "hidden" name = 'answers' value = "<?=$answers?>">
					<input type = "hidden" name = 'q_num' value = "<?=$que_num?>">
					<input type = "radio"  name = 'answer' value = "A" id = "a">&nbsp;&nbsp;<?= $value['choice_A']?>
					<input type = "radio"  name = 'answer' value = "B" id = "b">&nbsp;&nbsp;<?= $value['choice_B']?><br>
					<input type = "radio"  name = 'answer' value = "C" id = "c">&nbsp;&nbsp;<?= $value['choice_C']?><br>
					<input type = "radio"  name = 'answer' value = "D" id = "d">&nbsp;&nbsp;<?= $value['choice_D']?><br>
					<input type = "submit" value = "submit" class = "btn btn-primary" id = 'submit' style = "margin-top:20px; float:right;margin-right:30px;width:200px">
				</form>
			</div>

</div>
    <script type="text/javascript" src = "js/jquery.1.10.2.js"></script>
</body>
</html>
<?php endforeach; ?>
<script type="text/javascript">

$(document).ready(function(){

	$('#submit').click(function(event){
		if ($('#a').is(':checked')){
			return true;
		}else if ($('#b').is(':checked')) {
			return true;
		} else if ($('#c').is(':checked')) {
			return true;
		} else if ($('#d').is(':checked')) {
			return true;
		} else {
			alert('Choose Answer Before you Submit');
			return false;
		}
	});


});


</script>

