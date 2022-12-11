
<?php 



if (!isset($_SESSION['username'])) 
{
  $this->load->view('views_login');
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>PohonGue</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../../../assets/images/x-icon/01.png">

    <link rel="stylesheet" href="../../../assets/css/animate.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/all.min.css">
    <link rel="stylesheet" href="../../../assets/css/icofont.min.css">
    <link rel="stylesheet" href="../../../assets/css/lightcase.css">
    <link rel="stylesheet" href="../../../assets/css/swiper.min.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
</head>

<body>

    <!-- preloader start here -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader ending here -->

    <!-- ==========Header Section Starts Here========== -->
    <header class="header-fixed">
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href=<?php echo base_url()?>>
                            <img src="../../../assets/images/logo/logo.png" alt="logo">
                        </a>
                    </div>
                    <div class="menu-area">
                    <ul class="menu">
                            <li>
                                <a href=<?php echo base_url()?>>Beranda</a>
                            </li>
                            <li>
                                <a href=<?php echo site_url('home/shop')?>>Belanja</a>
                            </li>
                            <li>
                                <a href=<?php echo site_url('home/sellers')?>>Penjual</a>
                            </li>
                            <li>
                                <a href=<?php echo site_url('home/cekOngkir')?>>Cek Ongkir</a>
                            </li>
                            <li>
                                <a href=<?php echo site_url('home/contact')?>>Kontak Kami</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><?php echo $_SESSION['username'] ."!"; ?></a>
                                <ul class="submenu">
                                    <li><a href= <?php echo site_url('home/logout') ?>>Logout</a></li>
                                </ul>   
                            </li>
                        </ul>
                        <!-- toggle icons -->
                        <div class="header-bar d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ==========Header Section Ends Here========== -->

    <!-- Page Header Section Start Here -->
            <div class="section-header">
                <h2>Detail Petani Pemilik Pohon</h2>
                <p>Dari Seluruh Indonesia</p>
            </div>
    <!-- Page Header Section Ending Here -->

    <?php foreach($petani as $u) ?>
    <!-- Scholar single section start Here -->
    <div class="scholar-single-section padding-tb padding-b">
        <div class="container">
            <div class="section-wrapper rounded">
                <div class="section-inner">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="scholar-left">
                                <div class="scholar-single-item">
                                    <div class="scholar-single-thumb" style="height: 300px; width: 300px;">
                                        <img src="../../../assets/images/penjual/<?php echo $u->gambar ?>"alt="scholar" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" style="margin-top: 50px;">
                            <div class="scholar-right">
                                <div class="scholar-intro">
                                    <h5><?php echo $u->nama ?></h5>
                                    <p><?php echo $u->deskripsi ?></p>
                                </div>
                                <div class="scholar-info">
                                    <div class="scholar-other-info">
                                        <ul class="lab-ul">
                                            <li><span class="info-title">Address </span><span class="info-details">:
                                                    <?php echo $u->alamat ?></span></li>
                                            <li><span class="info-title">Email</span><span class="info-details">:
                                                    <?php echo $u->email ?></span></li>
                                            <li><span class="info-title">Nomor Telepon</span><span class="info-details">: <?php echo $u->no_hp ?></span></li>
                                            
                                            <li><span class="info-title">Contact</span>
                                                <div class="info-details">
                                                    <ul class="lab-ul d-flex">
                                                        <li> : <a href="https://api.whatsapp.com/send/?phone=<?php echo $u->no_hp ?>&text&type=phone_number&app_absent=0" class="twitter"> <i
                                                                    class="icofont-whatsapp">Whatsapp</i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scholar single section end Here -->

    <!-- Footer Section start here -->
    <footer class="footer-section padding-tb padding-b" style="background-image: url(../../../assets/images/footer/bg.jpg);">
        <div class="container">
            <div class="footer-content text-center">
                <a class="mb-2" href="index.php"><img src="../../../assets/images/footer/logo.png" alt="eventoz"></a>
                <ul class="social-icons justify-content-center">
                    <li><a href="coming-soon.php"><i class="icofont-facebook"></i></a></li>
                    <li><a href="coming-soon.php"><i class="icofont-twitter"></i></a></li>
                    <li><a href="coming-soon.php"><i class="icofont-instagram"></i></a></li>php
                </ul>
            </div>
        </div>
    </footer>
    <!-- Footer Section end here -->



    <!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="icofont-bubble-up"></i><span class="pluse_1"></span><span
            class="pluse_2"></span></a>
    <!-- scrollToTop ending here -->


    <script src="../../../assets/js/jquery.js"></script>
    <script src="../../../assets/js/fontawesome.min.js"></script>
    <script src="../../../assets/js/waypoints.min.js"></script>
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/js/swiper.min.js"></script>
    <script src="../../../assets/js/circularProgressBar.min.js"></script>
    <script src="../../../assets/js/isotope.pkgd.min.js"></script>
    <script src="../../../assets/js/lightcase.js"></script>
    <script src="../../../assets/js/functions.js"></script>
</body>

</html>