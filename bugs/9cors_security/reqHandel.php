<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header('Location: index.html');
    die ();
}

header("Content-Type: text/plain");
if(isset($_SERVER["HTTP_ORIGIN"]) and $_SERVER["HTTP_ORIGIN"] == "http://hrishikesh7665.web.app")
{
    header("Access-Control-Allow-Origin: http://hrishikesh7665.web.app");
	echo "Congratulations...... You Passed the mission";
	
}
else
{
    echo "Hahaha...... No Secret for you. Try again ;)";
}
?>