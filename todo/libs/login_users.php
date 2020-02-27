<?php
//session_start();
if (isset($_POST['register'])) {
	include_once('classes/class.manageusers.php');
	$users= new ManageUsers();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$repassword = $_POST['repassword'];
	$regdate= date("Y-m-d") ; 
	$regtime= date("H:i:s");
	if (empty($username)|| empty($email) || empty($password||empty(repassword))) {
		$error = 'All fields are required';
	}
	elseif ($password !== $repassword) {
		$error = 'password does not match';

	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = 'Email is not valid';
	}
	else
	{
		$check_availability = $users->GetUserInfo($username);
		if ($check_availability== 0) {
			$register_user=$users->registerUsers($username ,$email,$password,$regdate ,$regtime); 
			if ($register_user==1) {
				$make_sessions =$users->GetUserInfo($username);
				foreach ($make_sessions as $userSessions) {
					$_SESSION['todo_name'] = $userSessions['username'];
					if (isset($_SESSION['todo_name'])) {
						header("location:index.php");
					}
				}
			}
			else {
				echo $register_user;
			}
		}else{
			$error = 'username already exists';
		}
	}
}
if (isset($_POST['login'])) {
	session_start();
	include_once('classes/class.manageusers.php');
	$username = $_POST['login_username'];
	$password = $_POST['login_password'];
	if (empty($username) || empty($password)) {
		$error = 'All fields are required';
	}
	else
	{
//$password= md5($password);
		$login_users = new ManageUsers();
		$auth_user = $login_users->LoginUsers($username,$password);
		if ($auth_user==1) {
			$make_session= $login_users->GetUserInfo($username);
			
			foreach ($make_session as $userSessions) {
					$_SESSION['todo_name'] = $userSessions['username'];
					//$_SESSION['todo_name']=$session_name;
					if (isset($_SESSION['todo_name'])) {
						header("location:index.php?label=inbox");
					}
			}
		
	}else{
		$error = 'incorrect credentials';
}
	}
	}


?>