<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./css/base.css">
</head>
<?php
    // Kết nối cơ sở dữ liệu
    include('../connect.php');
?>
<body>
<!-- Page Content -->
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column mt-4">
                    <li class="nav-item">
                        <a class="nav-link active h4" href='<?php echo $port ?>/admin/'>
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
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">TRANG CHỦ</h1>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lượt truy cập</h5>
                    <p class="card-text">813</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Số lượng điểm du lịch</h5>
                    <p class="card-text">
                        <?php
                        // Truy vấn dữ liệu từ bảng tbldiemden
                        $sql = "SELECT * FROM tbldiemden";
                        $result = $conn->query($sql);
                        $i = 0;
                        while($row = $result->fetch_assoc()){
                            $i++;
                        }
                        echo $i;
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Số lượng loại hình du lịch</h5>
                    <p class="card-text">
                    <?php
                        // Truy vấn dữ liệu từ bảng tbldiemden
                        $sql = "SELECT * FROM tblloaihinh";
                        $result = $conn->query($sql);
                        $i = 0;
                        while($row = $result->fetch_assoc()){
                            $i++;
                        }
                        echo $i;
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <h2>Vị trí địa lý</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125753.20808055486!2d106.26245355962965!3d9.951609702671975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a017515cc705df%3A0xade5b5649cd70f79!2zVHAuIFRyw6AgVmluaCwgVHLDoCBWaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1703562113087!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</main>

    </div>
</div>
<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
