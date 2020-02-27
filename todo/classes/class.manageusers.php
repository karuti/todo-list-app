<?php
include_once('class.database.php');
/**
* 
*/
class ManageUsers
{
	public $link;
	function __construct()
	{
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;
		
	}
		function registerUsers($username ,$email,$password,$regdate ,$regtime){
			$query = $this->link->prepare("INSERT INTO users(username,email,password,regdate,regtime) VALUES(?,?,?,?,?)");
			$values = array($username,$email,$password,$regdate,$regtime);
			$query->execute($values);
			$counts = $query->rowCount();
			return $counts;

		}
		function LoginUsers($username,$password){
			$query = $this->link->query("SELECT * FROM users WHERE username='$username'AND password = '$password'");
			$rowcount= $query->rowCount();
			return $rowcount;

		}
		function GetUserInfo($username){
			$query = $this->link->query("SELECT * FROM users WHERE username='$username'");
			$rowcount= $query->rowCount();
			if ($rowcount==1) {
			$result = $query->fetchAll();
			return $result;
			}else{
				return $rowcount;
			}


		}

}
        $users = new ManageUsers();
		//echo $users->registerUsers('joy', 'mskaruti@gmail.com','ruee','12-03-2018','7:30');
?>