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
    <title>DMS | Manage Product</title>
    <link rel="icon" type="image/x-icon" href="../ico/favicon.ico" />
    <link rel="stylesheet" href="../css/dashboard/main.css">
    <link rel="stylesheet" href="../css/dashboard/manage.css">
</head>

<body>
    <div class="navigation">
        <div class="nav-btn-wrapper">
            <a class="nav-btn" href="../dashboard/add_product.php">Thêm sản phẩm</a>
            <a class="nav-btn" href="../dashboard/menu.php">MENU</a>
        </div>
        <div class="search-wrapper">
            <form action="./manage_product.php" method="POST">
                <input class="search-input" type="text" placeholder="Nhập nội dung cần tìm kiếm" name="search" value="<?php echo $search; ?>">
                <input class="nav-btn" type="submit" name="submit" value="Tìm kiếm">
            </form>
        </div>
    </div>
    <div class="container">
        <p class="title">THÔNG TIN SẢN PHẨM</p>
        <table class="show-table">
            <tr class="show-header">
                <th class="show-row"> STT </th>
                <th class="show-row"> Tên </th>
                <th class="show-row"> Ảnh bìa </th>
                <th class="show-row"> Màu </th>
                <th class="show-row"> Chất liệu </th>
                <th class="show-row"> Hãng </th>
                <th class="show-row"> Mô tả </th>
                <th class="show-row"> Danh mục </th>
                <th class="show-row"> Chức năng </th>
            </tr>
            <?php
            $query = "SELECT product.ID AS Id, product.Name AS Name,Thumbnail,Color,Material,Brand,Note,subcategory.Name AS SubCategory FROM product INNER JOIN subcategory ON product.Subcategory=subcategory.Id ORDER BY product.Name ASC";
            if (isset($_POST["submit"])) {
                $search = $_POST["search"];
                $query = "SELECT product.ID AS Id, product.Name AS Name,Thumbnail,Color,Material,Brand,Note,subcategory.Name AS SubCategory FROM product INNER JOIN subcategory ON product.Subcategory=subcategory.Id WHERE product.Name Like '%$search%' OR `Color` Like '%$search%' OR `Material` Like '%$search%' OR `Brand` Like '%$search%' OR `Note` Like '%$search%' OR subcategory.Name Like '%$search%' ORDER BY product.Name ASC";
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
                <td class='show-data'> <img class='display_img' src='$rows[Thumbnail]'></td>
                <td class='show-data'> $rows[Color] </td>
                <td class='show-data'> $rows[Material] </td>
                <td class='show-data'> $rows[Brand] </td>
                <td class='show-data'> $rows[Note] </td>
                <td class='show-data'> $rows[SubCategory]</td>
                <td class='show-data' id='function'>
                <a class='sub-button' href='../dashboard/edit_product.php?id=$rows[Id]'>Sửa</a>
                <a onClick=\" javascript:return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?') \" class='sub-button' href='../dashboard/delete_product.php?id=$rows[Id]'>Xoá</a>
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