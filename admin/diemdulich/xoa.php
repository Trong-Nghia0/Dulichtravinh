<?php
// Kết nối CSDL
include('../../connect.php');

// Kiểm tra xem có tham số id truyền vào từ URL hay không
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lấy đường dẫn hình ảnh từ CSDL
    $sqlSelect = "SELECT hinhanh FROM `tbldiemden` WHERE madiemden = $id";
    $resultSelect = $conn->query($sqlSelect);
    $row = $resultSelect->fetch_assoc();
    $hinhanhPath = $row['hinhanh'];

     // Xóa file hình ảnh từ hệ thống tệp
    if (file_exists($hinhanhPath)) {
        unlink($hinhanhPath);
    }

    // Thực hiện câu truy vấn DELETE để xóa điểm du lịch
    $sql = "DELETE FROM tbldiemden WHERE madiemden = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Xóa điểm du lịch thành công');</script>";

        // Chuyển hướng về trang danh sách sau khi xóa
        echo "<script>window.location = '$port/admin/diemdulich/danhsach.php';</script>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Không có ID được cung cấp.";
}

// Đóng kết nối
$conn->close();
?>
