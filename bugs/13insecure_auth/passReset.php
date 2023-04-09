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

function checkUserExists($username) {
    $xml = simplexml_load_file('heroes.xml');
    foreach ($xml->hero as $hero) {
        if ($hero->login == $username) {
            return true;
        }
    }
    return false;
}

$msg = "";
$link = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user_name'] ?? '';
    if (strlen($user) >= 4) {
        if (checkUserExists($user)){
            if ($user === 'userXYZ'){
                $msg = "Password Reset Link send to console";
                $link = $_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME'])."/newPassword.php?reset=".urlencode(sha1($user));
            }else {
                $msg = "Password Reset Link send to registered email address";
            }
        }
        else{
            $msg = "Invalid username";
        }
	}
	else {
        $msg = "Invalid username";
	}
}
?>

<div class="container" style="height: 305px;">
    <h1>Password Reset</h1>
    <p style="text-align:center"><?php echo $msg; ?></p>
    <form class="login-form" method="POST" action="#">
        <input type="text" placeholder="Username" name="user_name" class="field">
        <input type="submit" value="Verify" class="btn">
    </form>
</div>

<div class="container2">
	<h3>Task</h3>
	<p>Reset the userABC password</p>
	<p>Assume that you are userXYZ</p>
</div>


<script>
const msg = "<?php echo $link; ?>";
if (msg){
    console.log(msg);
}
</script>