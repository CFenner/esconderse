<?php
class User{
	public $id;
	public $email;
	public $login;
	public $password;
	public $createDate;

	public function init($id, $email, $login, $password, $createDate){
		$this->id = $id;
		$this->email = $email;
		$this->login = $login;
		$this->password = $password;
		$this->createDate = $createDate;
	}
}
?>