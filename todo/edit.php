<?php 
//include_once('classes/classmanage.todo.php');
include_once('statics/header.php');
include_once('libs/list_todo.php');
include_once('libs/edit_todo.php');
?>
<div id="mainContent" style="margin:40px">
	<div>
	<?php
if (isset($error)) {
		echo '<div class="alert alert-error">'.$error.'</div>';
	}	
	?>
	<?php
if (isset($sucess)) {
		echo '<div class="alert alert-sucess">'.$sucess.'</div>';
	}	
	?>
	<?php
	if (isset($_GET['id'])){
		$id = $_GET['id'];
			
	}?>
	</div>
 

