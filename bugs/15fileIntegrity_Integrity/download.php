<?php
if(isset($_GET['username']) && !empty($_GET['username'])){
  $username = $_GET['username'];
} else {
  header('Location: index.html');
  exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Download Page</title>
  </head>
  <body>
    <style>
        body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background-color: #f5f5f5;
}

.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 50px;
  text-align: center;
}

h1 {
  font-size: 36px;
  margin-bottom: 30px;
}

p {
  font-size: 18px;
  line-height: 1.5;
  margin-bottom: 40px;
}

.button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #1abc9c;
  color: #fff;
  font-size: 16px;
  font-weight: bold;
  text-decoration: none;
  border-radius: 5px;
  transition: all 0.2s ease-in-out;
}

.button:hover {
  background-color: #148f77;
}

    </style>
    <div class="container">
      <h1>Welcome <?php echo $username;?></h1>
      <p>Thank you for choosing to download our file. To download it, please click the button below.</p>
      <a href="real.exe" class="button">Download File</a>
    </div>
  </body>
</html>
