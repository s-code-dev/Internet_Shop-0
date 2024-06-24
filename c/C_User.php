<?php
	include_once 'm/user.php';
	include_once 'config/db.php';
	

	// class C_User extends  C_Base {
		
	// 	public function action_info() {
			
	// 		$get_user = new user();
	// 		$user_info = $get_user->get($_SESSION['user_id']);
	// 		$this->title .= '::' . $user_info['name'];
	// 		$this->content = $this->Template('v/u_info.php', array('username' => $user_info['name'], 'userlogin' => $user_info['login']));
	// 	}
		
	// 	public function action_reg() {
			
	// 		$this->title .= "";
	// 		$this->content = $this->Template('v/u_reg.php', array());

	// 		if($this->isPost()) {
	// 		$new_user = new user();
	// 		$result = $new_user->register($_POST['name'], $_POST['login'], $_POST['telefone'],$_POST['password']);
	// 		if ($result) {
	// 		$this->content = $this->Template('v/u_reg.php', array('text' => 'Вы успешно зарегистрированы!'));
	// 		} else {
	// 		$this->content = $this->Template('v/u_reg.php', array('text' => 'Такой логин уже используется'));
	// 			}
	// 		}
	// 	}

	// 	public function action_login() {
	// 		$this->title .= '';
	// 		$this->content = $this->Template('v/u_login.php', array());

	// 		if($this->isPost()) {
	// 			$login = new user();
	// 			$result = $login->login($_POST['login'], $_POST['password']);
	// 			$this->content = $this->Template('v/u_login.php', array('text' => $result));
				
	// 		}
	// 	}

	// 	public function action_inter() {
	// 		$this->titleo .= '';
	// 		$this->content = $this->Template('v/u_inter.php', array());

	// 	}

	// 	public function action_logout() {
	// 		$logout = new User();
	// 		$result = $logout->logout_admin();
	// 	}
	// }

	include_once 'm/User.php';

class C_User extends C_Base {
		
	public function action_info() {
			
		$get_user = new user();
		$user_info = $get_user->get($_SESSION['user_id']);
		$this->title .= '';
		$this->content = $this->Template('v/u_info.php', array('username' => $user_info['name'], 'userlogin' => $user_info['login']));
	}
		
	public function action_reg() {
			
		$this->title .= '';
		$this->content = $this->Template('v/u_reg.php', array());

		if($this->isPost()) {
			$new_user = new user();
			$result = $new_user->register($_POST['name'], $_POST['login'],$_POST['telefone'], $_POST['password']);
			if ($result) {
				$this->content = $this->Template('v/u_reg.php', array('text' => "Пользователь зарегистрировался успешно!"));
			} else {
			$this->content = $this->Template('v/u_reg.php', array('text' => "Такой пользователь уже существует!"));
			}
		}
	}

	public function action_login() {
		$this->title .= '';
		$this->content = $this->Template('v/u_login.php', array());

		if($this->isPost()) {
			$login = new user();
			$result = $login->login($_POST['login'], $_POST['password']);
			$this->content = $this->Template('v/u_login.php', array('text' => $result));
				
		}
	}

	public function action_logout() {
		$logout = new user();
		$result = $logout->logout_admin();
		header('Location:index.php');
	}
}
?>