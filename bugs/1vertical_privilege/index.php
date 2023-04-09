<style>
  *{
			box-sizing: border-box;
		}
		body{
			background-color: #3498DB;
			font-family: "Arial", sans-serif;
			padding: 50px;
		}
		.container{
			margin: 20px auto;
			padding: 10px;
			width: 300px;
			height: 300px;
			background-color: #fff;
			border-radius: 5px;
		}
    .container2{
			margin: 20px auto;
			padding: 10px;
			width: 550px;
			/* height: 300px; */
			background-color: #fff;
			border-radius: 5px;
		}
    /* .container2 p {

    } */
		 h1{
		 	width: 70%;
			color: #777;
			font-size: 32px;
			margin: 28px auto;
			margin-bottom: 20px;
			text-align: center;
			/*padding-top: 40px;*/
		}
    h3{
		 	width: 70%;
			color: #777;
			font-size: 18px;
			margin: 8px auto;
			margin-bottom: 20px;
			text-align: center;
			/*padding-top: 40px;*/
		}
		form{
			/*padding: 15px;*/
			text-align: center;
		}
		input{
			padding: 12px 0;
			margin-bottom: 10px;
			border-radius: 3px;
			border: 2px solid transparent;
			text-align: center;
			width: 90%;
			font-size: 16px;
			transition: border .2s, background-color .2s;
		}
		form .field{
			background-color: #ECF0F1;
		}
		form .field:focus {
			border: 2px solid #3498DB;
		}
		form .btn{
			background-color: #3498DB;
			color: #fff;
			line-height: 25px;
			cursor: pointer;
		}
		form .btn:hover,
		form .btn:active {
			background-color: #1F78B4;
			border: 2px solid #1F78B4;
		}
		.pass-link{
			text-align: center;
		}
		.pass-link a:link,
		.pass-link a:visited{
			font-size: 12px;
			color: #777;
		}
</style>


<?php

session_save_path(getcwd());
session_start();
if (isset($_SESSION['username'])) {
    session_destroy();
}

if (isset($_POST['username']) && isset($_POST['password'])) {
	// Check if the username and password are correct
	if ($_POST['username'] === 'admin' && $_POST['password'] === 'admin_password') {
		$_SESSION['username'] = 'admin';
		header('Location: dashboard_secured.php');
		exit();
	} elseif ($_POST['username'] === 'user_xyz' && $_POST['password'] === 'password') {
	$_SESSION['username'] = 'user_xyz';
	header('Location: dashboard.php');
	exit();
	} else {
	echo 'Incorrect username or password.';
	}
}
?>

<div class="container">
  <h1>Login</h1>
<form action="#" method="POST">
  <input type="text" placeholder="username" name="username" class="field">
  <input type="password" placeholder="password" name="password" class="field">
  <input type="submit" value="login" class="btn">
</form>
</div>

<div class="container2">
  <h3>Task</h3>
  <p>The web application has two user roles: "Admin" and "Regular User". Admin users have access to all data, while regular users have limited access to his/her personal data only your task is access admin dashboard without login as admin</p>
  <p>Hint: user_xyz/password</p>
</div>
