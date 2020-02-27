<?php

	// get the q parameter from URL
	$email = $_REQUEST["email"];

	//Login Proccessing
	if(isset($email)){
$servername="localhost";
$user="root";
$pass= "";
$database= "todolist";

$con=mysqli_connect($servername,$user,$pass) or
 die("not connected");

mysqli_select_db($con,$database)or
die("could not select database");

		//Sanitize the data
		$email=mysqli_real_escape_string($con,$email);

		//Query Statement
		$query="SELECT * FROM users WHERE
				email='$email'";
		//Execute the Query
		$result=mysqli_query($con,$query);
		//Check if any records have been found
		$count=mysqli_num_rows($result);

		if($count>0){
			echo "Email $email already exist. Please try again.";
		}else{
			echo "email is valid";
		}
	}else{
		die("Unathorized Access!");
	}
?>
