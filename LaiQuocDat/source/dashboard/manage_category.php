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
    <title>DMS | Manage Category</title>
    <link rel="icon" type="image/x-icon" href="../ico/favicon.ico" />
    <link rel="stylesheet" href="../css/dashboard/main.css">
    <link rel="stylesheet" href="../css/dashboard/manage.css">
</head>

<body>
    <div class="navigation">
        <div class="nav-btn-wrapper">
            <a class="nav-btn" href="../dashboard/add_category.php">Thêm phân loại</a>
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
        <p class="title">THÔNG TIN PHÂN LOẠI</p>
        <table class="show-table">
            <tr class="show-header">
                <th class="show-row"> STT </th>
                <th class="show-row"> Tên </th>
                <th class="show-row"> Chức năng </th>
            </tr>
            <?php
            $query = "SELECT * FROM category ORDER BY Name ASC";
            if (isset($_POST["submit"])) {
                $search = $_POST["search"];
                $query = "SELECT * FROM category WHERE Name LIKE '%$search%' ORDER BY Name ASC";
            }
            $result = $conn->query($query);
            if (!$result) {
                echo "<script> alert('Truy vấn không thành công: .$conn->error'); </script>";
            }
            $i = 1;
            while ($rows = $result->fetch_assoc()) {
                echo "
                <tr>
                <td class='show-data'> $i </td>
                <td class='show-data'> $rows[Name] </td>
                <td class='show-data'>
                <a class='sub-button' href='../dashboard/edit_category.php?id=$rows[Id]'>Sửa</a>
                <a onClick=\" javascript:return confirm('Bạn có chắc chắn muốn xóa phân loại này?') \" class='sub-button' href='../dashboard/delete_category.php?id=$rows[Id]'>Xoá</a>
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