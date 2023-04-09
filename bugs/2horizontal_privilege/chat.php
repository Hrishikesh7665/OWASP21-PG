<?php 
if (!isset($_COOKIE['UID'])) {
    header('Location: index.php');
    die();
}else {
    $user_ID = $_COOKIE['UID'];
    $user_ID =  base64_decode($user_ID);
    if ($user_ID == "User1001"){
        $user_Name = "User ABC";
    }elseif ($user_ID == "User1002"){
        $user_Name = "User XYZ";
    }
    else{
        echo 'User Does Not Exist';
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Welcome</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



    <div class="col-12" style="height: 100vh">
        <div class="chat-area">
        <div class="chatlist">
        <div class="modal-dialog-scrollable">
            <div class="modal-content">
                <div class="chat-header">
                        <h3 style="text-align:center;"><?php echo $user_Name; ?></h3>
        <?php
            if ($user_ID == "User1001"){
                include_once("./user1001.php") ; 
            }elseif ($user_ID == "User1002"){
                include_once("./user1002.php") ; 
            }
        ?>
        
        </div>


    </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- partial -->
  <script  src="./script.js"></script>
  <script>
    let newTitle = '<?php echo "Welcome ".$user_Name; ?>';
    if (document.title != newTitle) {
        document.title = newTitle;
    }
    $('meta[name="description"]').attr("content", newDescription);
</script>
</body>
</html>
