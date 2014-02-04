$(document).ready(function(){
	$('#fname').keyup(function(){
		var fname = $(this).val();
		if(fname.length >= 3 && fname != "   "){
			$("#checkfname").html("<img src='img/check.jpg' class = 'img1'>");
		}else {
			$("#checkfname").html("<p class = 'icon-remove' style = 'color:red'></p>");
		}	
	});

	$('#lname').keyup(function(){
		var lname = $(this).val();
		if(lname.length >= 2 && lname != "  ") {
			$("#checklname").html("<img src='img/check.jpg' class = 'img1'>");
		} else {
			$("#checklname").html("<p class = 'icon-remove'  style = 'color:red'</p>");
		}		
	});

	$('#password').keyup(function(){
		var pass = $(this).val();
		if(pass.length >= 8) {
			$("#checkPassword").html("<img src='img/check.jpg' class = 'img1'>");
		} else {
			$("#checkPassword").html("<p class = 'icon-remove' style = 'color:red'>&nbsp;&nbsp;8 character</p>");
		}
	});

	$('#confirm').keyup(function(){
		var confirm = $(this).val();
		var pass = $("#password").val();
		if(confirm == pass && confirm.length >= 8) {
			$("#confirmPass").html("<img src='img/check.jpg' class = 'img1'>");
		} else {
			$("#confirmPass").html("<p class = 'icon-remove' style = 'color:red'>&nbsp;&nbsp;NOT Match</p>");
		}	
	});

	$('#validate').on('click',function(){		
		if ($('#fname').val().length >=2 && $('#lname').val().length >= 1 && $('#checkedEmail').val() == "T" && $('#password').val().length >= 8 && $('#password').val() ==  $('#confirm').val()) {
			return true;
		} else {
			alert("Fill in All");
			return false;
		}
	});

});

