<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <div class="container" style="margin:10px">
        <div class="header">
            <h2>Task</h2>
        </div>
        <p style="margin:10px">Reset Password Of 'userCba@gmail.com'</p>
    </div>
    <div class="container">
        <div class="header">
            <h2>Password Reset</h2>
        </div>
        <form class="form" id="form">
            <div class="form-control ">
                <label>Email</label>
                <input id="email" type="email" value="userXyz@gmail.com" disabled>
            </div>
            <div class="form-control ">
                <label>New Password</label>
                <input id="pass" type="password" name="pass" placeholder="Enter New Password">
            </div>
            <div class="form-control ">
                <label>Confirm Password</label>
                <input id="confirm" type="password" placeholder="Confirm Your New Password">
            </div>
            <button action="submit" style="cursor:pointer">Change Password</button>
        </form>
    </div>
    <script>
        const form = document.querySelector('form');
        form.addEventListener('submit', (event) => {
    event.preventDefault();
    const email = btoa("userXyz@gmail.com");
    const pass = btoa(document.getElementById("pass").value);
    const confirm = btoa(document.getElementById("confirm").value);
    if (pass.length <= 4 && confirm.length <= 4) {
        alert("Passwords must be at least 4 characters");
        return false;
    }
    if (pass != confirm) {
        alert("Passwords do not match");
        return false;
    }
    const formData = new FormData(form);
    formData.set("email", email);
    formData.set("pass", pass);
    formData.set("confirm", confirm);
    const xhr = new XMLHttpRequest();
    const url = 'https://' + '<?php echo $_SERVER["HTTP_HOST"] . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . "/passReset.php"; ?>';
    xhr.open('POST', url);
    xhr.addEventListener('load', () => {
        alert (atob(xhr.responseText.trim()));
        form.reset();
    });
    xhr.addEventListener('error', () => {
        console.error('An error occurred');
    });
    xhr.send(formData);
});

    </script>

</body>

</html>