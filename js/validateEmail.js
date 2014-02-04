$(document).ready(function(){
	var typingTimer;
	var doneTypingInterval = 1000;

	$("#email").keyup(function(event){
		clearTimeout(typingTimer);
		typingTimer = setTimeout(function(){
			var email = $("#email").val();
			var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
			if(email != ''){
				if(email.match(emailExp)){
					$.ajax({
						url:"validateEmail.php",
						data:{email:email},
						dataType:'html',
						method:'POST',

						success: function(response){
							$("#checkEmail").html(response);
						}
					});
				}else {
					$("#checkEmail").html("<p class = 'icon-remove' style = 'color:red'></p>")
				}
			}else{
				$("#checkEmail").html("<p class = 'icon-remove' style = 'color:red'></p>")
			}

		},
			doneTypingInterval
		);

	});

});
