
<?php
class User{
	private $_fname;
	private $_lname;
	private $_email;
	private $_password;

	public function __construct($config){
		if(isset($config['fname'])) {
			$this->_fname = $config['fname'];
		}
		if(isset($config['lname'])) {
			$this->_lname = $config['lname'];
		}
		if(isset($config['email'])){
			$this->_email = $config['email'];
		}
		if(isset($config['password'])){
			$this->_password = $config['password'];
		}
	}

	public function getFname() {
		return $this->_fname;
	}

	public function getLname() {
		return $this->_lname;
	}	
	public function getEmail() {
		return $this->_email;
	} 
	public function getPassword() {
		return $this->_password;
	}
}

?>