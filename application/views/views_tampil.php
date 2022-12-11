<?php
if (!isset($_SESSION['username'])) 
{
  $this->load->view('views_login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PohonGue</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/x-icon/01.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/lightcase.css">
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
                            <img src="assets/images/logo/logo.png" alt="logo">
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


    <!-- ==========Banner Section start Here========== -->
    <section class="banner-section">
        <div class="container">
            <div class="banner-wrapper">
                <div class="  ">
                    <div class="">
                        <div class="banner-image" style="height: auto; width: auto;">
                            <img src="assets/images/banner/banner.png">
                        </div>
                        <div class="banner-content">
                            <h1 class="mt-0"> Pohon Saya Terserah Anda</h1>
                            <p>Menjual berbagai jenis pohon hias dan buah dari berbagai daerah di Indonesia.</p>
                            <a href=<?php echo site_url('home/shop')?> class="lab-btn mt-3"><span><i class="icofont-tree"></i>
                                    Beli Pohon</span> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Banner Section end Here========== -->


    


    <!-- Speakers section start here -->
    <section class="speakers-section padding-tb padding-b shape-img">
        <div class="container">
            <div class="section-header">
                <h2>Berbagai jenis Pohon Hias dan Buah</h2>
                <p>Dari Seluruh Indonesia</p>
            </div>
            <div class="section-wrapper">
                <div class="row g-4 justify-content-center">
                    <?php foreach ($pohon as $a): ?>
                    <div class="col-xl-6 col-lg-8 col-12">
                        <div class="speaker-item">
                            <div class="speaker-inner">
                                <div class="speaker-thumb">
                                    <img src="assets/images/produk/<?=$a->gambar; ?>" alt="speaker">
                                </div>
                                <div class="speaker-content">
                                    <div class="spkr-content-title d-flex flex-wrap justify-content-between">
                                        <div class="speaker-infos">
                                            <h5><a href=<?php echo site_url('home/shopSingle/').$a->id ?>><?=$a->nama ?></a> </h5>
                                            <p>Stok: <?=$a->stok ?></p>
                                        </div>
                                    </div>
                                    <div class="spkr-content-details">
                                        <p><?=$a->deskripsi ?></p>
                                            <h6>Rp. <?=$a->harga ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
            
            </div>
        </div>
    </section>
    <!-- Speakers section end here -->

    <!-- ===== Map  Section start here  ==== -->
    <div class="map-section">
        <div class="section-header">
                <h2>Toko Kami</h2>
                <p>Indonesia, Bogor Jawa Barat</p>
            </div>
        <div class="container-fluid">
            <div class="map-wrapper">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.44796291874!2d106.80650200969119!3d-6.591110175961704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5f2b25cf481%3A0x18a4eabbf4da5231!2sIPB%20Cilibende!5e0!3m2!1sen!2sid!4v1661413768682!5m2!1sen!2sid" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <!-- ===== Map  Section end here  ==== -->


    <!-- Footer Section start here -->
    <footer class="footer-section padding-tb padding-b" style="background-image: url(assets/images/footer/bg.jpg);">
        <div class="container">
            <div class="footer-content text-center">
                <a href="index.php">
                    <img src="assets/images/footer/logo.png" alt="eventoz">
                </a>
                <ul class="social-icons justify-content-center">
                    <li><a href="user/coming-soon.php"><i class="icofont-facebook"></i></a></li>
                    <li><a href="user/coming-soon.php"><i class="icofont-twitter"></i></a></li>
                    <li><a href="user/coming-soon.php"><i class="icofont-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- Footer Section end here -->


    <!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="icofont-bubble-up"></i><span class="pluse_1"></span><span
            class="pluse_2"></span></a>
    <!-- scrollToTop ending here -->


    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/fontawesome.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/swiper.min.js"></script>
    <script src="assets/js/circularProgressBar.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/lightcase.js"></script>
    <script src="assets/js/functions.js"></script>
</body>

</html>