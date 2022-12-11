<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <title>
    POHON GUA FUSIONCHART
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
  </div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" target="_blank">
        <img src="../../assets/img/pohongue.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">PohonGue</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="<?php echo base_url()?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">BERANDA</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?php echo site_url('home/open_pdf')?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">CETAK PDF</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active " href=<?php echo site_url('home/fusionchart')?>>
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">FUSIONCHART</span>
          </a>
        </li>
      </ul>
    </div> 
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="text-center pt-3">
            <?php 
                include './assets/vendor/fusioncharts/integrations/php/samples/includes/fusioncharts.php';
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
                                                    "value" => $row["jumlah_pohon"]
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
  </main>
  
  
</body>

</html>