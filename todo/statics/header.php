<?php
include_once('libs/sessions.php');

?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Arapey|Noto+Serif|Titan+One" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="utf-8">
	<title>Todo list</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

</head>
<body>
  <div id="header1">
   <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">TODO LIST</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?label=inbox" style="padding-right: 65px">Inbox </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?label=important" style="padding-right: 65px">Important</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?label=Read Later" style="padding-right: 65px">Read Later</a>
                </li>
                   <li class="nav-item">
                      <form  action="statics/search.php" method="GET" class="form-inline my-2 my-lg-0">
                <input name="query" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button  value="search"  class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
                </li>

                <li class="nav-item "  style="padding-left:505px">
                    <a class="nav-link">Welcome,<?php echo $_SESSION['todo_name'];?></a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="logout.php?"><button type="button" class="btn btn-danger">LOGOUT</button></a>
                </li>
            </ul>
        </div>
    </nav></div>
    <div style="padding-left: 900px;"><button class="btn btn-success" ><a href="statics/TCPDF-master/generatepdf.php">Click to generate a pdf summary<a></button></div>
	  <!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div id="navbar" class="collapse navbar-collapse">
           <li class="navbar navbar-right nav-item" style="color:white">Welcome,<?php# echo $_SESSION['todo_name'];?> <br><a class="btn btn-danger" href="logout.php">Logout</a></li>
        </div><!--/.nav-collapse -->
    <!-- </nav>
   
 <!--<div id="mainWrapper">
	<div id="td_container">
		<div id="sidebar">
			<nav class="nav flex-column">
  					<a class="nav-link active" href="index.php?label=inbox">Inbox</i></a>
  					<a class="nav-link" href="index.php?label=Read Later">Read Later</a>
  					<a class="nav-link" href="index.php?label=Important">Important</a>
  				
				</nav>
		</div>-->