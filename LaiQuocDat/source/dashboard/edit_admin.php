<?php
include("../dashboard/connection.php");
$id = $_GET["id"];
$admin_name = "";
$admin_password = "";
$confirm_password = "";
$query_show = "SELECT * FROM admin WHERE Id = $id";
$result_show = $conn->query($query_show);
$rows_show = $result_show->fetch_assoc();
$admin_name = $rows_show['Name'];
$admin_password = $rows_show['Password'];
$confirm_password = $rows_show['Password'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMS | Edit Admin</title>
    <link rel="icon" type="image/x-icon" href="../ico/favicon.ico" />
    <link rel="stylesheet" href="../css/dashboard/main.css">
    <link rel="stylesheet" href="../css/dashboard/edit.css">
</head>

<body>
    <?php
    if (isset($_POST["submit"])) {
        $admin_name = $_POST["admin_name"];
        $admin_password = $_POST["admin_password"];
        $confirm_password = $_POST["confirm_password"];
        include("./connection.php");
        if (isset($admin_name) && isset($admin_password) && isset($confirm_password))
            if ($admin_name != NULL && $admin_password != NULL && $confirm_password != NULL) {
                $query="SELECT * FROM admin WHERE Name = '$admin_name'";
                $result = $conn->query($query);
                if (mysqli_num_rows($result) > 0)
                    echo "<script> alert('Đã tồn tại tài khoản $admin_name!'); </script>";
                elseif ($admin_password == $confirm_password) {
                    $query = "UPDATE `admin` SET `Name`='$admin_name',`Password`='$admin_password' WHERE Id=$id";
                    $result = $conn->query($query);
                    header("Location:./manage_admin.php");
                    mysqli_close($conn);
                } else echo "<script> alert('Xác nhận mật khẩu sai!'); </script>";
            } else echo "<script> alert('Không được để trống các trường dữ liệu!'); </script>";
    }
    if (isset($_POST["manage_admin"])) {
        header("Location:./manage_admin.php");
        mysqli_close($conn);
    }
    ?>
    <div class="container">
        <form method="post">
            <div class="wrapper">
                <p class="title">CHỈNH SỬA TÀI KHOẢN ADMIN</p>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-wrapper">
                    <label class="label" for="admin_name">ACCOUNT</label>
                    <input type="text" placeholder="Nhập tên đăng nhập" name="admin_name" value="<?php echo $admin_name; ?>">
                </div>
                <div class="input-wrapper">
                    <label class="label" for="admin_password">PASSWORD</label>
                    <input type="password" placeholder="Nhập mật khẩu" name="admin_password" value="<?php echo $admin_password; ?>">
                </div>
                <div class="input-wrapper">
                    <label class="label" for="confirm_password">PASSWORD CONFIRM</label>
                    <input type="password" placeholder="Nhập lại mật khẩu" name="confirm_password" value="<?php echo $confirm_password; ?>">
                </div>
                <div class="button">
                    <button type="submit" name="submit">SỬA TÀI KHOẢN</button>
                    <button type="reset">CLEAR</button>
                    <button name="manage_admin">QUẢN LÝ ADMIN</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>