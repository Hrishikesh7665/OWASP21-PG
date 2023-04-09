<?php
error_reporting(E_ERROR | E_PARSE); 
ini_set('display_errors', 0);

if(isset($_GET ['url'])){
	try{
		$url= $_GET['url'];
		$check=parse_url($url);
		if($check["scheme"]==null){
			die('NO protocal present : request error');
		}
		$image = fopen($url, 'rb');
		header("Content-Type: image/png");
		fpassthru($image);
	}
	catch (ValueError $e) {
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}
?>

<style>
    * {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body {
	font-family: Arial, sans-serif;
	color: #333;
}

header {
	background-color: #c8d6e5;
	padding: 20px;
	text-align: center;
}

header h1 {
	font-size: 36px;
	margin: 0;
}

main {
	max-width: 800px;
	margin: 0 auto;
	padding: 20px;
}

section {
	margin-bottom: 40px;
}

section h2 {
	font-size: 24px;
	margin-bottom: 20px;
}

form {
	display: flex;
}

input[type="text"] {
	flex: 1;
	padding: 10px;
	border: none;
	border-radius: 4px 0 0 4px;
	background-color: #f5f5f5;
}

button[type="submit"] {
	background-color: #576574;
	color: #fff;
	padding: 10px;
	border: none;
	border-radius: 0 4px 4px 0;
	cursor: pointer;
}

button[type="submit"]:hover {
	background-color: #303952;
}

.container {
    margin: 20px auto;
    margin-top: 80px;
    padding: 10px;
    width: 500px;
    background-color: #f5f5f5;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
	justify-content: center;
}

.container h3 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
	text-align: center;
    margin: 0;
    margin-bottom: 5px;
}

.container p {
    font-size: 18px;
    color: #666;
    line-height: 1.5;
}

</style>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<header>
		<h1>Image Downloader</h1>
	</header>

	<main style="margin-top: 100px;">
		<section>
			<h2>Enter Image URL</h2>
			<form action='.' method='GET'>
				<input type="text" placeholder="https://example.com/image.jpg" name='url'>
				<button type="submit">Download Image</button>
			</form>
		</section>
		<div class="container">
			<h3>Task</h3>
			<p>Get Contain of secret.php by exploiting SSRF</p>
			<p><b>Hint:</b> ../secret/superSecret.php</p>
		</div>
    </main>
</body>
</html>
