<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    include("../dashboard/connection.php");
    $query = "DELETE FROM admin WHERE Id=$id";
    $result = $conn->query($query);
    if (!$result)
        echo "<script> alert('Truy vấn không thành công: .$conn->error'); </script>";
    else
        echo "<script> alert('Xoá tài khoản thành công!'); </script>";
}
mysqli_close($conn);
header("Location:./manage_admin.php");
exit;
