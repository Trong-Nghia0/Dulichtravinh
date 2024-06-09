<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANH SÁCH BÀI VIẾT</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/danhsach.css">
    <link rel="stylesheet" href="../css/base.css">

</head> 
<?php
    // Kết nối cơ sở dữ liệu
    include('../../connect.php');
    
    // Truy vấn dữ liệu từ bảng tbldiemden
    $sql = "SELECT * FROM tblbaiviet";
    $result = $conn->query($sql);
    
    // Đóng kết nối
    $conn->close(); 
?>  
<body>
<!-- Page Content -->
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column mt-4">
                    <li class="nav-item">
                        <a class="nav-link active h4" href='<?php echo $port ?>/admin/trangchu.php'>
                            <i class="fas fa-chart-bar"></i> DASHBOARD
                        </a>
                        <a class="nav-link active h6" href="<?php echo $port ?>/admin/diemdulich/danhsach.php">
                            <i class="fas fa-list"></i> ĐIỂM DU LỊCH
                        </a>
                        <a class="nav-link active h6" href="<?php echo $port ?>/admin/diemdulich/them.php">
                            <i class="fas fa-plus"></i> THÊM ĐIỂM DU LỊCH
                        </a>
                        <a class="nav-link active h6" href="<?php echo $port ?>/admin/loaihinhdulich/danhsach.php">
                            <i class="fas fa-list"></i> LOẠI HÌNH DU LỊCH
                        </a>
                        <a class="nav-link active h6" href="<?php echo $port ?>/admin/loaihinhdulich/them.php">
                            <i class="fas fa-plus"></i> THÊM LOẠI HÌNH
                        </a>
                        <a class="nav-link active h6" href="<?php echo $port ?>/admin/baiviet/danhsach.php">
                            <i class="fas fa-list"></i> BÀI VIẾT
                        </a>
                        <a class="nav-link active h6" href="<?php echo $port ?>/admin/baiviet/them.php">
                            <i class="fas fa-plus"></i> THÊM BÀI VIẾT
                        </a>
                        <a class="nav-link active h6" href="<?php echo $port ?>/admin">
                            <i class="fas fa-sign-out-alt"></i> ĐĂNG XUẤT
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container mt-5">
            <div class="form-group">
                <div class="container-fluid">
                <h2 style="text-align: center;"> DANH SÁCH BÀI VIẾT</h2> 
                    <div class="card">
                        <div class="card-body" >
                            <table class="table" style="text-align: center;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th >STT</th>
                                        <th class='tendiadiem'>Tên bài viết</th>
                                        <th class='tendiadiem'>Địa điểm du lịch</th>
                                        <th class='motadiadiem'>Chi tiết bài viết</th>
                                        <th class='hinhanh'>Hình Ảnh</th>
                                        <th></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                        while($row = $result->fetch_assoc()){ ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td class='tendiadiem'><?php echo $row['tenbaiviet']; ?></td>
                                                <td class='tendiadiem'><?php 
                                                        // lấy tên loại hình du lịch từ madiemden lưu trong bảng tblbaiviet
                                                        $madiemden = $row['madiemden'];
                                                        $sql2 = "SELECT tendiemden FROM tbldiemden WHERE madiemden = $madiemden";
                                                        $conn2 = new mysqli("localhost", "root", "", "db_dulich");
                                                        $result2 = $conn2->query($sql2);
                                                            if ($result2->num_rows > 0) {
                                                                $row_loaihinh = $result2->fetch_assoc();
                                                                echo $row_loaihinh['tendiemden'];
                                                            } else {
                                                                echo "Không tìm thấy loại điểm du lịch.";
                                                            }
                                                        ?></td>
                                                <td class='motadiadiem'><textarea name="" id="" cols="30" rows="10"><?php echo $row['chitietbaiviet']; ?></textarea> </td>
                                                <td class='hinhanh'>
                                                    <img style ="width: 100px;" src="../../hinhanh/<?php echo $row['hinhanh']; ?>">
                                                </td>  
                                                <td>
                                                    <a href="<?php echo $port ?>/admin/baiviet/sua.php?id=<?php echo $row['mabaiviet']; ?>" class="btn btn-info">Sửa</a> 
                                                    <!-- JavaScript để xác nhận xóa -->
                                                        <script>
                                                            function HoiKhiDelete() {
                                                                return confirm("Bạn có chắc muốn xóa điểm du lịch này này?");
                                                            }
                                                        </script>
                                                    <a onclick="return HoiKhiDelete()" href="<?php echo $port ?>/admin/baiviet/xoa.php?id=<?php echo $row['mabaiviet']; ?>" class="btn btn-danger" >Xóa</a>
                                                </td>
                                            </tr> 
                                    <?php  }?>
                                </tbody>
                            </table>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

   
</body>
</html>
