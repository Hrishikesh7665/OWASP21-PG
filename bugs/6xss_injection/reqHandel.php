<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header('Location: index.php');
    die ();
}
if (isset($_GET["title"])) {
    $movies = array("WATCHES", "BAGS", "SHOES", "PURSE", "SHIRT");
    $title = $_GET["title"];
    header("Content-Type: text/json; charset=utf-8");
    if (in_array(strtoupper($title), $movies))
        echo '{"movies":[{"response":"Yes! We have that"}]}';
    else if (trim($title) == "")
        echo '{"movies":[{"response":"Search for Anything :)"}]}';
    else
        echo '{"movies":[{"response":"' . $title . '??? Sorry, we don\'t have that :("}]}';
} else {
    echo "<font color=\"red\">Try harder :p</font>";
}
?>