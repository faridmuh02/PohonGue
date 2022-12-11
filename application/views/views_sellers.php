<?php 
 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>PohonGue</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/x-icon/01.png">

    <link rel="stylesheet" href="../../assets/css/animate.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/icofont.min.css">
    <link rel="stylesheet" href="../../assets/css/lightcase.css">
    <link rel="stylesheet" href="../../assets/css/swiper.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>

    <!-- ==========Header Section Starts Here========== -->
    <header class="header-fixed">
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href=<?php echo base_url()?>>
                            <img src="../../assets/images/logo/logo.png" alt="logo">
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
                <h2>Para Petani Pemilik Pohon dan Tanaman Hias</h2>
                <p>Dari Seluruh Indonesia</p>
            </div>
    <!-- Page Header Section Ending Here -->

    <section class="speakers-section padding-tb padding-b shape-img">
        <div class="container">
            <div class="section-wrapper">
                <div class="row g-4 justify-content-center">

                    <?php foreach ($petani as $a){ ?>
                    <div class="col-xl-6 col-lg-8 col-12">
                        <div class="speaker-item">
                            <div class="speaker-inner">
                                <div class="speaker-thumb">
                                    <img src="../../assets/images/penjual/<?=$a->gambar;?>" alt="speaker">
                                </div>
                                <div class="speaker-content">
                                    <div class="spkr-content-title d-flex flex-wrap justify-content-between">
                                        <div class="speaker-infos">
                                            <h5><a href=<?php echo site_url('home/sellerSingle/').$a->id ?>><?=$a->nama ?></a> </h5>
                                        </div>
                                    </div>
                                    <div class="spkr-content-details">
                                        <p><?=$a->deskripsi ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
            </div>
        </div>
    </div>
    </section>
    <!-- Speakers section end here -->

    <!-- Footer Section start here -->
    <footer class="footer-section padding-tb padding-b" style="background-image: url(../../assets/images/footer/bg.jpg);">
        <div class="container">
            <div class="footer-content text-center">
                <a class="mb-2" href="index.php"><img src="../../assets/images/footer/logo.png" alt="eventoz"></a>
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

    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/fontawesome.min.js"></script>
    <script src="../../assets/js/waypoints.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/swiper.min.js"></script>
    <script src="../../assets/js/circularProgressBar.min.js"></script>
    <script src="../../assets/js/isotope.pkgd.min.js"></script>
    <script src="../../assets/js/lightcase.js"></script>
    <script src="../../assets/js/functions.js"></script>
</body>

</html>