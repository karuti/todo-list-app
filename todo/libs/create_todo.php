<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "todolist");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
if (isset($_POST['create_todo'])) {
	require('classes/classmanage.todo.php');
	
	$title = $_POST['title'];
	$description = $_POST['description'];
	$due_date = $_POST['due_date'];
	$label = $_POST['label_under'];

	
			$title =strip_tags($title);
			$description =strip_tags($description);
		     $title=mysqli_real_escape_string( $mysqli,$title);
		    $description=mysqli_real_escape_string( $mysqli,$description);
		    $username=$_SESSION['todo_name'];

			

			$init = new ManageTodo();
			$create_todo = $init->createToDo($username,$title,$description,$due_date,$label);
			if ($create_todo==1) {
				$sucess='Todo created successfully';
			}
		else 
		{
			$error='there was an error';
		}
		
}

?>