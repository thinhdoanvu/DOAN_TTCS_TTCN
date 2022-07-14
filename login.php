<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>
    <div class="login">
        <div class="login-triangle"></div>

        <h2 class="login-header">ĐĂNG NHẬP</h2>

        <form action="acceptlogin.php" method="POST" class="login-container">
            <p><input type="text" name="username" placeholder="Username"></p>
            <p><input type="password" name="password" placeholder="Password"></p>
            <p><input type="submit" name="submit" value="Log in"></p>
        </form>
    </div>
</body>

</html>