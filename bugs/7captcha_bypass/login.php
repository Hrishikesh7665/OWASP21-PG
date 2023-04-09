<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header('Location: index.php');
    die ();
}

if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['username']) && isset($_POST['password']) && $_POST['check_captcha']==="true"){
    $passHash = hash('sha256', $_POST['password']);
    $hash_Pass = "73388108d3855c8f379bba383530b70a9245a29ef92f5e7e771d352fbd8b0d3d";
    if ($_POST['username'] == "user_XYZ" && $passHash === $hash_Pass){
        echo '
        <!DOCTYPE html>
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
    }else{
        header('Location: index.html?p=failed');
        die ();
    }
}else{
    header('Location: index.html?p=failed');
    die ();
}


?>