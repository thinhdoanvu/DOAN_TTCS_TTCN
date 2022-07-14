<?php
    session_start();

    //khai báo biến host
    $hostName = 'localhost';
    // khai báo biến username
    $userName = 'root';
    //khai báo biến password
    $passWord = '';
    // khai báo biến databaseName
    $databaseName = 'automation';
    // khởi tạo kết nối
    $connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);
    //Kiểm tra kết nối
    if (!$connect) {
        exit('Kết nối không thành công!');
    }
    // thành công
    echo 'Kết nối thành công!';
	if (isset($_POST["submit"])) {
		// lấy thông tin người dùng
		$username = $_POST["username"];
		$password = $_POST["password"];
        echo $username;
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password =="") {
			echo "username hoặc password bạn không được để trống!";
		}else{
			$sql = "select * from account where Username = '$username' and Password = '$password' ";
			$query = mysqli_query($connect,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				echo "tên đăng nhập hoặc mật khẩu không đúng !";
			}else{
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
				$_SESSION['username'] = $username;
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                $route = $_SESSION['route'] ;
                header("Location: $route");
			}
		}
	}else{
    }
?>