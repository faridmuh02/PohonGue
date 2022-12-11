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

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: a8f76dd8b6d439e925cf162e4aa2c561"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) 
{
  echo "cURL Error #:" . $err;
} else 
{
    $province = json_decode($response,true) ;
}
?>

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

    <div class="section-header">
        <h2>CEK ONGKIR</h2>
        <p>Dari Seluruh Indonesia</p>
    </div>

    <!-- Shop Page Section start here -->
    <section class="shop-single padding-tb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 sticky-widget">
                    <div class="product-details">
                        <form method="post" action=<?php echo site_url('home/cekOngkirAksi'); ?>>
                         <h4>Alamat Pengirim</h4>
                            <label><b>Provinsi Asal</b></label>
                            <select id="province" name="province" class="form-control" required>
                                <option selected>Pilih Provinsi</option>
                                <?php
                                    if($province['rajaongkir']['status']['code']=='200')
                                    {
                                        foreach($province['rajaongkir']['results'] as $pv)
                                        {
                                            echo "<option value ='$pv[province_id]' ".($pv['province_id'] == $this->input->post('province') ? "selected" : "").">$pv[province]</option>";
                                        }
                                    }
                                ?>
                            </select>
                            <label><b>Kota Asal</b></label>
                            <select id="kota" name="kota" class="form-control" required>
                                <option selected>Pilih Kota</option>
                        
                            </select>
                        
                        <br>

                        <h4>Alamat Penerima</h4>
                            <label><b>Provinsi Penerima</b></label>
                            <select id="province_penerima" name="province_penerima" class="form-control" required>
                                <option selected>Pilih Provinsi</option>
                                <?php
                                    if($province['rajaongkir']['status']['code']=='200')
                                    {
                                        foreach($province['rajaongkir']['results'] as $pv)
                                        {
                                            echo "<option value ='$pv[province_id]' ".($pv['province_id'] == $this->input->post('province_penerima') ? "selected" : "").">$pv[province]</option>";
                                        }
                                    }
                                ?>
                            </select>
                            <label><b>Kota Penerima</b></label>
                            <select id="kota_penerima" name="kota_penerima" class="form-control" required>
                                <option selected>Pilih Kota </option>
                        
                            </select>

                        <br>
                        <br>

                        <h4>Jasa Ekpedisi</h4>
                            <label><b>Provinsi Penerima</b></label>
                            <select id="ekspedisi" name="ekspedisi" class="form-control" required>
                                <option selected>Pilih Jasa Ekspedisi</option>
                                <?php
                                $eks = ['jne' => 'JNE','pos'=> 'POS','tiki' => 'TIKI'];
                            
                                        foreach($eks as $key => $value)
                                        {
                                            echo "<option value ='$key' ".($key == $this->input->post('ekspedisi') ? "selected":" ").">$value</option>";
                                        }
            
                                ?>
                            </select>

                        <br>

                            <label><b>Berat Bibit</b></label>
                            <br>
                            <input type="text" placeholder="gram" id="berat" value="<?= $this->input->post('berat') ?>" name="berat">
                            
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary" name="Submit" value="Add">Proses</button>
                        </form>
                        
                        <br>
                        <?php

                    if(isset($ongkir))
                    {

                        

                        ?>
                        <div class="row">
                            <?php
                            
                            $biaya = json_decode($ongkir,true);

                            if($biaya['rajaongkir']['status']['code']=='200')
                            {
                                foreach($biaya['rajaongkir']['results'][0]['costs'] as $by)
                                {
                                    ?>
                                    <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $by['service'] ?></h5>
                                            <p class="card-text"><?= $by['description'] ?></p>
                                            <p class="card-text"><?= "Estimasi Pengiriman : ".$by['cost'][0]['etd'] ?></p>
                                            <p class="btn btn-primary"><?= "RP. ".$by['cost'][0]['value'] ?></p>
                                        </div>
                                    </div>
                                    </div>

                                    <?php
                                }
                            }
                            
                            ?>
                        </div>
                    <?php

                    }

                    ?>

                    </div>      
                </div>
            </div>
         </div>
     </section>
    <!-- Shop Page Section ending here -->

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
    <script>
        document.getElementById('province').addEventListener('change',function()
        {
        fetch("<?= site_url('home/kota/') ?>" + this.value,{
            method : 'GET',
 
        })
        .then((response)=>response.text())
        .then((data) => {
            console.log(data)
            document.getElementById('kota').innerHTML = data
        })
        })

        document.getElementById('province_penerima').addEventListener('change',function()
        {
        fetch("<?= site_url('home/kota/') ?>" + this.value,{
            method : 'GET',
 
        })
        .then((response)=>response.text())
        .then((data) => {
            console.log(data)
            document.getElementById('kota_penerima').innerHTML = data
        })
        })
    </script>
</body>

</html>