<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMS | Login</title>
    <link rel="icon" type="image/x-icon" href="../ico/favicon.ico" />
    <link rel="stylesheet" href="../css/dashboard/main.css">
    <link rel="stylesheet" href="../css/dashboard/login.css">
</head>

<body>
    <?php
    session_start();
    if (isset($_POST["admin_name"]) && isset($_POST["password"])) {
        $admin_name = $_POST["admin_name"];
        $passwd = $_POST["password"];
        include("../dashboard/connection.php");
        $query = "SELECT * FROM admin WHERE Name = '$admin_name' AND Password = '$passwd'";
        $result = $conn->query($query);
        while ($row = mysqli_fetch_array($result)) {
            if ($row["Name"] == $admin_name)
                if ($row["Password" == $passwd]) {
                    $_SESSION['admin_name'] = $admin_name;
                    header("Location:./menu.php");
                }
        }
        echo '<p class="error"> Không có tài khoản này hoặc nhập sai mật khẩu! </p>';
        mysqli_close($conn);
    }
    ?>
    <form method="post">
        <div class="container">
            <p class="title title-font">ĐĂNG NHẬP</p>
            <label for="admin_name"><b>Tên đăng nhập</b></label>
            <input type="text" placeholder="Nhập tên đăng nhập" name="admin_name" value="<?php if (isset($_POST["admin_name"])) echo $_POST["admin_name"]; ?>" required>
            <label for="password"><b>Mật khẩu</b></label>
            <input type="password" placeholder="Nhập mật khẩu" name="password" required>
            <button type="submit">ĐĂNG NHẬP</button><br>
        </div>
    </form>
</body>
</html>