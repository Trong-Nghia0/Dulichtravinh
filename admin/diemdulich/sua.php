<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CẬP NHẬT ĐIỂM DU LỊCH</title>
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
  $maDiemDen = $_GET['id'];
  // Truy vấn dữ liệu với madiemden đã nhận được
  $sql = "SELECT * FROM `tbldiemden` WHERE 	`madiemden` = $maDiemDen";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // Lấy dữ liệu từ bảng và hiển thị form để cập nhật
      $row = $result->fetch_assoc();
      $tenDiemDuLich = $row["tendiemden"];
      $DiaChi = $row["diachi"];
      $GioMoCua = $row["giomocua"];
      $GioDongCua = $row["giodongcua"];
      $GioThamQuan = $row["giothamquan"];
      $Gia = $row["gia"];
      $MoTa = $row["mota"];
      $hinhanh = $row['hinhanh'];
      $MaLoaiHinh = $row['maloaihinh'];
  } else {
      echo "Không tìm thấy dữ liệu với madiemden = $maDiemDen đã cho.";
  }
} else {
  echo "Không có madiemden = $maDiemDen được cung cấp.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Lấy dữ liệu từ form
  $maDiemDen = $_GET['id'];
  $tenDiemDuLich = $_POST["tendiemden"];
  $DiaChi = $_POST["diachi"];
  $GioMoCua = $_POST["giomocua"];
  $GioDongCua = $_POST["giodongcua"];
  $GioThamQuan = $_POST["giothamquan"];
  $Gia = $_POST["gia"];
  $MoTa = $_POST["mota"];
  $MaLoaiHinh = $_POST["maloaihinh"];
  echo $GioMoCua;
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
  // Cập nhật dữ liệu vào bảng tbldiemden
  $sql = "UPDATE `tbldiemden` SET tendiemden = '$tenDiemDuLich', diachi = '$DiaChi', hinhanh = '$hinhanh', mota = '$MoTa', giomocua = '$GioMoCua', giodongcua = '$GioDongCua', giothamquan = '$GioThamQuan', gia = '$Gia', maloaihinh = $MaLoaiHinh WHERE madiemden=$maDiemDen";

  if ($conn->query($sql) === TRUE) {
      echo "<script>alert('cập nhật điểm du lịch thành công');</script>";


      // Sau khi cập nhật, chuyển hướng về trang danh sách
      echo "<script>window.location = '$port/admin/diemdulich/danhsach.php';</script>";
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
            <h2 style="text-align:center">CẬP NHẬT ĐIỂM DU LỊCH</h2>
            <form aaction="them.php" method="POST" class="was-validated" enctype="multipart/form-data">
              <div class="form-group">
                <label for="ten_monan">Tên điểm du lịch:</label>
                <select class='mien' name="maloaihinh" id="">
                  <?php
                  // select ra danh sách điểm đến
                  $sql2 = "SELECT * FROM tblloaihinh";
                  $conn2 = new mysqli("localhost", "root", "", "db_dulich");
                  $result2 = $conn2->query($sql2);
                  if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                      if($row2['maloaihinh'] == $MaLoaiHinh) {
                        echo "<option value='" . $row2['maloaihinh'] . "' selected>" . $row2['tenloaihinh'] . "</option>";
                      } else {
                        echo "<option value='" . $row2['maloaihinh'] . "'>" . $row2['tenloaihinh'] . "</option>";
                      }
                      
                    }
                  } else {
                    echo "Không tìm thấy điểm du lịch.";
                  }
                 
                  ?>
                </select>
              </div>  
             <div class="form-group">
                <label for="ten_monan">Tên địa điểm:</label>
                <input type="text" class="form-control" id="tendiemden" placeholder="Tên điểm du lịch" name="tendiemden" value='<?php echo $tenDiemDuLich?>' required>
              </div>
              <div class="form-group">
                <label for="ten_monan">Địa chỉ:</label>
                <input type="text" class="form-control" id="diachi" placeholder="Địa chỉ" name="diachi" value='<?php echo $DiaChi?>' required>
              </div>
              <div class="form-group">
                <label for="ten_monan">Giờ mở cửa:</label>
                <input type="Time" class="form-control" id="giomocua" placeholder="Giờ mở cửa" name="giomocua" value='<?php echo $GioMoCua?>' required>
              </div>
              <div class="form-group">
                <label for="ten_monan">Giờ đóng cửa:</label>
                <input type="Time" class="form-control" id="giodongcua" placeholder="Giờ đóng cửa" name="giodongcua" value='<?php echo $GioDongCua?>' required>
              </div>
              <div class="form-group">
                <label for="ten_monan">Giờ tham quan:</label>
                <input type="Time" class="form-control" id="giothamquan" placeholder="Giờ tham quan" name="giothamquan" value='<?php echo $GioThamQuan?>' required>
              </div>
              <div class="form-group">
                <label for="ten_monan">Giá:</label>
                <input type="text" class="form-control" id="gia" placeholder="Giá vé" name="gia" value='<?php echo $Gia?>' required>
              </div>
              <div class="form-group">
                <label for="hinhanh">Hình ảnh:</label>
                <input type="file" class="form-control" id="hinhanh" placeholder="Chọn hình ảnh" name="hinhanh" value= '<?php echo $hinhanh; ?>'>
                <img class='hinhanhmonan' src="../../hinhanh/<?php echo $hinhanh; ?>" value= '<?php echo $hinhanh; ?>' name="hinhanh">
            
              </div>
              <div class="form-group">
                <label for="cachnau">Mô tả :</label>
                <textarea  type="text" class="form-control" id="mota" placeholder="Mô tả " name="mota" required><?php echo $MoTa ?></textarea >
            
              </div>
              
              <button type="submit" class="btn btn-success">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>