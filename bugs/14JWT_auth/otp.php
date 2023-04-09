<?php
function verifyJWT($jwt) {
    $secret_key = "testJWT";
    $parts = explode(".", $jwt);
    if (count($parts) != 3) {
        return false;
    }
    $header = json_decode(base64UrlDecode($parts[0]), true);
    $payload = json_decode(base64UrlDecode($parts[1]), true);
    $signature = base64UrlDecode($parts[2]);
    $expected_signature = hash_hmac("sha256", $parts[0] . "." . $parts[1], $secret_key, true);
    if ($signature !== $expected_signature) {
        return false;
    }
    return $payload;
}

function base64UrlDecode($str) {
    $base64 = strtr($str, '-_', '+/');
    return base64_decode($base64);
}


if (!isset($_COOKIE['jwt'])) {
	header("Location: index.php?p=failed");
	die();
} else {
	$jwt = $_COOKIE['jwt'];
	$jwt_decrypted = verifyJWT($jwt);
	if (verifyJWT($jwt) === false) {
		header("Location: index.php?p=signature");
		die();
	} else {
		$otp = $jwt_decrypted['OTP'];
		$email = $jwt_decrypted['user_email'];
	}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ( isset($_POST['user_otp']) ) {
		if ($_POST['user_otp'] == $otp){
			setcookie("jwt", "", time()-3600);
			echo '
        <!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Mission Complete</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

</head>
<body>
<h1>User '.$email.' Was Verfied</h1>
</body>
</html>';
die();
		}else{
			header("Location: otp.php?p=failed");
			die();
		}
	}
}
?>


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



<div class="container" style="height: 285px;">
	<h1>Login</h1>
	<p style="text-align:center">Otp Send Successful to your console</p>
	<form class="login-form" method="POST" action="#">
		<input type="number" placeholder="otp" name="user_otp" class="field">
		<input type="submit" value="Verify" class="btn">
	</form>
</div>

<div class="container2">
	<h3>Task</h3>
	<p>Using the userXyz OTP Login userAbc@gmail.com account</p>
	<p>Hint: userXyz@gmail.com/password@123</p>
</div>

<script>
	console.log('Your OTP is <?php echo $otp;?> valid for 4 minutes');
	if (new URLSearchParams(window.location.search).get('p') == 'failed') alert('Invalid OTP');
	window.history.pushState({}, document.title, window.location.pathname);
</script>