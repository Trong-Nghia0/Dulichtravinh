<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÊM ĐIỂM DU LỊCH</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/them.css">
    <link rel="stylesheet" href="../css/base.css">
</head>
<body>
<?php
// Kết nối cơ sở dữ liệu
include('../../connect.php');
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Lấy dữ liệu từ form
  $tenDiemDuLich = $_POST["tendiadiem"];
  $MaLoaiHinh = $_POST["maloaihinh"];
  $DiaChi = $_POST["diachi"];
  $GioMoCua = $_POST["giomocua"];
  $GioDongCua = $_POST["giodongcua"];
  $GioThamQuan = $_POST["giothamquan"];
  $Gia = $_POST["gia"];
  $MoTa = $_POST["mota"];
  // Xử lý upload hình ảnh
  $hinhanh = $_FILES["hinhanh"]["name"];
  $hinhanh_temp = $_FILES["hinhanh"]["tmp_name"];
  $hinhanh_path = "../../hinhanh/" . $hinhanh; // Thư mục để lưu hình ảnh

  move_uploaded_file($hinhanh_temp, $hinhanh_path);

  // Thêm dữ liệu vào bảng tbldiemden
  $sql = "INSERT INTO tbldiemden (tendiemden, diachi, hinhanh, mota, giomocua, giodongcua, giothamquan, gia, maloaihinh) VALUES ('$tenDiemDuLich', '$DiaChi', '$hinhanh', '$MoTa', '$GioMoCua', '$GioDongCua', '$GioThamQuan', '$Gia', $MaLoaiHinh)";

  if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Thêm điểm du lịch thành công');</script>";

      // Chuyển hướng về trang danhsach.php sau khi thêm thành công
      echo "<script>window.location = '$port/admin/diemdulich/danhsach.php';</script>";
  } else {
      echo "Lỗi: " . $sql . "<br>" . $conn->error;
  }
}
?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column mt-4">
    <li class="nav-item">
        <a class="text-dark nav-link active h4" href='<?php echo $port ?>/admin/'>
            <i class="text-dark fas fa-chart-bar"></i> DASHBOARD
        </a>
        <a class="text-dark nav-link active h6" href="<?php echo $port ?>/admin/diemdulich/danhsach.php">
            <i class="text-dark fas fa-list"></i> ĐIỂM DU LỊCH
        </a>
        <a class="text-dark nav-link active h6" href="<?php echo $port ?>/admin/diemdulich/them.php">
            <i class="text-dark fas fa-plus"></i> THÊM ĐIỂM DU LỊCH
        </a>
        <a class="text-dark nav-link active h6" href="<?php echo $port ?>/admin/loaihinhdulich/danhsach.php">
            <i class="text-dark fas fa-list"></i> LOẠI HÌNH DU LỊCH
        </a>
        <a class="text-dark nav-link active h6" href="<?php echo $port ?>/admin/loaihinhdulich/them.php">
            <i class="text-dark fas fa-plus"></i> THÊM LOẠI HÌNH
        </a>
        <a class="text-dark nav-link active h6" href="<?php echo $port ?>/admin/baiviet/danhsach.php">
            <i class="text-dark fas fa-list"></i> BÀI VIẾT
        </a>
        <a class="text-dark nav-link active h6" href="<?php echo $port ?>/admin/baiviet/them.php">
            <i class="text-dark fas fa-plus"></i> THÊM BÀI VIẾT
        </a>
        <a class="text-dark nav-link active h6" href="<?php echo $port ?>/admin">
            <i class="text-dark fas fa-sign-out-alt"></i> ĐĂNG XUẤT
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <h2 style="text-align:center">THÊM ĐIỂM DU LỊCH</h2>
            <form aaction="them.php" method="POST" class="was-validated" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ten_monan">Tên điểm du lịch:</label>
                <select class='mien' name="maloaihinh" id="">
                  <?php
                  // select ra danh sách loại hình
                  $sql2 = "SELECT * FROM tblloaihinh";
                  $conn2 = new mysqli("localhost", "root", "", "db_dulich");
                  $result2 = $conn2->query($sql2);
                  if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                      echo "<option value='" . $row2['maloaihinh'] . "'>" . $row2['tenloaihinh'] . "</option>";
                    }
                  } else {
                    echo "Không tìm thấy điểm du lịch.";
                  }
                 
                  ?>
                </select>
              </div>  
            <div class="form-group">
                <label for="ten_monan">Tên địa điểm:</label>
                <input type="text" class="form-control" id="tendiadiem" placeholder="Tên điểm du lịch" name="tendiadiem" required>
              </div>
              <div class="form-group">
                <label for="ten_monan">Địa chỉ:</label>
                <input type="text" class="form-control" id="diachi" placeholder="Địa chỉ" name="diachi" required>
              </div>
              <div class="form-group">
                <label for="ten_monan">Giờ mở cửa:</label>
                <input type="Time" class="form-control" id="giomocua" placeholder="Giờ mở cửa" name="giomocua" required>
              </div>
              <div class="form-group">
                <label for="ten_monan">Giờ đóng cửa:</label>
                <input type="Time" class="form-control" id="giodongcua" placeholder="Giờ đóng cửa" name="giodongcua" required>
              </div>
              <div class="form-group">
                <label for="ten_monan">Giờ tham quan:</label>
                <input type="Time" class="form-control" id="giothamquan" placeholder="Giờ tham quan" name="giothamquan" required>
              </div>
              <div class="form-group">
                <label for="ten_monan">Giá:</label>
                <input type="text" class="form-control" id="gia" placeholder="Giá vé" name="gia" required>
              </div>
              <div class="form-group">
                <label for="hinhanh">Hình ảnh:</label>
                <input type="file" class="form-control" id="hinhanh" placeholder="Hình ảnh minh hoạ" name="hinhanh" required>
            
              </div>
              <div class="form-group">
                <label for="cachnau">Mô tả :</label>
                <textarea  type="text" class="form-control" id="mota" placeholder="Mô tả" name="mota" required></textarea >
              </div>
              <button type="submit" class="btn btn-success">Thêm điểm đến</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>