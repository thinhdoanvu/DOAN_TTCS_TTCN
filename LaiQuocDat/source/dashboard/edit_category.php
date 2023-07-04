<?php
include("../dashboard/connection.php");
$id = $_GET["id"];
$name = "";
$query_show = "SELECT * FROM category WHERE Id = $id";
$result_show = $conn->query($query_show);
$rows_show = $result_show->fetch_assoc();
$name = $rows_show['Name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMS | Edit Category</title>
    <link rel="icon" type="image/x-icon" href="../ico/favicon.ico" />
    <link rel="stylesheet" href="../css/dashboard/main.css">
    <link rel="stylesheet" href="../css/dashboard/edit.css">
</head>

<body>
    <?php
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        include("./connection.php");
        if (isset($name))
            if ($name != NULL) {
                $query = "SELECT * FROM category WHERE Name = '$name'";
                $result = $conn->query($query);
                if (mysqli_num_rows($result) > 0)
                    echo "<script> alert('Đã tồn tại phân loại $name!'); </script>";
                else {
                    $query = "UPDATE `category` SET `Name`='$name' WHERE Id=$id";
                    $result = $conn->query($query);
                    header("Location:./manage_category.php");
                    mysqli_close($conn);
                }
            } else echo "<script> alert('Không được để trống các trường dữ liệu!'); </script>";
    }
    if (isset($_POST["manage_category"])) {
        header("Location:./manage_category.php");
        mysqli_close($conn);
    }
    ?>
    <div class="container">
        <form method="post">
            <div class="wrapper">
                <p class="title">CHỈNH SỬA PHÂN LOẠI</p>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-wrapper">
                    <label class="label" for="name">Tên phân loại</label>
                    <input type="text" placeholder="Nhập tên phân loại" name="name" value="<?php echo $name; ?>">
                </div>
                <div class="button">
                    <button type="submit" name="submit">SỬA PHÂN LOẠI</button>
                    <button type="reset">CLEAR</button>
                    <button name="manage_category">QUẢN LÝ PHÂN LOẠI</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>