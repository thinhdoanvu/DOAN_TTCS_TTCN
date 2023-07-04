<?php
$name = "";
include("../dashboard/connection.php");
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    if (isset($name)) {
        $query = "SELECT * FROM category WHERE Name = '$name'";
        $result = $conn->query($query);
        if (mysqli_num_rows($result) > 0)
            echo "<script> alert('Đã tồn tại phân loại $name!'); </script>";
        else {
            $query = "INSERT INTO category (Name) VALUES ('$name')";
            $result = $conn->query($query);
            echo "<script> alert('Đã thêm phân loại $name thành công!'); </script>";
        }
    } else echo "<script> alert('Không được để trống các trường dữ liệu!'); </script>";
}
if (isset($_POST["manage_category"])) {
    mysqli_close($conn);
    header("Location:./manage_category.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMS | Add Category</title>
    <link rel="icon" type="image/x-icon" href="../ico/favicon.ico" />
    <link rel="stylesheet" href="../css/dashboard/main.css">
    <link rel="stylesheet" href="../css/dashboard/add.css">
</head>

<body>
    <div class="container">
        <form action="./add_category.php" method="post" enctype="multipart/form-data">
            <div class="wrapper">
                <p class="title">THÊM PHÂN LOẠI SẢN PHẨM</p>
                <div class="input-wrapper">
                    <label class="label" for="name">Tên Phân Loại</label>
                    <input type="text" placeholder="Tên" name="name" value="<?php echo $name; ?>">
                </div>
                <div class="button-wrapper">
                    <button name="submit" type="submit">THÊM PHÂN LOẠI</button>
                    <button type="reset">LÀM MỚI</button>
                    <button name="manage_category" type="submit">QUẢN LÝ PHÂN LOẠI</button>
                </div>
            </div>
    </div>
    </form>
    </div>
</body>

</html>