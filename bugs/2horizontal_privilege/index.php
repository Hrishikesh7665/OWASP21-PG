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
if (isset($_COOKIE['UID'])) {
    setcookie("UID", "", time() - 3600, "./");
}

if (isset($_POST['username']) && isset($_POST['password'])) {
	// Check if the username and password are correct
	if ($_POST['username'] === 'user_abc' && $_POST['password'] === 'abc_password') {
		setcookie("UID", base64_encode('User1001'), time() + 86400, "./");
		header('Location: chat.php');
		exit();
	} elseif ($_POST['username'] === 'user_xyz' && $_POST['password'] === 'secret-password') {
		setcookie("UID", base64_encode('User1002'), time() + 86400, "./");
		header('Location: chat.php');
		exit();
	}else {
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
  <p>The web application has two user : "user ABC" and "user XYZ". booth the user has same privileges but they have different chat activity in their account you need to login with user ABC account and see the data of user XYZ account</p>
  <p>Hint: user_abc/abc_password</p>
</div>