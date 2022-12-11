<?php 

error_reporting(0);
 
session_start();
 
if (isset($_POST['submit'])) 
{
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
    $result = $this->model_data->login($email,$password);
    
    if ($result->conn_id->affected_rows > 0) {
        
        $_SESSION['username'] = $result->row()->username;
        $_SESSION['email'] = $result->row()->email;
        
        if($_SESSION['username'] == 'Admin')
        {
            header("Location: ".site_url('home/adminViews'));
        }
        else
        {
            header("Location: ".base_url());
        }
    } 
    else 
    {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Pohon Gue</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/x-icon/01.png">

    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/lightcase.css">
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
   
        <?php echo $_SESSION['error']?>
   
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

    
    <!-- Login Section Section Starts Here -->
    <div class="login-section padding-tb">
        <div class=" container">
            <div class="account-wrapper">
                <h3 class="title">Login</h3>
                <form class="account-form" action="" method="POST" class="login-email">
                    <div class="form-group">
                        <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                    </div>
                    <div class="form-group">
                        <button class="lab-btn" name="submit">Login</button>
                    </div>
                </form>
                <div class="account-bottom">
                    <span class="d-block pt-10">Don’t Have any Account? <a href="register.php" style="color: green"> Sign Up</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Section Section Ends Here -->


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