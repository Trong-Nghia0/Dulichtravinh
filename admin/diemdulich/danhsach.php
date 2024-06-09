<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANH SÁCH ĐIỂM DU LỊCH</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/danhsach.css">
    <link rel="stylesheet" href="../css/base.css">
</head> 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
    // Kết nối cơ sở dữ liệu
    include('../../connect.php');
    
    // Truy vấn dữ liệu từ bảng tbldiemden
    $sql = "SELECT * FROM tbldiemden";
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
                        <a class="nav-link active h6" href="<?php echo $port ?>/admin/index.php">
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
                            <h2 style="text-align: center;"> DANH SÁCH ĐIỂM DU LỊCH</h2> 
                            <div class="card">
                                <div class="card-body" >
                                    <table class="table" style="text-align: center;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th >STT</th>
                                                <th class='tendiadiem'>Tên Địa Điểm</th>
                                                <th class='tendiadiem'>Loại hình du lịch</th>
                                                <th class='diachi'>Địa Chỉ</th>
                                                <th class='hinhanh'>Hình Ảnh</th>
                                                <th class='gioimocua'>Giờ Mở Cửa</th>
                                                <th class='gioidongcua'>Giờ Đóng Cửa</th>
                                                <th class='gioithamquan'>Giờ Tham Quan</th>
                                                <th class='gia'>Giá</th>
                                                <th class='motadiadiem'>Mô Tả</th>
                                                <th></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                                while($row = $result->fetch_assoc()){ ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td class='tendiadiem'><?php echo $row['tendiemden']; ?></td>
                                                        <td class='tendiadiem'><?php 
                                                        // lấy tên loại hình du lịch từ maloaihinh lưu trong bảng tbldiemden
                                                        $maloaihinh = $row['maloaihinh'];
                                                        $sql2 = "SELECT tenloaihinh FROM tblloaihinh WHERE maloaihinh = $maloaihinh";
                                                        $conn2 = new mysqli("localhost", "root", "", "db_dulich");
                                                        $result2 = $conn2->query($sql2);
                                                            if ($result2->num_rows > 0) {
                                                                $row_loaihinh = $result2->fetch_assoc();
                                                                echo $row_loaihinh['tenloaihinh'];
                                                            } else {
                                                                echo "Không tìm thấy loại hình du lịch.";
                                                            }
                                                        ?></td>
                                                        <td class='diachi'><?php echo $row['diachi']; ?></td>
                                                        <td class='hinhanh'>
                                                            <img style ="width: 100px;" src="../../hinhanh/<?php echo $row['hinhanh']; ?>">
                                                        </td>  
                                                        <td class='gioimocua'><?php echo $row['giomocua']; ?></td>
                                                        <td class='gioidongcua'><?php echo $row['giodongcua']; ?></td>
                                                        <td class='gioithamquan'><?php echo $row['giothamquan']; ?></td>
                                                        <td class='gia'><?php echo $row['gia']; ?></td>
                                                        <td class='motadiadiem'><textarea name="" id="" cols="30" rows="10"><?php echo $row['mota']; ?></textarea> </td>
                                                        <td>
                                                            <a href="<?php echo $port ?>/admin/diemdulich/sua.php?id=<?php echo $row['madiemden']; ?>" class="btn btn-info">Sửa</a> 
                                                            <!-- JavaScript để xác nhận xóa -->
                                                                <script>
                                                                    function HoiKhiDelete() {
                                                                        return confirm("Bạn có chắc muốn xóa điểm du lịch này này?");
                                                                    }
                                                                </script>
                                                            <a onclick="return HoiKhiDelete()" href="<?php echo $port ?>/admin/diemdulich/xoa.php?id=<?php echo $row['madiemden']; ?>" class="btn btn-danger" >Xóa</a>
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
        </main>
    </div>
</div>
<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>