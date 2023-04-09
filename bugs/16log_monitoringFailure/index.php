<?php
$logFile = fopen('./debugging/logs/requests.log', 'a');
$ipAddress = $_SERVER['REMOTE_ADDR'];
$requestedPage = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
$logMessage = date('Y-m-d H:i:s') . ' ' . $ipAddress . ' ' . $requestMethod . ' ' . $requestedPage;

if ($requestMethod == 'PUT' || $requestMethod == 'POST') {
    $data = file_get_contents('php://input');
    if (empty($data) && $requestMethod == 'POST') {
        $data = json_encode($_POST);
    }else if (empty($data) && $requestMethod == 'PUT') {
        $data = json_encode($_PUT);
    }
    $logMessage .= ' ' . $data;
}

// echo password_hash("MySuperSecretPassword#2021", PASSWORD_DEFAULT);

$loginSus = false;

if ($requestMethod == 'POST'){
    if (isset($_POST['email']) && isset($_POST['pass'])){
        if ($_POST['email'] === 'test@example.com' && password_verify($_POST['pass'], '$2y$10$jTb/cOeCviDw12uhzSaxU.PUGY/LW.XrxfuCqi47IxnmVAUnf/YVa')){
            $logMessage .= ' '. 'Susses';
            $loginSus = true;
        }
    }

}

$logMessage .= "\n";
fwrite($logFile, $logMessage);
fclose($logFile);

