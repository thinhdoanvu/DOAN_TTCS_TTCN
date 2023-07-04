<?php
include("../dashboard/connection.php");
$id = $_GET["id"];
$name = "";
$thumbnail = "";
$color = "";
$material = "";
$brand = "";
$note = "";
$submit = "";
$subcategory = "";
// //Show information
$query_show = "SELECT * FROM product WHERE Id = $id";
$result_show = $conn->query($query_show);
$rows_show = $result_show->fetch_assoc();
$name = $rows_show['Name'];
$thumbnail = $rows_show['Thumbnail'];
$color = $rows_show['Color'];
$material = $rows_show['Material'];
$brand = $rows_show['Brand'];
$note = $rows_show['Note'];
$subcategory = $rows_show['SubCategory'];
//Update information
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $thumbnail = $_FILES["thumbnail"];
    $color = $_POST["color"];
    $material = $_POST["material"];
    $brand = $_POST["brand"];
    $note = $_POST["note"];
    $subcategory = $_POST["subcategory"];
    $query = "SELECT Name FROM subcategory WHERE Id = $subcategory";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc())
        $subcategory_show = $row['Name'];
    if ($_FILES["thumbnail"]['size'] != 0 && isset($name) && $name != NULL) {
        //Processing the thumbnail
        $thumb_name = $thumbnail['name'];
        $thumb_temp = $thumbnail['tmp_name'];
        $thumb_error = $thumbnail['error'];
        $thumb_seperate = explode('.', $thumb_name);
        $thumb_extension = strtolower(end($thumb_seperate));
        $thumb_upload = '../images/' . $thumb_name;
        $query = "SELECT * FROM product WHERE Name = '$name' AND Thumbnail = '$thumb_upload' AND Color = '$color' AND Brand = '$brand' AND Material = '$material' AND Note = '$note' AND Subcategory = '$subcategory'";
        $result = $conn->query($query);
        if (mysqli_num_rows($result) > 0)
            echo "<script> alert('Đã tồn tại sản phẩm $name, màu $color, hãng $brand, chất liệu $material với mô tả ... thuộc danh mục $subcategory_show!'); </script>";
        else {
            move_uploaded_file($thumb_temp, $thumb_upload);
            $query = "UPDATE `product` SET `Name`='$name', `Thumbnail`='$thumb_upload', `Color`='$color', `Material`='$material', `Brand`='$brand', `Note`='$note', `SubCategory`='$subcategory' WHERE `product`.`Id`=$id";
            $result = $conn->query($query);
            mysqli_close($conn);
            header("Location:./manage_product.php");
        }
    } else echo "<script> alert('Không được để trống các trường dữ liệu!'); </script>";
}
if (isset($_POST["manage"])) header("Location:./manage_product.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMS | Edit Product</title>
    <link rel="icon" type="image/x-icon" href="../ico/favicon.ico" />
    <link rel="stylesheet" href="../css/dashboard/main.css">
    <link rel="stylesheet" href="../css/dashboard/edit.css">
    <link rel="stylesheet" href="../css/dashboard/edit_product.css">
</head>

<body>
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="wrapper">
                <p class="title">SỬA THÔNG TIN SẢN PHẨM</p>
                <div class="input-wrapper">
                    <label class="label" for="name">Tên Sản Phẩm</label>
                    <input type="text" placeholder="Tên" name="name" value="<?php echo $name; ?>">
                </div>
                <div class="input-wrapper">
                    <label class="label" for="thumbnail">Ảnh thumbnail</label>
                    <input class="img" type="file" name="thumbnail" accept=".jpg, .jpeg, .png">
                    <br>
                    <div class="display-img">
                        <img src="<?php echo $thumbnail; ?>">
                    </div>
                </div>
                <div class="input-wrapper">
                    <label class="label" for="color">Màu</label>
                    <input type="text" placeholder="Màu sắc" name="color" value="<?php echo $color; ?>">
                </div>
                <div class="input-wrapper">
                    <label class="label" for="material">Tên Sản Phẩm</label>
                    <input type="text" placeholder="Chất liệu" name="material" value="<?php echo $material; ?>">
                </div>
                <div class="input-wrapper">
                    <label class="label" for="brand">Hãng</label>
                    <input type="text" placeholder="Hãng sản xuất" name="brand" value="<?php echo $brand; ?>">
                </div>
                <div class="input-wrapper">
                    <label class="label" for="note">Ghi chú</label>
                    <textarea name="note" id="note" cols="93" rows="5"><?php echo $note; ?></textarea>
                </div>
                <div class="input-wrapper">
                    <label class="label" for="subcategory">Phân loại</label>
                    <select name="subcategory" class="subcategory">
                        <?php
                        $option_query = "SELECT * FROM subcategory";
                        $option_result = $conn->query($option_query);
                        while ($option_row = $option_result->fetch_assoc()) {
                            if ($option_row['Id'] == $subcategory)
                                echo "<option value='$option_row[Id]' selected>$option_row[Name]</option>";
                            else
                                echo "<option value='$option_row[Id]'>$option_row[Name]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="button">
                    <button name="submit" type="submit">SỬA</button>
                    <button type="reset">LÀM MỚI</button>
                    <button name="manage">QUẢN LÝ SẢN PHẨM</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>