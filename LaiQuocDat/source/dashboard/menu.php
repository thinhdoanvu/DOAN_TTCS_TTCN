<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMS | MENU</title>
    <link rel="icon" type="image/x-icon" href="../ico/favicon.ico" />
    <link rel="stylesheet" href="../css/dashboard/main.css">
    <link rel="stylesheet" href="../css/dashboard/menu.css">
</head>

<body>
    <?php
    session_start();
    if (isset($_POST["product"]))
        header("Location:./manage_product.php");
    if (isset($_POST["admin"]))
        header("Location:./manage_admin.php");
        if (isset($_POST["subcategory"]))
        header("Location:./manage_subcategory.php");
    if (isset($_POST["category"]))
        header("Location:./manage_category.php");
    if (isset($_POST["log_out"])) {
        session_unset();
        session_destroy();
        header("Location:../index.html");
    }
    ?>
    <div class="container">
        <form action="" method="post">
            <div class="wrapper">
                <p class="title">XIN CHÀO <span id="admin-name"><?php echo $_SESSION["admin_name"]; ?></span></p>
                <div class="button">
                    <button name="product"> SẢN PHẨM</button>
                    <button name="subcategory"> DANH MỤC</button>
                    <button name="category"> PHÂN LOẠI</button>
                </div>
                <div class="button">
                    <button name="admin"> TÀI KHOẢN ADMIN</button>
                    <button name="log_out"> ĐĂNG XUẤT</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>