<?php

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header('Location: index.html');
    die ();
}

if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['email']) && isset($_POST['confirm']) && isset($_POST['pass']) && $_POST['pass'] ===  $_POST['confirm']){
    $email = base64_decode($_POST['email']);
    $msg = base64_encode('Password reset successfully for ' . $email);
    echo $msg;
}
?>