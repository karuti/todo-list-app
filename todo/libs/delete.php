<?php
include_once('classes/classmanage.todo.php');
include_once('sessions.php');
$init= new ManageTodo();
if (isset($_GET['delete'])) {
$id = $_GET['delete'];
$delete= $init->deleteTodo($session_name,$id);
if ($delete ==1) {
	$sucess= 'one todo has been deleted';
	header("location:index.php?label=id");
}else{
	$error= 'sorry there was an error';
}
}
?>