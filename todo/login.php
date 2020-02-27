<?php
require'libs/login_users.php';
?>
<script>
			function checkEmail(str) {
				if (str.length == 0) {
					document.getElementById("emailfeedback").innerHTML = "";
					return;
				} else {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("emailfeedback").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET", "checkemail.php?email=" + str, true);
					xmlhttp.send();
				}
			}
		</script>
	</head>


<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Arapey|Noto+Serif|Titan+One" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>TO DO LIST</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <!-- <script type="text/javascript">
    	$(function(){
    		$('#show_register').click(function(){
    			$('.login_form').hide();
    			$('.register_form').show();
    			return false;
    		});
    		$('#show_login').click(function(){
    			$('.login_form').show();
    			$('.register_form').hide();
    			return false;
    	});
    		});
    		


    </script>-->
    <style type="text/css">
    	body{
    		background-image: url('marble.jpg');
    	}
    	#mainWrapper h1{
    		font-family:'Noto Serif', serif;
    		text-align: center;
    		padding-left: 350px;
    		 font-size: 45px;

    	}
    	#mainWrapper h4{
       font-family: 'Arapey', serif;
       text-align: center;
       padding-left: 300px;
       font-size: 35px;
}
#content{
	text-align: center;
	padding-top: 100px;
	padding-left: 600px;
    </style>
</head>
<body>
	<div id="mainWrapper">
	<div class="navbar" >
		<div class="navbar-inner">
			<div class="container">
			<center><a class="brand"><h1>TO DO LIST</h1></a>
				<h4>Welcome to TODO LIST.<br>Your  convinient note taking app.Capture every detail on the go</h4>
				</center>
			</div>
		</div>
	</div><!-- end navbar-->
	<div id="content">
		<?php
				if (isset($error)) {
					echo '<div class="alert alert-error">'.$error.'</div>';
				}

		?>

		<div class="login_form" class="row" >
			<div id="form" class="col-8 col-md-4">
			<form method="post" action="login.php">
			<h2>LOGIN</h2>
			<div class="form-group">
				<label for="username">username</label>
				<input class="form-control" type="text" name="login_username" id="username"/>
			</div>
			<div class="form-group">
				<label for="username">password</label>
				<input class="form-control" type="password" name="login_password" id="password"/>
			</div>
			<div class="form-group">
				<input type="submit" name="login" id="login" class="btn btn-success" value="login" />
			</div>
			<div class="form-group">
				<a href="#" id="show_register" data-toggle="modal" data-target="#modal">Don't have an account?</a>
			</div>
		</form>
		</div>
   <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="login.php">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">REGISTER</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
      	<div class="form-group">
				<label for="username">username</label>
				<input class="form-control" type="text" name="username" id="username"/>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input class="form-control" type="text" name="email" id="email" onkeyup="checkEmail(this.value)"/>
	
      	<div id="emailfeedback" style="color: red; padding: 5px; border: 1;"></div>
			</div>
			<div class="form-group">
				<label for="username">password</label>
				<input class="form-control" type="password" name="password" id="password"/>
			</div>
			<div class="form-group">
				<label for="username">repeatpassword</label>
				<input class="form-control" class="form-control" type="password" name="repassword" id="repassword"/>
			</div>
        
      </div>
      <div class="modal-footer">
        
        <div class="form-group">
				<input type="submit" name="register" id="register" class="btn btn-success" value="register" />
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			<div class="form-group">
				<a href="login.php+" id="show_login">Already have an account?</a>
			</div>
      </div>
    </form>
    </div>
  </div>
</div>



		<!-- end of login form-->
<!--
		<div class="register_form">
		<div id="form">
			<form method="post" action="login.php">
			<h2>Register</h2>
			<div class="form-elements">
				<label for="username">username</label>
				<input type="text" name="username" id="username"/>
			</div>
			<div class="form-elements">
				<label for="email">Email</label>
				<input type="text" name="email" id="email"/>
			</div>
			<div class="form-elements">
				<label for="username">password</label>
				<input type="password" name="password" id="password"/>
			</div>
			<div class="form-elements">
				<label for="username">repeatpassword</label>
				<input type="password" name="repassword" id="repassword"/>
			</div>
			<div class="form-elements">
				<input type="submit" name="register" id="register" class="btn btn-success" value="register" />
			</div>
			<div class="form-elements">
				<a href="#" id="show_login">Already have an account?</a>
			</div>
			</form>
			</div>
		</div> end of reg form-->
		<!--<div class="modal" id="modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<div class="modal-title"><h1>REGISTER</h1><button class="close" data-dismiss="modal">&times;</button></div>
						<div class="modal-body">
							
					<form method="post" action="login.php">
			
			<div class="form-group">
				<label for="username">username</label>
				<input type="text" name="username" id="username" class="form-control" />
			</div>
			<div class="form-elements">
				<label for="email">Email</label>
				<input type="text" name="email" id="email"/>
			</div>
			<div class="form-elements">
				<label for="username">password</label>
				<input type="password" name="password" id="password"/>
			</div>
			<div class="form-elements">
				<label for="username">repeatpassword</label>
				<input type="password" name="repassword" id="repassword"/>
			</div>
			
			</form>
						</div>
						<div class="modal-footer">
							<div class="form-elements">
				<input type="submit" name="register" id="register" class="btn btn-success" value="register" />

			</div>
			<div class="form-elements">
				<a href="#" id="show_login">Already have an account?</a>
				<button class="close" data-dismiss="modal">close</button>
			</div>
						</div>
					</div>
				</div>
			</div>
	
		</div>-->
	</div>	
	</div>

</body>
</html>