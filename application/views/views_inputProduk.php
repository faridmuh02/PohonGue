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
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/x-icon/01.png">

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
                        <a href=<?php site_url('home/adminViews') ?>>
                            <img src="../../assets/images/logo/logo.png" alt="logo">
                        </a>
                    </div>
                    <div class="menu-area">
                        <ul class="menu">
                            <li>
                                <a href=<?php echo site_url('home/produk') ?>>Produk</a>
                            </li>
                            <li>
                                <a href=<?php echo site_url('home/penjual') ?>>Penjual</a>
                            </li>
                            <li>
                                <a href=<?php echo site_url('home/review') ?>>Review</a>
                            </li>
                            <li>
                                <a href=<?php echo site_url('home/fusionChart') ?>>Fusion Chart</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><?php echo $_SESSION['username']; ?></a>
                                <ul class="submenu">
                                    <li><a href=<?php echo site_url('home/logout') ?>>Logout</a></li>
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
    <div class="container" style="background-color: white;">
            <div class="row container">
                    <div class="page clearfix">
                        <br>
                            <h2>Tambah Data Produk</h2>                    
                        <br>
                    </div>
                    <br>
                    <br>

                    <form action=<?php echo site_url('home/tambahAksiProduk'); ?> method="post" name="form1" enctype="multipart/form-data">
                        <div class="form-group">
                        <div class="form-group">
                            <label><b>Nama Pohon</b></label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label><b>Buah</b></label>
                            <input type="text" name="buah" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label><b>Deskripsi</b></label>
                            <textarea name="deskripsi" class="form-control" required></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label><b>Harga</b></label>
                            <input type="text" name="harga" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label><b>Stok</b></label>
                            <input type="text" name="stok" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                          <label><b>Pemilik</b></label>
                          <select id="cars" name="id_pemilik" class="form-control" required>
                            <?php
                                echo "<option></option>";
                                foreach($petani as $u) { 
                                echo "<option value=".$u->id."> ".$u->nama. "</option>";
                                }
                                
                                ?>
                            </select>
                          <br>
                        </div>
                        <br>
                        <div class="form-group">
                            <label><b>Gambar</b></label>
                            <input type="file" name="gambar" class="form-control">
                        </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success" name="Submit" value="Add">Tambah</button>
                        <a href=<?php echo site_url('home/produk') ?> class="btn btn-info" style="color: white;">Cancel</a>
                    </form>
            </div>
        </div>
    <!-- ==========Banner Section end Here========== -->


    

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