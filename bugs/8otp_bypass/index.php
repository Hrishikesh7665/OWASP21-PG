<style>
	/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

	* {
		box-sizing: border-box;
	}

	body {
		background-color: #3498DB;
		font-family: "Arial", sans-serif;
		padding: 50px;
	}

	.container {
		margin: 20px auto;
		padding: 10px;
		width: 300px;
		/* height: 300px; */
		background-color: #fff;
		border-radius: 5px;
	}

	.container2 {
		margin: 20px auto;
		padding: 10px;
		width: 550px;
		/* height: 300px; */
		background-color: #fff;
		border-radius: 5px;
	}

	/* .container2 p {

    } */
	h1 {
		width: 70%;
		color: #777;
		font-size: 32px;
		margin: 28px auto;
		margin-bottom: 20px;
		text-align: center;
		/*padding-top: 40px;*/
	}

	h3 {
		width: 70%;
		color: #777;
		font-size: 18px;
		margin: 8px auto;
		margin-bottom: 20px;
		text-align: center;
		/*padding-top: 40px;*/
	}

	form {
		/*padding: 15px;*/
		text-align: center;
	}

	input {
		padding: 12px 0;
		margin-bottom: 10px;
		border-radius: 3px;
		border: 2px solid transparent;
		text-align: center;
		width: 90%;
		font-size: 16px;
		transition: border .2s, background-color .2s;
	}

	form .field {
		background-color: #ECF0F1;
	}

	form .field:focus {
		border: 2px solid #3498DB;
	}

	form .btn {
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

	.pass-link {
		text-align: center;
	}

	.pass-link a:link,
	.pass-link a:visited {
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['username']) && isset($_POST['password'])) {
		if ($_POST['username'] === 'user_xyz' && $_POST['password'] === 'password') {
			$_SESSION['username'] = 'user_xyz';
			header('Location: otp.php');
			die ();
		}else{
			header('Location: index.php?p=failed');
			die ();
		}
	}
}
?>

<section id="main">
<div class="container" style="height: 300px;">
	<h1>Login</h1>
	<form class="login-form" method="post" action="#">
		<input type="text" placeholder="username" name="username" class="field">
		<input type="password" placeholder="password" name="password" class="field">
		<input type="submit" value="login" class="btn">
	</form>
</div>
</section>

<div class="container2">
	<h3>Task</h3>
	<p>Bypass the OTP</p>
	<p>Hint: user_xyz/password</p>
</div>

<script>
if (new URLSearchParams(window.location.search).get('p') == 'failed') alert('Invalid Username/Password');
if (new URLSearchParams(window.location.search).get('p') == 'invalid_otp') alert('Invalid OTP');
window.history.pushState({}, document.title, window.location.pathname);
</script>