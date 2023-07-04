<?php
include("./connection.php");
$search = "";
$query = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMS | Manage Admin</title>
    <link rel="icon" type="image/x-icon" href="../ico/favicon.ico" />
    <link rel="stylesheet" href="../css/dashboard/main.css">
    <link rel="stylesheet" href="../css/dashboard/manage.css">
</head>

<body>
    <div class="navigation">
        <div class="nav-btn-wrapper">
            <a class="nav-btn" href="../dashboard/add_admin.php">Thêm tài khoản</a>
            <a class="nav-btn" href="../dashboard/menu.php">MENU</a>
        </div>
        <div class="search-wrapper">
            <form method="POST">
                <input class="search-input" type="text" placeholder="Nhập nội dung cần tìm kiếm" name="search" value="<?php echo $search; ?>">
                <input class="nav-btn" type="submit" name="submit" value="Tìm kiếm">
            </form>
        </div>
    </div>
    <div class="container">
        <p class="title">DANH SÁCH TÀI KHOẢN ADMIN</p>
        <table class="show-table">
            <tr class="show-header">
                <th class="show-row"> STT </th>
                <th class="show-row"> Tên </th>
                <th class="show-row"> Mật khẩu </th>
                <th class="show-row"> Chức năng </th>
            </tr>
            <?php
            $query = "SELECT * FROM admin ORDER BY Name ASC";
            if (isset($_POST["submit"])) {
                $search = $_POST["search"];
                $query = "SELECT * FROM admin WHERE Name LIKE '%$search%' OR Password LIKE '%$search%' ORDER BY Name ASC";
            }
            $result = $conn->query($query);
            if (!$result) {
                echo "<script> alert('Truy vấn không thành công: .$conn->error'); </script>";
                exit();
            }
            $i = 1;
            while ($rows = $result->fetch_assoc()) {
                echo "
                <tr>
                <td class='show-data'> $i </td>
                <td class='show-data'> $rows[Name] </td>
                <td class='show-data'> $rows[Password]</td>
                <td class='show-data'>
                <a class='sub-button' href='../dashboard/edit_admin.php?id=$rows[Id]'>Sửa</a>
                <a onClick=\" javascript:return confirm('Bạn có chắc chắn muốn xóa tài khoản này?') \" class='sub-button' href='../dashboard/delete_admin.php?id=$rows[Id]'>Xoá</a>
                </td>
                </tr>";
                $i++;
            }
            mysqli_free_result($result);
            mysqli_close($conn);
            ?>

    </div>
</body>

</html>