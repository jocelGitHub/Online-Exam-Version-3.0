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
  </div>
</header>

<div class = "container offset3 span6 containerAlign" id = "container">
	<div class = "row well">
		<h3>Registration</h3>
	</div>
	<div class = "row well">
			<div class = "span2" style = "margin-left:40px">
				<label>First Name</label>
				<label>Last Name</label>
				<label>Email</label>
				<label>Password</label>
				<label>Confirm Password</label>
			</div>
			<div class = "span4">
				<form method = "POST" action = "ValidateUser.php">
					<div class = "row">
						<div class = "span3">
							<input type = "text" placeholder = "Name" name = "fname" id = "fname">
						</div>
						<div id = "checkfname"></div>						
					</div>
					<div class = "row">
						<div class = "span3">
							<input type = "text" placeholder = "Last Name" name = "lname" id = "lname">
						</div>
						<div id = "checklname"></div>
					</div>
					<div class= "row">
						<div class = "span3">
							<input type = "email" placeholder = "Email" name = "email" id = "email">
						</div>
						<div id = "checkEmail"></div>
					</div>
					<div class = "row">
						<div class = "span3">
							<input type = "password" placeholder = "Password" name = "password" id = "password">
						</div>
						<div id = "checkPassword"></div>
					</div>
					<div class = "row">
						<div class = "span3">
							<input type = "password" placeholder = "Confirm" id = "confirm">
						</div>
						<div id = "confirmPass"></div>
					</div>					
			</div>
			<div class = "span" style = "margin-left:200px; margin-top:20px">
				<input type = "submit" class = "btn btn-primary" value = "Register" id = "validate">
				</form>
				<a href="login.php" class = "btn btn-success">Sign-in</a>
			</div>
	</div>
</div>

    <script type="text/javascript" src = "js/jquery.1.10.2.js"></script>
	<script type="text/javascript" src = "js/validateEmail.js"></script>
	<script type="text/javascript" src = "js/validate.js"></script>
</body>
</html>