<?php
error_reporting(E_ERROR | E_PARSE);

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    echo 'Invalid Link or Link Expired, please try again';
    die();
});

try {
    $userHash = urldecode($_GET['reset']);
} catch (Exception $e) {
    echo 'Invalid Link or Link Expired, please try again';
    die();
}

function getUsernameFromHash($hash) {
    $xml = simplexml_load_file('heroes.xml');
    foreach ($xml->hero as $hero) {
        if (sha1((string)$hero->login) === $hash) {
            return (string)$hero->login;
        }
    }
    return false;
}

$user_name = getUsernameFromHash($userHash);
if ($user_name === false){
    echo 'Invalid Link or Link Expired, please try again';
    die();
}

function updatePassword($login, $newPassword) {
    $heroesXml = simplexml_load_file('heroes.xml');
    $hero = $heroesXml->xpath("/heroes/hero[login='$login']");
    if ($hero) {
        $hero[0]->password = password_hash($newPassword, PASSWORD_DEFAULT);
        $heroesXml->asXML('heroes.xml');
        return true;
    }
    return false;
}


$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pass1 = $_POST['pass1'] ?? '';
    $pass2 = $_POST['pass2'] ?? '';
    if (strlen($pass1) >= 4 && $pass1===$pass2) {
        if (updatePassword($user_name, $pass1)) {
            echo '<!DOCTYPE html>
            <html lang="en">
              <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
              </head>
              <body>
                <h1>'.$user_name.' Password changed successfully</h1>
                <p><a href="index.php" style="text-decoration: none;">Click Here to login</a></p>
                <script>
                    window.history.pushState({}, "", "index.php");
                </script>
              </body>
            </html>';
            die();
        } else {
            echo 'Error updating password';
            die();
        }
    }
    else{
        $msg = "Invalid Password";
    }
}
?>


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

<section id="main">
<div class="container" style="height: 325px;">
	<h1>New Password</h1>
    <p style="text-align:center"><?php echo $msg; ?></p>
	<form class="login-form" method="post" action="#" id="resetForm">
		<input type="password" placeholder="New Password" name="pass1" id="pass1" class="field">
		<input type="password" placeholder="Conform Password" name="pass2" id="pass2" class="field">
		<input type="submit" value="Change Password" class="btn">
	</form>
</div>
</section>

<script>
const Form = document.getElementById("resetForm");
Form.addEventListener('submit', (event) => {
    event.preventDefault();
    const pass1 = document.getElementById("pass1").value;
    const pass2 = document.getElementById("pass2").value;
    if (pass1 != pass2) {
      alert("Passwords do not match");
      return false;
    }
    else if (pass1.length < 4) {
      alert("Password should be at least 4 characters long");
      return false;
    }else {
        Form.submit();
    }
});
</script>