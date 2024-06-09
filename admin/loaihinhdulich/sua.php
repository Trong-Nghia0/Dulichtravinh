<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CẬP NHẬT LOẠI HÌNH DU LỊCH</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/sua.css">
    <link rel="stylesheet" href="../css/base.css">
</head>
<body>
<?php
// Kết nối cơ sở dữ liệu
include('../../connect.php');
    
// Kiểm tra xem có tham số id truyền vào từ URL hay không
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Truy vấn dữ liệu với ID đã nhận được
  $sql = "SELECT * FROM tblloaihinh WHERE maloaihinh = $id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // Lấy dữ liệu từ bảng và hiển thị form để cập nhật
      $row = $result->fetch_assoc();
      $tenLoaiHinh = $row['tenloaihinh'];
      $hinhanh = $row['hinhanh'];

  } else {
      echo "Không tìm thấy dữ liệu với maloaihinh = $id đã cho.";
  }
} else {
  echo "Không có maloaihinh = $id được cung cấp.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Lấy dữ liệu từ form
  $maLoaiHinh = $_GET['id'];
  $tenLoaiHinh = $_POST["tenloaihinh"];

  // Kiểm tra xem người dùng đã chọn hình ảnh mới hay không
  if ($_FILES["hinhanh"]["error"] == 0) {
    // Nếu có chọn hình mới, thực hiện xử lý upload
    $hinhanh = $_FILES["hinhanh"]["name"];
    $hinhanh_temp = $_FILES["hinhanh"]["tmp_name"];
    $hinhanh_path = "../../hinhanh/" . $hinhanh;
    $hinhanh = $hinhanh_path;
    move_uploaded_file($hinhanh_temp, $hinhanh_path);
  } else {
      // Nếu không có chọn hình mới, giữ nguyên hình ảnh cũ
      $hinhanh = $hinhanh;
  }
  // Cập nhật dữ liệu vào bảng tblloaihinh
  $sql = "UPDATE tblloaihinh SET tenloaihinh='$tenLoaiHinh', hinhanh='$hinhanh' WHERE maloaihinh=$maLoaiHinh";

  if ($conn->query($sql) === TRUE) {
      echo "<script>alert('cập nhật loại hình thành công');</script>";

      // Sau khi cập nhật, chuyển hướng về trang danh sách
      echo "<script>window.location = '$port/admin/loaihinhdulich/danhsach.php';</script>";
  } else {
      echo "Lỗi: " . $sql . "<br>" . $conn->error;
  }
}
// Đóng kết nối
$conn->close();
?>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <h2 style="text-align:center">CẬP NHẬT LOẠI HÌNH</h2>
            <form aaction="them.php" method="POST" class="was-validated" enctype="multipart/form-data">
              <div class="form-group">
                <label for="ten_monan">Tên loại hình:</label>
                <input type="text" class="form-control" id="tenloaihinh" placeholder="Tên món ăn" name="tenloaihinh" value="<?php echo $tenLoaiHinh; ?>" required >
              </div>
              <div class="form-group">
                <label for="hinhanh">Hình ảnh:</label>
                <input type="file" class="form-control" id="hinhanh" placeholder="Chọn hình ảnh" name="hinhanh" value= '<?php echo $hinhanh; ?>'>
                <img class='hinhanhmonan' src="../../hinhanh/<?php echo $hinhanh; ?>" value= '<?php echo $hinhanh; ?>' name="hinhanh">
              </div>
              <button type="submit" class="btn btn-success">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>