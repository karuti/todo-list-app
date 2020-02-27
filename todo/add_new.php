<?php
include_once('statics/header.php');
include_once('libs/create_todo.php');
?>
<div id="mainContent" style="margin: 25px">
	<div id="head">
		<h2>Create Todo</h2>
	</div>
	<form method="post" action="add_new.php">
<div id="mainBody">
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

  <div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="title" name="title"placeholder="your title....." required>
    </div>
  </div>
  <div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label"> Description</label>
    <div class="col-sm-10">
      <textarea id="description" name="description"  cols = "70" placeholder="write here..." required></textarea> 
    </div>
  </div>
  <div class="form_group row">
		<label for = "title" class="col-sm-2 col-form-label">Due date</label>
		<div class="col-sm-10">
		<input type="text" id="datepicker" name="due_date" autocomplete="off" required>
	</div>
	</div>
  <div class="form_group row">
		 <label for="label" class="col-sm-2 col-form-label"> Label Under</label>
    <div class="col-sm-10">
		<select name="label_under" id="label_under" required>
			<option>Select</option>
			<option>Inbox</option>
			<option>Read Later</option>
			<option>Important</option>
		</select>
	</div>
  <div class="form-group row">
  	  <div class="col-sm-10" >
		<input type="submit" name="create_todo" value="create" id="create_todo" class="btn btn-primary">
</div>  
    </div>
  </div>
</form>  

</div>