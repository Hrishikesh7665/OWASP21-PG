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

setcookie("jwt", "", time()-3600);

function base64UrlEncode($data) {
    $base64 = base64_encode($data);
    $urlSafe = strtr($base64, '+/', '-_');
    return rtrim($urlSafe, '=');
}

function generateOTP() {
    return mt_rand(100000, 999999); // Generate a random 6-digit OTP
}

function createJWT($user_mail) {
	$secret_key = "testJWT";
    $payload = array(
        "user_email" => $user_mail,
		"OTP" => generateOTP(),
    );
    $header = base64UrlEncode(json_encode(array(
        "alg" => "HS256",
        "typ" => "JWT"
    )));
    $payload = base64UrlEncode(json_encode($payload));
    $signature = base64UrlEncode(hash_hmac("sha256", $header . "." . $payload, $secret_key, true));
    $jwt = $header . "." . $payload . "." . $signature;
    return $jwt;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST['user_email'] ?? '';
    $password = $_POST['password'] ?? '';
    if (strlen($user_email) >= 4 && strlen($password) >= 4) {
		// $exp_time = time() + (500 * 60);
		$exp_time = time() + (5 * 60);
        switch ($user_email) {
            case "userXyz@gmail.com":
                if ($password === "password@123") {
                    $jwt = createJWT($user_email);
					setcookie("jwt", $jwt, $exp_time, "./", "", false, true);
					header("Location: otp.php");
					die();
                } else {
                    echo 'Invalid User/Password';
                }
                break;

            // case "userAbc@gmail.com":
            //     if ($password === "password@1234") {
            //         $jwt = createJWT($user_email);
			// 		setcookie("jwt", $jwt, $exp_time, "./", "", false, true);
			// 		header("Location: otp.php");
			// 		die();
            //     } else {
            //         echo 'Invalid User/Password';
            //     }
            //     break;

            default:
                echo 'User Not Exists';
                break;
        }
    } else {
        echo 'Forbidden';
    }
}

?>

<section id="main">
<div class="container" style="height: 300px;">
	<h1>Login</h1>
	<form class="login-form" method="post" action="#">
		<input type="email" placeholder="Email" name="user_email" class="field">
		<input type="password" placeholder="password" name="password" class="field">
		<input type="submit" value="login" class="btn">
	</form>
</div>
</section>

<div class="container2">
	<h3>Task</h3>
	<p>Using the userXyz OTP Login userAbc@gmail.com account</p>
	<p>Hint: userXyz@gmail.com/password@123</p>
</div>

<script>
	if (new URLSearchParams(window.location.search).get('p') == 'failed') alert('OTP Expired');
	if (new URLSearchParams(window.location.search).get('p') == 'signature') alert('JWT Signature Mismatched\nHint- 7(AaEeJjSsTtWwZz)');
	window.history.pushState({}, document.title, window.location.pathname);
</script>