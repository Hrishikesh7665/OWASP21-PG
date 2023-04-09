<?php

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header('Location: index.html');
    die ();
}

if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['password'])){
    if ( md5($_POST['password']) === "b24331b1a138cde62aa1f679164fc62f"){
        echo 'Mission Complete!! Congratulations';
    }else {
        echo 'Try again';
    }
}
?>