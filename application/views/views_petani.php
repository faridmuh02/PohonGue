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
    <div class="container" style="background-color: white; text-align: center;">
            <div class="row">
                    <div class="page clearfix">
                        <br>
                        <h2>Data Petani</h2>                    
                        <br>
                        <form action=<?php echo site_url('home/tambahPetani') ?> style="text-align: left;">
                            <button class="btn btn-success" type="submit">Tambah</button>
                            <a href=<?php echo site_url('home/open_pdf_petani') ?> class="btn btn-info" style="color: white;">Export PDF</a>
                            <a href=<?php echo site_url('home/export_excel_petani') ?> class="btn btn-primary" style="color: white;">Export Excel</a>
                        </form>
                        <br>
                    </div>
                    <br>
                    <br>
                    <?php
                    
                    
                        if(count($petani) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th align=center>No</th>";
                                        echo "<th>Nama Penjual</th>";
                                        echo "<th>Deskripsi</th>";
                                        echo "<th>Alamat</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>No Handphone</th>";
                                        echo "<th>Gambar</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $nomor = 1;
                                foreach($petani as $u) 
                                {         
                                    echo "<tr>";
                                    echo "<td>".$nomor++."</td>";
                                    echo "<td>".$u->nama."</td>";
                                    echo "<td>".$u->deskripsi."</td>";
                                    echo "<td>".$u->alamat."</td>";
                                    echo "<td>".$u->email."</td>";
                                    echo "<td>".$u->no_hp."</td>";
                                    echo "<td>"."<img src='../../assets/images/penjual/".$u->gambar."' width='100px' height='100px'/>"."</td>";
                                        echo "<td>";
                                        echo "<a href='".site_url('home/editPetani/').$u->id."'"."' title='Update Record' data-toggle='tooltip' class='btn btn-success'> Ubah </a>";
                                        echo "&nbsp;";
                                        echo "<a href='".site_url('home/hapusPetani/').$u->id."'"."' title='Delete Record' data-toggle='tooltip' class='btn btn-danger'> Hapus </a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                
                    ?>
            </div>
            <form method="POST" enctype="multipart/form-data" action="<?php echo site_url('home/import_excel_petani') ?>">
                Masukan Data dari Excel: 
                <input name="filexls" type="file" required="required" id="fomrFile"> 
                <input name="submit" type="submit" value="Import" >
                <br>
                <br>
            </form>
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