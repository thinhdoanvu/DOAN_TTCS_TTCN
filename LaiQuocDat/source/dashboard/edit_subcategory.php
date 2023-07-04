<?php
include("../dashboard/connection.php");
$id = $_GET["id"];
$name = "";
$category = "";
$query_show = "SELECT * FROM subcategory WHERE Id = $id";
$result_show = $conn->query($query_show);
$rows_show = $result_show->fetch_assoc();
$name = $rows_show['Name'];
$category = $rows_show['Category'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMS | Edit Subcategory</title>
    <link rel="icon" type="image/x-icon" href="../ico/favicon.ico" />
    <link rel="stylesheet" href="../css/dashboard/main.css">
    <link rel="stylesheet" href="../css/dashboard/edit.css">
    <link rel="stylesheet" href="../css/dashboard/edit_subcategory.css">
</head>

<body>
    <?php
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $category = $_POST["category"];
        include("./connection.php");
        if (isset($name))
            if ($name != NULL) {
                $query = "UPDATE `subcategory` SET `Name`='$name',`Category`='$category' WHERE Id=$id";
                $result = $conn->query($query);
                header("Location:./manage_subcategory.php");
                mysqli_close($conn);
            } else echo "<script> alert('Không được để trống các trường dữ liệu!'); </script>";
    }
    if (isset($_POST["manage_subcategory"])) {
        header("Location:./manage_subcategory.php");
        mysqli_close($conn);
    }
    ?>
    <div class="container">
        <form method="post">
            <div class="wrapper">
                <p class="title">CHỈNH SỬA DANH MỤC</p>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-wrapper">
                    <label class="label" for="name">Tên danh mục</label>
                    <input type="text" placeholder="Nhập tên danh mục" name="name" value="<?php echo $name; ?>">
                </div>
                <div class="input-wrapper">
                    <label class="label" for="category">Phân loại</label>
                    <select name="category" class="category">
                        <?php
                        $option_query = "SELECT * FROM category";
                        $option_result = $conn->query($option_query);
                        while ($option_row = $option_result->fetch_assoc()) {
                            if ($option_row['Id'] == $category)
                                echo "<option value='$option_row[Id]' selected>$option_row[Name]</option>";
                            else
                                echo "<option value='$option_row[Id]'>$option_row[Name]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="button">
                    <button type="submit" name="submit">SỬA DANH MỤC</button>
                    <button type="reset">CLEAR</button>
                    <button name="manage_subcategory">QUẢN LÝ DANH MỤC</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>