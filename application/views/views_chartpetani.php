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
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="text-center pt-3">
            <?php 
                include 'assets/vendor/fusioncharts/integrations/php/samples/includes/fusioncharts.php';
                $hostdb = "localhost";
                $userdb = "root";
                $passdb = "";
                $namedb = "pohongue";

                $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);
                if ($dbhandle->connect_error) {
                exit("There was an error with your connection: " . $dbhandle->connect_error);
                }

            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                <link rel="shortcut icon" href="img/logo.png">
                <title>PohonGue</title>
                <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

                <script src=" https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
                <script src=" https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>


                <style type="text/css">
                    .wrapper{
                        width: 650px;
                        margin: 0 auto;
                    }
                    .page-header h2{
                        margin-top: 0;
                    }
                    table tr td:last-child a{
                        margin-right: 15px;
                    }
                </style>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('[data-toggle="tooltip"]').tooltip();
                    });
                </script>

            </head>

                <br>
                <div>
                    <div>
                        <div>
                            <div>
                                <?php
                                    $strQuery = "SELECT * from petani";

                                    $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

                                    if ($result) {
                                        $arrData = array(
                                            "chart" => array(
                                                "caption" => "Jumlah Pohon Milik Petani",
                                                "showValues" => "0",
                                                "theme" => "fusion"
                                            )
                                        );

                                        $arrData["data"] = array();

                                        while ($row = mysqli_fetch_array($result)) {
                                            array_push(
                                                $arrData["data"],
                                                array(
                                                    "label" => $row["nama"],
                                                    "value" => $row["id"]
                                                )
                                            );
                                        }

                                        $jsonEncodedData = json_encode($arrData);

                                        $columnChart = new FusionCharts("column2D", "myFirstChart", "chart-1", $jsonEncodedData, "json", 700, 400);

                                        $columnChart->render();
                                        $dbhandle->close();
                                    }
                                    ?>

                                    <div class="col-lg-8 offset-lg-2">
                                        <div id="chart-1"></div>
                                    </div>


                            </div>
                        </div>
                    </div>
                </div>
            </body>
            </html>
          </div>
        </div>
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