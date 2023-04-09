<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header('Location: index.html');
    die ();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    $filename = $data['filename'];
    $fileData = $data['htmlcontent'];
    $handle = fopen($filename, "w");
    fwrite($handle, $fileData);
    fclose($handle);
    echo 'File Saved Success';
}
?>