<?php
    require_once('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<form action="login_form.php" method="POST">
    <div class="container">
        <div class="header">
            
        </div>
        <div class="center-content">
            <h1>Welcome to our HOME DATABASE</h1>
            <div class="login-form-content">   
            <label class="login-form">Username :
            </label><input class='input' type='text' required name='username' placeholder="Username"><br>
            <label class="login-form">Password :</label><input class='input' type='password' required name='password' placeholder="Password">
            </div>
        
        
            <button type='submit' class='submit_button' name='login_button'>Login</button>
        
        </div>
        
    </div>
</form>
</body>
</html>