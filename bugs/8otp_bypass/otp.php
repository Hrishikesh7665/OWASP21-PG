<?php
session_save_path(getcwd());
session_start();

if (!isset($_SESSION['username'])){
	header('Location: index.php');
	die ();
}

function generate_otp() {
    $otp = strval(rand(100000, 999999)); // generate a random 6-digit OTP
    $otp_hash = md5($otp); // hash the OTP using MD5 algorithm
    return $otp_hash;
}

if ( isset($_POST['user_otp']) && isset($_POST['otp']) ) {
	if ($_POST['otp'] === md5($_POST['user_otp'])){
		header('Location: pass.php');
		die ();
	}else{
		header('Location: index.php?p=invalid_otp');
		die ();
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



<div class="container" style="height: 285px;"><h1>Login</h1><p style="text-align:center">Otp Send Successful to registered mobile number</p><form class="login-form" method="POST" action="#"><input type="number" placeholder="otp" name="user_otp" class="field"><input type="hidden" value="<?php echo generate_otp(); ?>" name="otp"><input type="submit" value="Verify" class="btn"></form></div>

<div class="container2">
	<h3>Task</h3>
	<p>Bypass the OTP</p>
	<p>Hint: user_xyz/password</p>
</div>

<script>
if (new URLSearchParams(window.location.search).get('p') == 'failed') alert('Invalid Username/Password');
window.history.pushState({}, document.title, window.location.pathname);
</script>