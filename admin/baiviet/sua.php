<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CẬP NHẬT BÀI VIẾT</title>
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
  $maBaiViet = $_GET['id'];
  // Truy vấn dữ liệu với madiemden đã nhận được
  $sql = "SELECT * FROM `tblbaiviet` WHERE 	`mabaiviet` = $maBaiViet";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // Lấy dữ liệu từ bảng và hiển thị form để cập nhật
      $row = $result->fetch_assoc();
      $TenBaiViet = $row["tenbaiviet"];
      $MaDiemDen = $row["madiemden"];
      $MoTa = $row["chitietbaiviet"];
      $hinhanh = $row['hinhanh'];
  } else {
      echo "Không tìm thấy dữ liệu với madiemden = $maDiemDen đã cho.";
  }
} else {
  echo "Không có madiemden = $maDiemDen được cung cấp.";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Lấy dữ liệu từ form
  $maBaiViet = $_GET['id'];
  $TenBaiViet = $_POST["tenbaiviet"];
  $MaDiemDen = $_POST["madiemden"];
  $MoTa = $_POST["mota"];

  // Kiểm tra xem người dùng đã chọn hình ảnh mới hay không
  if ($_FILES["hinhanh"]["error"] == 0) {
    // Nếu có chọn hình mới, thực hiện xử lý upload
    $hinhanh = $_FILES["hinhanh"]["name"];
    $hinhanh_temp = $_FILES["hinhanh"]["tmp_name"];
    $hinhanh_path = "../../hinhanh/" . $hinhanh;
    $hinhanh = $hinhanh;
    move_uploaded_file($hinhanh_temp, $hinhanh_path);
  } else {
      // Nếu không có chọn hình mới, giữ nguyên hình ảnh cũ
      $hinhanh = $hinhanh;
  }
  // Cập nhật dữ liệu vào bảng tblbaiviet
  $sql = "UPDATE `tblbaiviet` SET tenbaiviet = '$TenBaiViet', madiemden = '$MaDiemDen', hinhanh = '$hinhanh', chitietbaiviet = '$MoTa' WHERE mabaiviet = $maBaiViet";

  if ($conn->query($sql) === TRUE) {
      echo "<script>alert('cập nhật bài viết thành công');</script>";


      // Sau khi cập nhật, chuyển hướng về trang danh sách
      echo "<script>window.location = '$port/admin/baiviet/danhsach.php';</script>";
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
        <h2 style="text-align:center">CẬP NHẬT ĐIỂM BÀI VIẾT</h2>
            <form aaction="them.php" method="POST" class="was-validated" enctype="multipart/form-data">
              <div class="form-group">
                <label for="ten_monan">Tên bài viết:</label>
                <input type="text" class="form-control" id="tenbaiviet" placeholder="Tên bài viết" name="tenbaiviet" value='<?php echo $TenBaiViet?>' required>
              </div>
              <div class="form-group">
                <label for="ten_monan">Tên điểm du lịch: <?php echo $TenBaiViet?></label>
                <select class='mien' name="madiemden" id="">
                  <option value="">----chọn điểm du lịch -----</option>
                  <?php
                  // select ra danh sách điểm đến
                  $sql2 = "SELECT * FROM tbldiemden";
                  $conn2 = new mysqli("localhost", "root", "", "db_dulich");
                  $result2 = $conn2->query($sql2);
                  if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                      if($row2['madiemden'] == $MaDiemDen) {
                        echo "<option value='" . $row2['madiemden'] . "' selected>" . $row2['tendiemden'] . "</option>";
                      } else {
                        echo "<option value='" . $row2['madiemden'] . "'>" . $row2['tendiemden'] . "</option>";
                      }
                    }
                  } else {
                    echo "Không tìm thấy điểm du lịch.";
                  }
                 
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="hinhanh">Hình ảnh:</label>
                <input type="file" class="form-control" id="hinhanh" placeholder="Hình ảnh minh hoạ" name="hinhanh" value= '<?php echo $hinhanh; ?>'>
                <img class='hinhanhmonan' src="../../hinhanh/<?php echo $hinhanh; ?>" value= '<?php echo $hinhanh; ?>' name="hinhanh">
              </div>
              <div class="form-group">
                <label for="cachnau">Chi tiết :</label>
                <textarea  type="text" class="form-control" id="mota" placeholder="Mô tả" name="mota" required><?php echo $MoTa; ?></textarea >
              </div>
              <button type="submit" class="btn btn-success">Thêm bài viết</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>