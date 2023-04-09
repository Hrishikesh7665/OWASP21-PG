<?php
function createCookie(){
    $userData = array(
        'username' => 'visitor',
        'role' => array(
            'name' => 'visitor',
            'admin' => false
        )
    );
    $serialized = serialize($userData);
    $digest = hash('sha256', $serialized);
    $combined = $serialized . $digest;
    $encoded = base64_encode($combined);
    return (urlencode($encoded));
}

function checkCookie($val){
    $encoded = urldecode($val);
    $decoded = base64_decode($encoded);
    $serializedData = substr($decoded, 0, -64);
    $messageDigest = substr($decoded, -64);
    if ($messageDigest === hash('sha256', $serializedData)) {
        $data = unserialize($serializedData);
        $isAdmin = $data['role']['admin'];
        return $isAdmin;
    } else {
        return null;
    }
}

function printMSG(){
    echo '<!DOCTYPE html>
    <html>
    <head>
        <style>
            .card {
                background-color: #ffffff;
                box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
                border-radius: 5px;
                padding: 20px;
                margin: 0 auto;
                max-width: 500px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h2 style="text-align:center;">You don\'t have permission to check the logs</h2>
        <div class="card" style="margin-top:50px;">
            <h3>Task :</h3>
            <p><b>Access the log\'s</b></p>
        </div>
    </body>
    </html>
    ';
}
error_reporting(E_ALL & ~E_WARNING);
if(isset($_COOKIE['token'])) {
    try {
        $check = checkCookie($_COOKIE['token']);
    } catch (Exception $e) {
        echo '<h1 style="color:red; text-align:center;"> Data Manipulation Detected !!!</h1>';
        printMSG();
        die();
    }
    if(is_null($check)){
    setcookie("token", createCookie(), time()+3600);
    echo '<h1 style="color:red; text-align:center;"> Data Manipulation Detected !!!</h1>';
    printMSG();
    die();
    }else if ($check){
        echo '<h2>Welcome Administrator</h2><br/>';
    }else{
        printMSG();
        die();
    }
} else {
    setcookie("token", createCookie(), time()+3600);
    printMSG();
    die();
}


$access_log = file_get_contents('./logs/access.log');
$error_log = file_get_contents('./logs/error.log');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log Files</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f7f7f7;
			color: #333;
			padding: 20px;
		}

		h1 {
			font-size: 24px;
			margin-top: 0;
		}

		pre {
			background-color: #fff;
			border: 1px solid #ccc;
			padding: 10px;
			overflow-x: auto;
		}
	</style>
</head>
<body>
	<h1>Access Log</h1>
	<pre><?php echo $access_log; ?></pre>

	<h1>Error Log</h1>
	<pre><?php echo $error_log; ?></pre>
</body>
</html>
