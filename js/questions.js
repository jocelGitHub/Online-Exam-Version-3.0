$(document).ready(function(){
	var question_num = 0;
	var question_num2 = 1; 
	var answer;
	var score;
	var rate;
	var user_id = $('#user_id').val();
	var timeOut;
	
	$('#showScore').hide();
	$('#showAnswers').hide();
	$('#showLast').hide();
	$('#question_noAndquestion').hide();
	$('#choices').hide();

	$('#start').click(function(event){
		$('#divstart').hide(1000);
		$('#question_noAndquestion').show(1000);
		$('#choices').show(1000);




		$('#submit').on('click', function(){
			question_num++;
			question_num2++;
			if($("#radio1").is(":checked")){
				answer = $("#radio1").val();
			}else if($("#radio2").is(":checked")){
				answer = $("#radio2").val();
			}else if($("#radio3").is(":checked")){
				answer = $("#radio3").val();
			}else if($("#radio4").is(":checked")){
				answer = $("#radio4").val();
			}else{
				alert('Choose an answer before you proceed to the next question');
				return false;
			}

			score = parseInt($('#scr').val());
			if(question_num <= 9){			
				$.ajax({
					url:'questionRecord.php',
					dataType:'JSON',
					data:{question_id:question_num,question_id2:question_num2, answer:answer, score:score, user_id: user_id},
					type:'POST',
					
					success: function(response){
						$('#question_noAndquestion').hide(1000).slideDown(3000);				
						$('#num').html('<h3>Question #&nbsp;'+question_num2+'</h3>');
						$('#question').html(response.question);
						$('#choices').hide(1000).slideDown(3000);
						$('#a').html("<input type = 'radio' id = 'radio1' name = 'choice' value = '"+response.choice1+"'>&nbsp;&nbsp;"+response.choice1);
						$('#b').html("<input type = 'radio' id = 'radio2' name = 'choice' value = '"+response.choice2+"'>&nbsp;&nbsp;"+response.choice2);
						$('#c').html("<input type = 'radio' id = 'radio3' name = 'choice' value = '"+response.choice3+"'>&nbsp;&nbsp;"+response.choice3);
						$('#d').html("<input type = 'radio' id = 'radio4' name = 'choice' value = '"+response.choice4+"'>&nbsp;&nbsp;"+response.choice4);
						$('#scored').html("<input id = 'scr' type = 'hidden' value ='"+response.score+"'>");
						score = response.score;
					}
				});
			}else{
				$.ajax({
					url:'ExamScore.php',
					data:{question_id:question_num,question_id2:question_num2, answer:answer,score:score, user_id: user_id},
					dataType:'JSON',
					type:'POST',
					
					success: function(response){
						score = response.score;
						rate = response.rate;
						clearTimeout(timeOut);
						$('#time').hide(1000);
						$('#question_noAndquestion').hide(1000);
						$('#choices').hide(1000);					
						$('#showScore').show(1000);
						$('#showAnswers').show(1000);
						$('#showLast').show(1000);
					}
					
				});
			}
		});

		$('#showScore').click(function(event){
			$('#question_noAndquestion').show(1000).html("<h3>"+score+"</h3><br><h1>"+rate+"<h1>");
		});

		$('#showAnswers').click(function(event){
			$.ajax({
				url:'getAnswers.php',
				dataType: 'html',

				success: function(response) {
					$('#question_noAndquestion').hide(1000).fadeIn(2000).html(response);
				}
			});
		});

		$('#showLast').click(function(event){
			$.ajax({
				url:'getLastResults.php',
				dataType:'html',
				data:{user_id:user_id},
				type:'POST',

				success: function(response) {
					$('#question_noAndquestion').hide(1000).fadeIn(2000).html(response);
				}
			});
		});




		var min = 10;
		var sec = 0;

		timeOut = setInterval(function(){
			if(min == 0 && sec == 0){
				alert('Times Up!!!');
				$('#question_noAndquestion').hide(1000).show(1000).html("<h3>"+(0 + score * 10)+"</h3>");
				$('#choices').hide(1000);
				$('#time').hide();
				window.location.href="question.php";

								
			}

			if((sec%60) == 0){
				$('#time').html("<h3>&nbsp;Time: 0"+ min + ":" + sec + "0</h3>");
				min--;
				sec = 59;
			}else if(min == 0 && sec < 10){
				$('#time').html("<h3 style = 'color:red'>&nbsp;Time: 0"+ min + ":0" + sec + "<h3>")
				sec--;
			}else if(sec < 10){
				$('#time').html("<h3>&nbsp;Time: 0"+ min + ":0" + sec + "<h3>")
				sec--;
			}else{
				$('#time').html("<h3>&nbsp;Time: 0"+ min + ":" + sec + "<h3>")
				sec--;
			
			}

		},
		1000
		);

	});
	


});