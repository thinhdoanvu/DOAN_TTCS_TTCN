<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    {{-- <link rel="stylesheet" href="../css/style.css"> --}}
</head>
<body>
    <div class="boxcenter">
        <div class="row mb headeradmin">
            <h1>Admin</h1>
        </div>
        <div class="row mb menu">
            <ul id="nav">
                <li><a href="{{route('admin.trangchu')}}">Trang chủ</a></li>
                <li><a href="index.php?act=adddm">Danh mục</a></li>
                <li><a href="index.php?act=addsp">Hàng hóa</a></li>
                <li><a href="index.php?act=dskh">Khách hàng</a></li>
                <li><a href="index.php?act=dsbl">Bình luận</a></li>
                <li><a href="index.php?act=thongke">Thống kê</a></li>
            </ul>
        </div>
    </div>
</body>
</html>