<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="css/login-style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
    <div class="center">
    <h1>Login</h1>
        <form action="login.php" method="post">
            <div class="txt-field">
                <input type = "text" name = "username" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt-field">
                <input type = "password" name = "password" required>
                <span></span>
                <label>Password</label>
            </div>
        <input type = "submit" value = "Login">
        <div class="signup_link">
            Admin Only!
        </div>
    </div>
</form>
</body>
</html>