<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANH SÁCH LOẠI HÌNH DU LỊCH</title>
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
    
    // Truy vấn dữ liệu từ bảng tblloaihinh
    $sql = "SELECT * FROM tblloaihinh";
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
        <h2 style="text-align: center;"> DANH SÁCH LOẠI HÌNH DU LỊCH</h2> 
            <div class="card">
                <div class="card-body" >
                     <table class="table" style="text-align: center;">
                        <thead class="thead-dark">
                            <tr>
                                <th >ID</th>
                                <th class='maloaihinh'>Mã loại hình du lịch</th>
                                <th class='tenloaihinh'>Tên loại hình du lịch</th>
                                <th class='hinhanh'>Hình ảnh minh hoạ</th>
                                <th ></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                                while($row = $result->fetch_assoc()){ ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td class='maloaihinh'><?php echo $row['maloaihinh']; ?></td>
                                        <td class='tenloaihinh'><?php echo $row['tenloaihinh']; ?></td>
                                        <td class='hinhanh'>
                                            <img style ="width: 100px;" src="../../hinhanh/<?php echo $row['hinhanh']; ?>">
                                        </td>
                                        <td>
                                            <a href="<?php echo $port ?>/admin/loaihinhdulich/sua.php?id=<?php echo $row['maloaihinh']; ?>" class="btn btn-info">Sửa</a> 
                                             <!-- JavaScript để xác nhận xóa -->
                                                <script>
                                                    function HoiKhiDelete() {
                                                        return confirm("Bạn có chắc muốn xóa loại hình du lịch này?" + );
                                                    }
                                                </script>
                                            <a onclick="return HoiKhiDelete()"  href="<?php echo $port ?>/admin/loaihinhdulich/xoa.php?id=<?php echo $row['maloaihinh']?>" class="btn btn-danger" >Xóa</a>
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

   
</body>
</html>
