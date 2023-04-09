<style>
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
function getHashedPassword($login) {
    $xml = simplexml_load_file('heroes.xml');
    foreach ($xml->hero as $hero) {
        if ((string) $hero->login === $login) {
            return (string) $hero->password;
        }
    }
    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user_name'] ?? '';
    $password = $_POST['password'] ?? '';
    if (strlen($user) >= 4 && strlen($password) >= 4) {
		$saved_pass = getHashedPassword($user);
		if ($saved_pass === false){
			header ('Location: index.php?p=error');
			die();
		} else{
			if (password_verify($password, $saved_pass)){
				echo '<!DOCTYPE html>
            <html lang="en">
			<head>
			  <meta charset="UTF-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1.0">
			</head>
			<body>
			  <h1>Welcome '.$user.'</h1>
			  <p><a href="index.php" style="text-decoration: none;">Click Here to logout</a></p>
			  <script>
				  window.history.pushState({}, "", "index.php");
			  </script>
			</body>
		  </html>';
		  die();
			} else {
				header ('Location: index.php?p=error');
				die();
			}
		}
	}
	else {
		header ('Location: index.php?p=error');
		die();
	}
}
?>

<section id="main">
<div class="container" style="height: 310px;">
	<h1>Login</h1>
	<form class="login-form" method="post" action="#">
		<input type="text" placeholder="Username" name="user_name" class="field">
		<input type="password" placeholder="password" name="password" class="field">
		<input type="submit" value="login" class="btn">
		<p style="margin-top: 5px;"><a href="passReset.php" style="text-decoration: none;">Forget Password?</a></p>
	</form>
</div>
</section>


<div class="container2">
	<h3>Task</h3>
	<p>Reset the userABC password</p>
	<p>Assume that you are userXYZ</p>
</div>

<script>
	if (new URLSearchParams(window.location.search).get('p') == 'error') alert('Invalid Username/Password');
	window.history.pushState({}, document.title, window.location.pathname);
</script>