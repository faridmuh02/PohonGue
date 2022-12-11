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

    <!-- shop page Section Start Here -->
    <div class="shop-page">
        <div class="container">
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-12">
                        <article>
                            <div class="shop-title d-flex flex-wrap justify-content-between">
                                <p>View Layout</p>
                                <div class="product-view-mode">
                                    <a class="active" data-target="grids"><i class="fas fa-th"></i></a>
                                    <a data-target="lists"><i class="fas fa-th-list"></i></a>
                                </div>
                            </div>
							
	
                            <div class="shop-product-wrap grids row justify-content-center">
                            <?php foreach ($pohon as $a)
                            { ?>
                                
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="product-item">
                                            <div class="product-thumb">
                                                <img src="../../assets/images/produk/<?=$a->gambar; ?>" alt="shope">
                                                <div class="product-action-link">
                                                    <a href="../../assets/images/produk/<?=$a->gambar; ?>" data-rel="lightcase"><i class="icofont-eye"></i></a>
                                                </div>
                                            </div>
                                        <div class="product-content">
                                            <h6><a href=<?php echo site_url('home/shopSingle/').$a->id ?>><?=$a->nama ?></a></h6>
                                            <h6>Rp. <?=$a->harga ?></h6>
                                        </div>
                                    </div>

                                    <div class="product-list-item">
                                        <div class="product-thumb">
                                            <img src="../../assets/images/produk/<?=$a->gambar; ?>" alt="shope">
                                            <div class="product-action-link">
                                                <a href="../../assets/images/produk/<?=$a->gambar; ?>" data-rel="lightcase"><i class="icofont-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h6><a href=<?php echo site_url('home/shopSingle/').$a->id ?>><?=$a->nama ?></a></h6>
                                            <h6>Rp. <?=$a->harga ?></h6>
                                            <p><?=$a->deskripsi ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                            
	
                        </article>
                    </div>
	<!-- search bar -->
                   
                </div>
            </div>
        </div>
    </div>
    <!-- shop page Section ENding Here -->

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