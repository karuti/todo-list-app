<?php 
include 'libs/list_todo.php';
include 'statics/header.php';
include_once('libs/delete.php');
 ?>
<!DOCTYPE html>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="utf-8">
	<title>Todo list</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
</head>
<body>
<div id="mainWrapper">
	<div class="main">
	<!--	<div id="sidebar">
				<nav class="nav flex-column">
  					<a class="nav-link active" href="#">Inbox</i></a>
  					<a class="nav-link" href="#">Read Later</a>
  					<a class="nav-link" href="#">Important</a>
  				
				</nav>
		</div><!-- end sidebar-->
		<div id="mainContent" class="clearfix">
			<div id="head">
				<h2>Manage Todo</h2>
				<div id="add_more">
					<a href="add_new.php" class="btn btn-secondary"> +Add new</a>
				</div>
			</div><!-- end head-->
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
  
		<table class="table table-hover">
  		<thead>
    		<tr>
      				<th scope="col">Title</th>
      				<th scope="col">Snippet</th>
      				<th scope="col">Due Date</th>
     			    <th scope="col">Time Left</th>
     			    <!--<th scope="col">Progress</th>-->
     			    <th scope="col">Actions</th>
   			 </tr>
  		</thead>
  		<tbody>
  			<tr>
       <?php
       if ($list_todo !== 0) {
        foreach ($list_todo as $key => $value) {
         $today=strtotime("now");
         $due_date=strtotime($value['due_date']);
         if ($due_date>$today) {
          $hours=$due_date-$today;
         $hours= $hours /3600;
         $time_left= $hours/24;
         if ($time_left<1) {
           $time_left='less than one day';
         }else{
          $time_left = round($time_left).'days remaining';
             }
        }
         else{
             $time_left='expired';
         }
       
         ?>
          <td><?php echo $value['title'];?></td>
          <td><?php echo $value['description'];?></td>
          <td><?php echo $value['due_date'];?></td>
          <td><?php echo $time_left ; ?></td>  
         <!-- <td>
              <div class="progress">  
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php #echo $value['progress']; ?>%"></div>
              </div>
          </td>-->
          <td>
            <a href="edit.php?id=<?php echo $value['id'];?>" title = "<?php echo $value['title']; ?>" > Edit</a>|
             <a href="index.php?delete=<?php echo $value['id'];?>" title = "<?php echo $value['title']; ?>" > Delete</a> 
          </td>
        </tr>
       <?php
        }
        
           }
         else{
          echo '<td>sorry no more todo in this section</td>';
         }
       ?>   
       
  		</tbody>
		</div><!-- end of main body-->


		</div><!-- end main content-->
	</div><!--end-->
</div><!--end of main wrapper-->
</body>
</html>