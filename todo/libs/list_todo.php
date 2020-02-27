<?php
include 'classes/classmanage.todo.php';
include 'libs/sessions.php';
$init=new ManageTodo();
if (isset($_GET['id']))
 {
	$id = $_GET['id'];
	$list_todo = $init-> getList($id);



}else{
	if (isset($_GET['label'])) {
	$label = $_GET['label'];
	$list_todo = $init->ListToDo($session_name,$label);
}else{
	$list_todo = $init->ListToDo($session_name);
}
}
?>