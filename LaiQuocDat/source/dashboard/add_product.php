<?php
$name = "";
$thumbnail = "";
$color = "";
$material = "";
$brand = "";
$note = "";
$submit = "";
$subcategory = "";
include("../dashboard/connection.php");
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
            $query = "INSERT INTO product (Name,Thumbnail,Color,Material,Brand,Note,SubCategory) VALUES ('$name','$thumb_upload','$color','$material','$brand','$note','$subcategory')";
            $result = $conn->query($query);
            echo "<script> alert('Đã thêm sản phẩm $name, màu $color, hãng $brand, chất liệu $material với mô tả ... thuộc danh mục $subcategory_show thành công!'); </script>";
        }
    } else echo "<script> alert('Không được để trống các trường dữ liệu!'); </script>";
}

if (isset($_POST["manage_product"])) {
    mysqli_close($conn);
    header("Location:./manage_product.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMS | Add Product</title>
    <link rel="icon" type="image/x-icon" href="../ico/favicon.ico" />
    <link rel="stylesheet" href="../css/dashboard/main.css">
    <link rel="stylesheet" href="../css/dashboard/add.css">
    <link rel="stylesheet" href="../css/dashboard/add_product.css">
</head>

<body>

    <div class="container">
        <form action="./add_product.php" method="post" enctype="multipart/form-data">
            <div class="wrapper">
                <p class="title">THÊM SẢN PHẨM</p>
                <div class="input-wrapper">
                    <label class="label" for="name">Tên Sản Phẩm</label>
                    <input type="text" placeholder="Tên" name="name" value="<?php echo $name; ?>">
                </div>
                <div class="input-wrapper">
                    <label class="label" for="thumbnail">Ảnh thumbnail</label>
                    <input class="img" type="file" name="thumbnail" accept=".jpg, .jpeg, .png">
                </div>
                <div class="input-wrapper">
                    <label class="label" for="color">Màu</label>
                    <input type="text" placeholder="Màu sắc" name="color" value="<?php echo $color; ?>">
                </div>
                <div class="input-wrapper">
                    <label class="label" for="material">Chất liệu</label>
                    <input type="text" placeholder="Chất liệu" name="material" value="<?php echo $material; ?>">
                </div>
                <div class="input-wrapper">
                    <label class="label" for="brand">Hãng</label>
                    <input type="text" placeholder="Hãng sản xuất" name="brand" value="<?php echo $brand; ?>">
                </div>
                <div class="input-wrapper">
                    <label class="label" for="note">Mô tả</label>
                    <textarea name="note" id="note" cols="93" rows="5" value="<?php echo $note; ?>"></textarea>
                </div>
                <div class="input-wrapper">
                    <label class="label" for="subcategory">Danh mục</label>
                    <select name="subcategory" class="subcategory">
                        <?php
                        $option_query = "SELECT * FROM subcategory";
                        $option_result = $conn->query($option_query);
                        while ($option_row = $option_result->fetch_assoc()) {
                            echo "<option value='$option_row[Id]'>$option_row[Name]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="button-wrapper">
                    <button name="submit" type="submit">THÊM SẢN PHẨM</button>
                    <button type="reset">LÀM MỚI</button>
                    <button name="manage_product" type="submit">QUẢN LÝ SẢN PHẨM</button>
                </div>
            </div>
    </div>
    </form>
    </div>
</body>

</html>