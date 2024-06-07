<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <link href="https://scontent.iocvnpt.com/resources/portal/Images/CTO/superadminportal.cto/Logo/logo_636971561338402893.png" rel="Shortcut Icon"> -->
    <link rel="stylesheet" href="./public//assets/css/boostrap.css">
    <link rel="stylesheet" href="./public//assets/css/main.css">
    <link rel="stylesheet" href="./public//assets/css/style.css">
    <link rel="stylesheet" href="./public//assets/css/loading.css">
    <title>Du Lịch Trà Vinh</title>
</head>
<?php 
    // Kết nối cơ sở dữ liệu
    include('../connect.php');
    
    // Truy vấn dữ liệu từ bảng tbldiemden
    $sql = "SELECT * FROM tblbaiviet LIMIT 3";
    $result = $conn->query($sql);
    
    // Đóng kết nối
    $conn->close();
?>
<style>
        .product-list {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
        }

        .product {
            flex: 0 0 calc(25% - 20px); /* Chia thành 4 cột, 20px là margin giữa các sản phẩm */
            box-sizing: border-box;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
<body>

<header id="header">
    <div class="header-top bgc--green text--white p-1 px-3">
<div class="d-flex justify-content-end justify-content-sm-between" style="position:relative;overflow:hidden;">
<div class="left d-none d-sm-block">
    <div class="contact-info-contain d-flex">
        <a href="#" style="" class="mirror-hotline-left me-2 me-md-5 text--white">
            <i class="bi bi-envelope-fill"></i>
            <span class="font-inter">ttxtdltravinh@gmail.com</span>
        </a>
    </div>
</div>
<div style="" class="mirror-hotline-right right">
    <div class="d-flex">
        <div class="search-form d-none d-lg-flex align-items-center">
            <div class="input-search d-none">
                <input type="text" class="input-search-ele">
            </div>
            <div>
                <a href="#" class="text-white" data-bs-toggle="modal" data-bs-target="#search-form"><i class="bi bi-search"></i></a>
            </div>
        </div>
        <div class="lang px-md-3">
            <div class="d-flex">

                
            </div>
        </div>
                </div>
            </div>
            <a id="slider_hotline" href="#" style="" class="">
                <i class="bi bi-telephone-fill"></i>
                <span class="font-inter">Hotline hỗ trợ:  0915 515659</span>
            </a>
        </div>
    </div>
    <nav class="navbar navbar-expand-xl bgc--white">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
                <img alt="Cổng TTĐT Du Lịch" src="data:image/jpeg;base64,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" width="70" class="img-responsive">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
<div class="collapse navbar-collapse" id="nav-content">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        TIN TỨC
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="#">Sự kiện du lịch</a>
        </li>
        <li>
            <a class="dropdown-item" href="#">Giới thiệu Trà Vinh</a>
        </li>
        <li>
            <a class="dropdown-item" href="#">Thông báo</a>
        </li>
        <li>
            <a class="dropdown-item" href="#">Văn hóa Trà Vinh</a>
        </li>
        <li>
            <a class="dropdown-item" href="#">Lịch sử Trà Vinh</a>
        </li>
    </ul>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="diemden.php">ĐIỂM ĐẾN</a>
    </li>              
    <li class="nav-item">                
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        DỊCH VỤ
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="#">Mua sắm</a>
        </li>
        <li>
            <a class="dropdown-item" href="#">Giải trí</a>
        </li>
    </ul>
        
    </li>       
    <li class="nav-item">
    <a class="nav-link " href="#">LỊCH TRÌNH</a>
    </li>                      
    <form class="d-flex" role="search">
        <button class="btn text--white btn-green" id="login_system" type="button">Đăng nhập</button>
    </form>
            </div>
        </div>
    </nav>
</header>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 96%; margin-left: 2%;">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://ik.imagekit.io/tvlk/blog/2022/02/dia-diem-du-lich-tra-vinh-cover.jpeg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://intour.vn/upload/img/2022/03/15/tong_hop_cac_dia_diem_du_lich_vui_choi_noi_tieng_o_tra_vinh_1647313984.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://dulichtravinh.com.vn/wp-content/uploads/2021/08/slider-1.jpeg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<section id="home-popular-location" data-aos="fade-up" class="aos-init aos-animate mt-5">
    <div class="bg" style="background-image: url('/Content/theme/imgs/home-popular-location-bg.png');">
        <div class="bg-overlay" style="background-color: #59BC43;">
        <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <!-- Lập qua bảng loại hình để render tất cả loại hình đã có -->
                    <?php 
                        $sql1 = "SELECT * FROM tblloaihinh";
                        $conn1 = new mysqli("localhost", "root", "", "db_dulich");
                        $result1 = $conn1->query($sql1);
                        $maloaihinh = ""; // mặc định bằng rỗng
                        if (isset($_GET['maloaihinh'])) { // nếu có maloaihinh xuất hiện trên đường dẫn thì lấy gán vào biến $maloaihinh
                            $maloaihinh = $_GET['maloaihinh'];

                        } 
                        while($row1 = $result1->fetch_assoc()){
                    ?>
                    <a class="nav-link text-white active" id="nav-place-popular-tab" type="submit" href ="http://localhost/web_gioi_thieu_du_lich/user/diemden.php?maloaihinh=<?php echo $row1['maloaihinh']?>"><?php echo $row1['tenloaihinh']?></a>
                    <?php }?>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-place-popular" role="tabpanel" aria-labelledby="nav-place-popular-tab">
            <div class="container py-4">
            <div class="heading-custom-green">
              <div class="container">
                  <h2 class="text--white">ĐIỂM DU LỊCH</h2>
                  <div class="line bgc--white">
                      <hr>
                  </div>
              </div>
            </div>
            <div class="row">
                <div class="product-list">
                    <?php
        $sql2 = "SELECT * FROM tbldiemden";
        $conn2 = new mysqli("localhost", "root", "", "db_dulich");
        $result2 = $conn2->query($sql2);
        //nếu maloaihinh bằng rỗng thì render ra tất cả điểm du lich, ngược lại thì render theo maloaihinh
        if($maloaihinh == "") { 
            while($row = $result2->fetch_assoc()) {
        ?>
        <div class="product d-inline-flex p-2 col-md-3">
            <div class="card mr-4 ml-4" style="width: 18rem;">
            <img class="card-img-top" src="../hinhanh/<?php echo $row["hinhanh"] ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row["tendiemden"] ?></h5>
                <p>
                    <?php
                    $maloaihinh = $row['maloaihinh'];
                    $sql3 = "SELECT tenloaihinh FROM tblloaihinh WHERE maloaihinh = $maloaihinh";
                    $conn3 = new mysqli("localhost", "root", "", "db_dulich");
                    $result3 = $conn3->query($sql3);
                        if ($result3->num_rows > 0) {
                            $row_loaihinh = $result3->fetch_assoc();
                            echo $row_loaihinh['tenloaihinh'];
                        } else {
                            echo "Không tìm thấy loại hình du lịch.";
                        }
                    ?>
                </p>
                <a href="./chitietdiemden.php?madiemden=<?php echo $row["madiemden"] ?>" class="btn btn-primary">Xem ngay</a>
            </div>
            </div>
        </div>
        <?php }} else { 

        while($row = $result2->fetch_assoc()){
            //kiểm tra mã loại hình nếu điểm đến có maloaihinh  bằng maloaihinh lấy được khi ấn vào nút tên loại hình
            if($maloaihinh == $row['maloaihinh']) {
            ?>
        <div class="product d-inline-flex p-2 col-md-3">
            <div class="card mr-4 ml-4" style="width: 18rem;">
            <img class="card-img-top" src="../hinhanh/<?php echo $row["hinhanh"] ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row["tendiemden"] ?></h5>
                <p>
                    <?php
                    $maloaihinh = $row['maloaihinh'];
                    $sql3 = "SELECT tenloaihinh FROM tblloaihinh WHERE maloaihinh = $maloaihinh";
                    $conn3 = new mysqli("localhost", "root", "", "db_dulich");
                    $result3 = $conn3->query($sql3);
                        if ($result3->num_rows > 0) {
                            $row_loaihinh = $result3->fetch_assoc();
                            echo $row_loaihinh['tenloaihinh'];
                        } else {
                            echo "Không tìm thấy loại hình du lịch.";
                        }
                    ?>
                </p>
                <a href="./chitietdiemden.php?madiemden=<?php echo $row["madiemden"] ?>" class="btn btn-primary">Xem ngay</a>
</div>
            </div>
        </div>
        <?php  }}}?>
    </div>
</div>
</div>
    </div>
</section>

<section id="home-come-to" class="bgc--green-1 py-5 aos-init aos-animate" style="margin-bottom: 20px; background-color: #FF9933" data-aos="fade-up">
  <div class="heading-custom-green">
      <div class="container">
          <h2 class="text--white">THAM QUAN ĐIỆN TỬ</h2>
          <div class="line bgc--white">
              <hr>
          </div>
      </div>
  </div>
  <div class="container">
      <div class="row g-3">
              <div class="col-12 col-md-6 col-lg-3">
        <a href="https://eva.vn/bep-eva/dac-san-tra-vinh-giao-thoa-cua-3-nen-van-hoa-c162a191481.html">
            <div class="come-to-item-contain">
                <img class="w-100" src="https://cdn.eva.vn//upload/3-2014/images/2014-08-12/1407808282-bun-nuoc-leo.jpg" alt="Tờ gấp ẩm thực 2023" onerror="this.src='/Images/NoImage/Transparency/NoImage400x266.png'">
                <div class="content bgc--white p-4">
                    <h5 style="color: #FF9933" class="text-center">Đặc sản Trà Vinh</h5>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3">
        <a href="https://vi.alongwalker.co/ban-do-du-lich-va-hanh-chinh-tinh-tra-vinh-online-nhieu-nguoi-xem-nhat-s235808.html">
            <div class="come-to-item-contain">
                <img class="w-100" src="https://cdn.alongwalk.info/vn/wp-content/uploads/2022/05/07165326/image-ban-do-du-lich-va-hanh-chinh-tinh-tra-vinh-online-nhieu-nguoi-xem-nhat-165189200635117.jpg" alt="Bản đồ du lịch năm 2023" onerror="this.src='/Images/NoImage/Transparency/NoImage400x266.png'">
                <div class="content bgc--white p-4">
                    <h5 style="color: #FF9933" class="text-center">Bản đồ du lịch năm 2023</h5>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3">
        <a href="https://dulichthuduc.com.vn/khu-du-lich-sinh-thai-rung-duoc-tra-vinh-.html">
            <div class="come-to-item-contain">
                <img class="w-100" src="https://dulichthuduc.com.vn/vnt_upload/news/MIEN-TAY/ca-mau/rung_duoc_ca_mau_du_lich_thu_duc.jpg" alt="Tờ gấp du lịch sinh thái 2023" onerror="this.src='/Images/NoImage/Transparency/NoImage400x266.png'">
                <div class="content bgc--white p-4">
                    <h5 style="color: #FF9933" class="text-center">du lịch sinh thái 2023</h5>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3">
        <a href="https://www.vntrip.vn/cam-nang/dia-diem-du-lich-tra-vinh-79995">
            <div class="come-to-item-contain">
                <img class="w-100" src="https://cdn.vntrip.vn/cam-nang/wp-content/uploads/2018/08/huynh-kha-2.png" alt="Tờ gấp 10 điểm tiêu biểu 2023" onerror="this.src='/Images/NoImage/Transparency/NoImage400x266.png'">
                <div class="content bgc--white p-4">
                    <h5 style="color: #FF9933" class="text-center">Giải trí Trà Vinh 2023</h5>
                </div>
            </div>
        </a>
    </div>

      </div>
  </div>
</section>

<footer id="footer" style="background-image: url('/Content/theme/imgs/bg-foot.png');">
  <div class="bg-black">
      <div class="container-xxl py-4">
          <div class="row g-md-3 g-2">
              <div class="col-12 col-sm-2 col-lg-2">
    <div class="social-contain">
        <div class="mb-2">
            <img src="https://dulichtravinh.com.vn/wp-content/uploads/2021/09/tin-tuc-9.jpg" alt="logo">
        </div>
        <div class="d-flex align-items-center justify-content-between">
                <a href="https://www.facebook.com/pages/S%E1%BB%9F-V%C4%83n-H%C3%B3a-Th%E1%BB%83-Thao-Du-L%E1%BB%8Bch-Tr%C3%A0-Vinh/330280760708586?locale=vi_VN" target="_blank" title="Facebook">
                    <img src="https://scontent.iocvnpt.com/resources/portal/Images/CTO/superadminportal.cto/facebook_190873608.png" alt="Facebook">
                </a>
            <a href="https://www.youtube.com/@daiptthtv" target="_blank" title="Youtube">
<img src="https://scontent.iocvnpt.com/resources/portal/Images/CTO/superadminportal.cto/youtube_376986465.png" alt="Youtube">
</a>
            <a href="" target="_blank" title="Tiktok">
                    <img src="https://scontent.iocvnpt.com/resources/portal/Images/CTO/superadminportal.cto/tiktok_358407052.png" alt="Tiktok">
                </a>
        </div>
    </div>
</div>
              <div class="col-12 col-sm-10 col-lg-4">
                  <div class="mid">
                      <h3 class="text--white" style="font-size: 14px;">
        <p>SỞ VĂN HÓA, THỂ THAO VÀ DU LỊCH THÀNH PHỐ TRÀ VINH<br>
        TRUNG TÂM XÚC TIẾN DU LỊCH TRÀ VINH</p>

    </h3>
    <div class="information-contain">
        <div class="d-flex info align-items-start">
            <div class="d-flex align-items-center info-prop">
                <i class="bi bi-geo-alt-fill text--green me-3"></i>
                <span class="text--white">Địa chỉ</span>
            </div>
            <div class="info-value">
                <span class="text--white">6A Nguyễn Thị Minh Khai- phường 1 - Thành phố Trà Vinh - Tỉnh Trà Vinh</span>
            </div>
        </div>
    </div>
    <div class="information-contain">
        <div class="d-flex info align-items-start">
            <div class="d-flex align-items-center info-prop">
                <i class="bi bi-telephone-fill text--green me-3"></i>
                <span class="text--white">Số điện thoại</span>
            </div>
            <div class="info-value">
                <span class="text--white">
                0294 3851819 - 0294 3841819
                </span>
            </div>
        </div>
    </div>
    <div class="information-contain">
        <div class="d-flex info align-items-center">
            <div class="d-flex align-items-center info-prop">
                <i class="bi bi-envelope-fill text--green me-3"></i>
                <span class="text--white">Email</span>
            </div>
            <div class="info-value">
                <span class="text--white">ttxtdltravinh@gmail.com</span>
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-12 col-sm-4 col-lg-2">
<div class="foot-right foot-links px-5">
    <h4 class="text--white text-center">LIÊN KẾT</h4>
    <ul>
        <li><a href="#">Trang chủ</a></li>
        <li><a href="#">Khách sạn</a></li>
        <li><a href="#">Ẩm thực</a></li>
        <li><a href="#">Khám phá</a></li>
        <li><a href="#">Mua sắm</a></li>
        <li><a href="#">Lịch trình</a></li>
        <li><a href="#">Về đêm</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-12 col-sm-4 col-lg-2">
                  <div class="foot-right">
                      <h4 class="text--white text-center">LIÊN KẾT WEBSITE</h4>
                      <ul id="link_website">
                    <li>
                        <a target="_blank" href="https://bvhttdl.gov.vn">
                            Bộ Văn Hóa, Thể Thao và Du Lịch
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="https://vietnamtourism.gov.vn">
                            Cục Du lịch Quốc gia Việt Nam
                        </a>
                    </li>

    </ul>
                  </div>
              </div>
              <!--<div class="col-12 col-sm-4 col-lg-2">
                  <div class="foot-right">
                      <h4 class="text--white text-center">LƯỢT TRUY CẬP</h4>
                      <div class="foot-views">
                          <div style="display:flex;justify-content:space-between; margin:5px">
                              <span class="text-left"> <i class="bi bi-person-fill text-white"></i></span>
                              <span>

                                  6.009.268
                              </span>
                          </div>
                          <div style="display:flex;justify-content:space-between; margin:5px">
                              <span>Hôm nay</span> <span>102</span>
                          </div>
                          <div style="display:flex;justify-content:space-between; margin:5px">
                              <span>Tuần này</span> <span>949</span>
                          </div>
                          <div style="display:flex;justify-content:space-between; margin:5px">
                              <span>Tháng này</span> <span>55.475</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
          <div class="p-2 bgc--green text--white text-center foot-bottom">
              <span>Copyright © 2023</span>
          </div>
  </div>-->
</footer>
  </div>
</body>
</html>