if($loginSus){
    echo '<!DOCTYPE html>
    <html lang="en" >
    <head>
      <meta charset="UTF-8">
      <title>Mission Complete</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    
    </head>
    <body>
    <style>
    @-webkit-keyframes thanks {
        from {
          transform: translate3d(0, -3rem, 0);
        }
        to {
          transform: translate3d(0, 0, 0);
        }
      }
      @keyframes thanks {
        from {
          transform: translate3d(0, -3rem, 0);
        }
        to {
          transform: translate3d(0, 0, 0);
        }
      }
      @-webkit-keyframes success-icon-animation {
        from {
          opacity: 0;
          transform: scale(0.1) rotate(30deg);
          transform-origin: center bottom;
        }
        50% {
          transform: rotate(-10deg) scale(1.25);
        }
        70% {
          transform: rotate(3deg);
        }
        to {
          opacity: 1;
          transform: scale(1);
        }
      }
      @keyframes success-icon-animation {
        from {
          opacity: 0;
          transform: scale(0.1) rotate(30deg);
          transform-origin: center bottom;
        }
        50% {
          transform: rotate(-10deg) scale(1.25);
        }
        70% {
          transform: rotate(3deg);
        }
        to {
          opacity: 1;
          transform: scale(1);
        }
      }
      .success-block {
        display: flex;
        align-items: center;
      }
      .success-block .title {
        font-size: 3.5rem;
        font-weight: bold;
      }
      .success-block .title > span {
        display: inline-block;
        opacity: 1;
        transition: transform 0.3s, opacity 0.3s;
        transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
        -webkit-animation: thanks 0.3s forwards;
                animation: thanks 0.3s forwards;
        margin: 0 -1px;
      }
      .success-block .title > span:nth-child(1) {
        -webkit-animation-delay: 0.045s;
                animation-delay: 0.045s;
      }
      .success-block .title > span:nth-child(2) {
        -webkit-animation-delay: 0.09s;
                animation-delay: 0.09s;
      }
      .success-block .title > span:nth-child(3) {
        -webkit-animation-delay: 0.135s;
                animation-delay: 0.135s;
      }
      .success-block .title > span:nth-child(4) {
        -webkit-animation-delay: 0.18s;
                animation-delay: 0.18s;
      }
      .success-block .title > span:nth-child(5) {
        -webkit-animation-delay: 0.225s;
                animation-delay: 0.225s;
      }
      .success-block .title > span:nth-child(6) {
        -webkit-animation-delay: 0.27s;
                animation-delay: 0.27s;
      }
      .success-block .title > span:nth-child(7) {
        -webkit-animation-delay: 0.315s;
                animation-delay: 0.315s;
      }
      .success-block .title > span:nth-child(8) {
        -webkit-animation-delay: 0.36s;
                animation-delay: 0.36s;
      }
      .success-block .title > span:nth-child(9) {
        -webkit-animation-delay: 0.405s;
                animation-delay: 0.405s;
      }
      .success-block .title > span:nth-child(10) {
        -webkit-animation-delay: 0.45s;
                animation-delay: 0.45s;
      }
      .success-block .title > span:nth-child(11) {
        -webkit-animation-delay: 0.5s;
                animation-delay: 0.5s;
      }
      .success-block .title:hover .title > span {
        -webkit-animation: thanks 0.35s forwards;
                animation: thanks 0.35s forwards;
      }
      .success-block .success-icon {
        margin-right: 1rem;
        width: 4rem;
        height: 4rem;
        color: #93c461;
        opacity: 0;
        margin-left: -2rem;
        -webkit-animation: success-icon-animation 1s 0.25s forwards;
                animation: success-icon-animation 1s 0.25s forwards;
      }
      
      .container {
        display: flex;
        min-height: 100vh;
        width: 100vw;
        align-items: center;
        justify-content: center;
      }
      </style>
    
    <!-- partial:index.partial.html -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
      <defs>
        <symbol id="check" viewBox="0 0 16 16">
          <path fill="currentColor" d="M8,0C3.6,0,0,3.6,0,8s3.6,8,8,8s8-3.6,8-8S12.4,0,8,0z M7,11.4L3.6,8L5,6.6l2,2l4-4L12.4,6L7,11.4z"></path>
        </symbol>
      </defs>
    </svg>
    <div class="container test">
      <div class="success-block">
        <svg class="icon success-icon" aria-hidden="true" xmlns:xlink="http://www.w3.org/1999/xlink">
          <use xlink:href="#check"></use>
        </svg>
        <div class="title"><span>S</span><span>u</span><span>c</span><span>c</span><span>e </span><span>s</span><span>s</span></div>
      </div>
    </div>
    </body>
    </html>';
    die();
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
</head>
<body>
  <style>
body, html {
  height: 100%;
  background-color: rgba(0, 0, 0, 0.507);
}

body {
  font-family: "Open Sans";
  font-weight: 100;
  display: flex;
  overflow: hidden;
}

input ::-webkit-input-placeholder {
  color: rgba(255, 255, 255, 0.7);
}
input ::-moz-placeholder {
  color: rgba(255, 255, 255, 0.7);
}
input :-ms-input-placeholder {
  color: rgba(255, 255, 255, 0.7);
}
input:focus {
  outline: 0 transparent solid;
}
input:focus ::-webkit-input-placeholder {
  color: rgba(0, 0, 0, 0.7);
}
input:focus ::-moz-placeholder {
  color: rgba(0, 0, 0, 0.7);
}
input:focus :-ms-input-placeholder {
  color: rgba(0, 0, 0, 0.7);
}

.login-form {
  min-height: 10rem;
  margin: auto;
  max-width: 50%;
  padding: 0.5rem;
}

.login-text {
  color: white;
  font-size: 1.5rem;
  margin: 0 auto;
  max-width: 50%;
  padding: 0.5rem;
  text-align: center;
}
.login-text .fa-stack-1x {
  color: black;
}

.login-username, .login-password {
  background: transparent;
  border: 0 solid;
  border-bottom: 1px solid rgba(255, 255, 255, 0.5);
  color: white;
  display: block;
  margin: 1rem;
  padding: 0.5rem;
  transition: 250ms background ease-in;
  width: calc(100% - 3rem);
}
.login-username:focus, .login-password:focus {
  background: white;
  color: black;
  transition: 250ms background ease-in;
}

.login-forgot-pass {
  bottom: 0;
  color: white;
  cursor: pointer;
  display: block;
  font-size: 75%;
  left: 0;
  opacity: 0.6;
  padding: 0.5rem;
  position: absolute;
  text-align: center;
  width: 100%;
}
.login-forgot-pass:hover {
  opacity: 1;
}

.login-submit {
  border: 1px solid white;
  background: transparent;
  color: white;
  display: block;
  margin: 1rem auto;
  min-width: 1px;
  padding: 0.25rem;
  transition: 250ms background ease-in;
}
.login-submit:hover, .login-submit:focus {
  background: white;
  color: black;
  transition: 250ms background ease-in;
}

[class*=underlay] {
  left: 0;
  min-height: 100%;
  min-width: 100%;
  position: fixed;
  top: 0;
}

.underlay-photo {
  -webkit-animation: hue-rotate 6s infinite;
          animation: hue-rotate 6s infinite;
  background-size: cover;
  -webkit-filter: grayscale(30%);
  z-index: -1;
}

.underlay-black {
  background: rgba(0, 0, 0, 0.7);
  z-index: -1;
}

@-webkit-keyframes hue-rotate {
  from {
    -webkit-filter: grayscale(30%) hue-rotate(0deg);
  }
  to {
    -webkit-filter: grayscale(30%) hue-rotate(360deg);
  }
}

@keyframes hue-rotate {
  from {
    -webkit-filter: grayscale(30%) hue-rotate(0deg);
  }
  to {
    -webkit-filter: grayscale(30%) hue-rotate(360deg);
  }
}

.container2 {
	margin: auto;
  /* margin-top:40px; */
	/* margin-bottom:0px; */
	padding: 10px;
	padding-bottom:2px;
	width: 480px;
  max-height: 300px;
	background-color: #f5f5f5;
	border-radius: 5px;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  justify-content: center;
  }
  
  .container2 h3 {
	font-size: 24px;
	font-weight: bold;
	color: #333;
  text-align: center;
	margin: 0;
	margin-bottom: 5px;
  }
  
  .container2 p {
	font-size: 18px;
	color: #666;
	line-height: 1.5;
  }
  </style>

<div class="container2">
      <h3>Task</h3>
      <p>Login Without Buret force</p>         
      <p><b>Hint:</b>Logs are unprotected</p>    
</div>

<form class="login-form" action="" method="POST">
  <p class="login-text">
    <span class="fa-stack fa-lg">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-lock fa-stack-1x"></i>
    </span>
  </p>
  <input type="email" class="login-username" autofocus="true" required="true" placeholder="Email" name="email" />
  <input type="password" class="login-password" required="true" placeholder="Password"  name="pass" />
  <input type="submit" name="Login" value="Login" class="login-submit" />
</form>
<div class="underlay-photo"></div>
<div class="underlay-black"></div>
</body>
</html>
