<!DOCTYPE html>
<html lang="en">

<head>
    <title>PohonGue</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../../../assets/images/x-icon/01.png">

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
                        <a href=<?php site_url('home/adminViews') ?>>
                            <img src="../../../assets/images/logo/logo.png" alt="logo">
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
                        <h2>Edit Data Penjual</h2>                    
                        <br>
                    </div>
                    <br>
                    <br>
                    <?php foreach ($petani as $u){ ?>
                    <form name="update" method="post" action=<?php echo site_url('home/editAksiPetani'); ?> enctype="multipart/form-data">
                        <div class="form-group">
                            <label><b>Nama Penjual</b></label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $u->nama; ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label><b>Deskripsi</b></label>
                            <textarea name="deskripsi" class="form-control"><?php echo $u->deskripsi; ?></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label><b>Alamat</b></label>
                            <input name="alamat" class="form-control" value="<?php echo $u->alamat; ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label><b>Email</b></label>
                            <input type="text" name="email" class="form-control" value="<?php echo $u->email; ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label><b>No Handphone</b></label>
                            <input type="text" name="no_hp" class="form-control" value="<?php echo $u->no_hp; ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label><b>Gambar</b></label>
                            <br>
                            <img src="../../../assets/images/penjual/<?php echo $u->gambar; ?>" width="200px;" height="200px">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="file" name="gambar" class="form-control">
                        </div>
                        <br>
                        <tr>
                            <td><input type="hidden" name="id" value=<?php echo $u->id; ?>></td>
                            
                            <button class="btn btn-success" type="submit" name="update" value="update">Update</button>
                            <a href=<?php echo site_url('home/penjual') ?> class="btn btn-info" style="color: white;">Cancel</a>
                        </tr>
                    </form>
                    <?php } ?>
            </div>
        </div>
    <!-- ==========Banner Section end Here========== -->


    

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