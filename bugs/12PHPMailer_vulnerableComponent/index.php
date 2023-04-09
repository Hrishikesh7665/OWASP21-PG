<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<div class="container2">
      <h3>Task</h3>
      <p>1. First run smtp.py to Established a Fake SMTP Server</p>     
      <p>2. Try To Exploit Vulnerable PHPMailer Component</p>    
      <p><b>Hint:</b> CVE-2016-10033</p>    
</div>
<div class="container">  
  <form id="contact" action="" method="POST" enctype="multipart/form-data">
    <h3>Contact Us</h3>
    <h4></h4>
    <fieldset>
      <input name="name" placeholder="Your name" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input name="email" placeholder="Your Email Address" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <textarea name="message" placeholder="Type your Message Here...." tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
    <input type="hidden" name="action" value="submit">
  </form>
</div>

<pre>
<?php
if (isset($_REQUEST['action'])){
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $message=$_REQUEST['message'];
    if (($name=="")||($email=="")||($message=="")){
        echo "There are missing fields.";
    }else{		

        require 'PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = "localhost";
        $mail->Port = 1025; 

        $mail->setFrom($email, 'Vulnerable Server');
        $mail->addAddress('admin@vulnerable.com', 'Hacker');
        $mail->Subject  = "Message from $name";
        $mail->Body     = $message;
        if(!$mail->send()) {
            echo 'Message was not sent.';
            echo 'Mailer error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent.';
        }
    }
}

?>
</pre>
</body>
</html>
