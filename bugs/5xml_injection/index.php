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
			height: 325px;
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
// ini_set("display_errors", 1);

$message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['login']) && isset($_POST['password']))
	{
		$login = $_REQUEST["login"];
		$password = $_REQUEST["password"];
		$xml = simplexml_load_file("heroes.xml");
		$result = $xml->xpath("/heroes/hero[login='" . $login . "' and password='" . $password . "']");
		if($result)
		{
			$message =  "<span style='color:green'>Welcome <b>" . ucwords($result[0]->login). "</span>";
		}
		else
		{
			$message = "<span style='color:red'>Invalid credentials!</span>";
		}
	}
}

?>

<div class="container">
  <h1>Login</h1>
  <p style="text-align:center"><?php echo $message;?></p>
<form action="#" method="POST">
  <input type="text" placeholder="username" name="login" class="field">
  <input type="password" placeholder="password" name="password" class="field">
  <input type="submit" value="login" class="btn">
</form>
</div>

<div class="container2">
  <h3>Task</h3>
  <p>Login as Thor</p>
</div>