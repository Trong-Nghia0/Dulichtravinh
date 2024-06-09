<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/dangnhap.css">
</head>
<body class="bg-light">
<?php
    // Kết nối cơ sở dữ liệu
    include('../connect.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
        $tenDangNhap = $_POST["username"];
        $MatKhau = $_POST["password"];
      
        $sql = "SELECT * FROM `tblnguoidung`";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if($row['tendangnhap'] == $tenDangNhap && $row['matkhau'] == $MatKhau && $row['quyen'] == 1) {
                echo "<script>alert('Đăng nhập thành công');</script>";
                echo "<script>window.location = '$port/admin/trangchu.php';</script>";
            }
        }
        echo "<script>alert('Sai thông tin đăng nhập');</script>";
        
      } 
        
?>
<div class="card login-container">
    <div class="card-header">
        <h2 class="text-center">Đăng Nhập</h2>
    </div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
