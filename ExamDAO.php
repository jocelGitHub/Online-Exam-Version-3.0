<?php
	require_once("config.php");

	class ExamDAO{
		public static function createUser($fname, $lname, $email, $pass){
			global $db;
			if (!$email) return false;
			if (!$pass) return false;
			try{
				$query = "INSERT INTO user(fname, lname, email, password) VALUES('{$fname}','{$lname}','{$email}','{$pass}')";
				$result = $db->query($query);
				if($result->num_rows > 0){
					error_log("Successfully Inserted");
					return true;
				}
			} catch (Exeption $e) {
				error_log($e->getMessage());
			}
			return false;
		}

		public static function checkEmail($email){
			global $db;
			if (!$email) return false;
			try {
				$query = "SELECT * FROM user WHERE email = '{$email}'";
				$result = $db->query($query);
				if($result->num_rows > 0){
					error_log("Email VALID");
					return true;
				}else{
					error_log("Email INVALID");
					return false;
				}
			} catch(Exeption $e){
				error_log($e->getMessage());
			}
			return false;
		}

		public static function loginAuthenticator($email,$pass){
			global $db;
			if (!$email) return false;
			if (!$pass) return false;

			try{
				$query = "SELECT * FROM user WHERE email = '{$email}' AND password IN('{$pass}') ";
				$result = $db->query($query);

				if($result->num_rows > 0){
					$record = $result->fetch_assoc();
					$result->free();
					$_SESSION = $record;
					error_log("Successfully Login");
					return true;
				}else {
					error_log("Unsuccessfully Login");
					return false;
				}
			} catch(Exeption $e){
				error_log($e->getMessage());
			}
			return false;

		}

		public static function getQuestionChoices($question_id){
			global $db;
			if (!$question_id) return false;

			try{
				$query = "SELECT question_id, questions, choice_A, choice_B, choice_C, choice_D  FROM questionexam WHERE question_id = '{$question_id}' ";
				$result = $db->query($query);

				if($result->num_rows > 0){
					$questions = array();
					while($row = $result->fetch_assoc()){
						$questions[] = $row;
					}
					$result->free();
					return $questions;
				}else{
					return false;
				}
			} catch(Exeption $e) {
				error_log($e->getMessage());
			}
		}

		public static function insertUserExamDetails($user_id,$score){
			global $db;

			if(!$user_id) return false;

			$query = "INSERT INTO user_score(user_id, score, date_exam, time_Finished) VALUES('{$user_id}','{$score}', CURRENT_DATE, CURRENT_TIME)";
			$result = $db->query($query);

			if($result){
				return true;
			}else{
				return false;
			}
		}

		public static function getLastResults($user_id){
			global $db;

			if(!$user_id) return false;

			$query = "SELECT score, date_exam, time_Finished FROM user_score WHERE user_id = '{$user_id}' ";
			$result = $db->query($query);

			$records = array();
			while($row = $result->fetch_assoc()){
				$records[] = $row;
			}
			$result->free();
			return $records;
		}

		public static function getAllAnswer(){
			global $db;
			try{
				$query = "SELECT answer FROM questionexam ORDER BY question_id";
				$result = $db->query($query);
				$answers = array();
				while($row = $result->fetch_assoc()){
					$answers[] = $row['answer'];
				}
				return $answers;
			} catch (Exeption $e) {
				error_log($e->getMessage());
			}

			return false;
		}

		public static function checkAnswers($answers) {
			$correct = self::getAllAnswer();

			if($correct === false) {
				error_log("Correct Answers Not Ready");
			}

			if (count($correct) != strlen($answers)) {
				error_log("Invalid Answers");
				return false;
			}
			$score = 0;
			for ($i = 0; $i < count($correct); $i++){
				if($correct[$i] == $answers[$i]){
					$score++;
				}
			}

			return $score;
		}
	}
?>