<?php
  include 'include/connection.php';
  error_reporting(0);
  session_start();

  if(isset($_POST['submit'])) {
    $inp_email    = $_POST['inp_email'];
    $inp_password = md5($_POST['inp_password']);

    $sql    = "SELECT * FROM user WHERE inp_email='$inp_email' AND inp_password='$inp_password'";
    $result = mysqli_query($con, $sql);
    if($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $row['username'];

      header("Location: index.php");
    } else {
      echo "<script>alert('Woopps!! Email dan Password Salah.')</script>";
    }
  }
?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>LOGIN - SURAT</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your Email and Pasword!</p>
              <form action="" method="POST" class="pt-3">
              <div class="form-outline form-white mb-4">
                <label class="form-label" for="inp_email">Email</label>
                <input type="text" name="inp_email" class="form-control" class="form-control form-control-lg" value="<?php echo $inp_email; ?>" />
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="inp_password">Password</label>
                <input type="password" name="inp_password" class="form-control" class="form-control form-control-lg" value="<?php echo $_POST['inp_password']; ?>" />
                
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

              <button name="submit" class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
            </div>
            </form>
            <p>Version <a href="">1.0.1</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>