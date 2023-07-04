<?php
$name = "";
$category = "";
include("../dashboard/connection.php");
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $category = $_POST["category"];
    if($name!=NULL)
    {
    $query = "SELECT Name FROM category WHERE Id = $category";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc())
        $category_show = $row['Name'];
    if (isset($name)) {
        $query = "SELECT * FROM subcategory WHERE Name = '$name' AND Category = '$category'";
        $result = $conn->query($query);
        if (mysqli_num_rows($result) > 0)
            echo "<script> alert('Đã tồn tại danh mục $name trong phân loại $category_show!'); </script>";
        else {
            $query = "INSERT INTO subcategory (Name,Category) VALUES ('$name','$category')";
            $result = $conn->query($query);
            echo "<script> alert('Đã thêm danh mục $name cho phân loại $category_show thành công!'); </script>";
        }
    }
 } else echo "<script> alert('Không được để trống các trường dữ liệu!'); </script>";
}
if (isset($_POST["manage_subcategory"])) {
    mysqli_close($conn);
    header("Location:./manage_subcategory.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMS | Add Subcategory</title>
    <link rel="icon" type="image/x-icon" href="../ico/favicon.ico" />
    <link rel="stylesheet" href="../css/dashboard/main.css">
    <link rel="stylesheet" href="../css/dashboard/add.css">
    <link rel="stylesheet" href="../css/dashboard/add_subcategory.css">
</head>

<body>
    <div class="container">
        <form action="./add_subcategory.php" method="post" enctype="multipart/form-data">
            <div class="wrapper">
                <p class="title">THÊM DANH MỤC SẢN PHẨM</p>
                <div class="input-wrapper">
                    <label class="label" for="name">Tên Danh Mục</label>
                    <input type="text" placeholder="Tên" name="name" value="<?php echo $name; ?>">
                </div>
                <div class="input-wrapper">
                    <label class="label" for="category">Phân Loại</label>
                    <select name="category" class="category">
                        <?php
                        $option_query = "SELECT * FROM category";
                        $option_result = $conn->query($option_query);
                        while ($option_row = $option_result->fetch_assoc()) {
                            echo "<option value='$option_row[Id]'>$option_row[Name]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="button-wrapper">
                    <button name="submit" type="submit">THÊM DANH MỤC</button>
                    <button type="reset">LÀM MỚI</button>
                    <button name="manage_subcategory" type="submit">QUẢN LÝ DANH MỤC</button>
                </div>
            </div>
    </div>
    </form>
    </div>
</body>

</html>