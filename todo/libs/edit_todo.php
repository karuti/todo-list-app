<?php
if (isset($_POST['edit_todo'])) {
	include_once('classes/classmanage.todo.php');
	include_once('sessions.php');
	$init= new ManageTodo();
	$username= $session_name;
    $id= $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $label = $_POST['label_under'];

    if (!empty($username && $id)) {
        $edit=$init->editTodo($username,$id,$title,$description,$due_date,$label);
        echo "edited successfully";
       
    }
}
?>