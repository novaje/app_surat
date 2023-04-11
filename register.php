<?php
include 'include/connection.php';

error_reporting(0);

session_start();
if(isset($_SESSION['username'])) {
  header("login.php");
}

if (isset($_POST['submit'])) {
    $username       = $_POST['username'];
    $inp_email      = $_POST['inp_email'];
    $nama_user      = $_POST['nama_user'];
    $inp_password   = md5($_POST['inp_password']);
    $cpassword      = md5($_POST['cpassword']);
    $inp_level      = $_POST['inp_level'];
    $inp_nik        = $_POST['inp_nik'];
    $inp_kabag        = $_POST['inp_kabag'];
    $inp_token_us   = rand(999999, 111111);
    $time = date("Hi");

    $files = $_FILES;
    $upload_barcode      = $time."-".$files['upload_barcode']['name'];
    $lokasi_barcode      = $files['upload_barcode']['tmp_name'];
    move_uploaded_file($lokasi_barcode, "barcode_atasan/".$upload_barcode);

    $sql1     = (mysqli_query($con,"SELECT count(id_us) as id_us FROM user WHERE inp_email='$inp_email'"));
    while($result1=mysqli_fetch_array($sql1)){
    if ($result1['id_us']==0) {
    if ($inp_password == $cpassword) {
        $sql    = "INSERT INTO user (username, nama_user, inp_email, inp_password, inp_nik, inp_level, inp_token_us, inp_kabag, upload_barcode)
                VALUES ('$username', '$nama_user', '$inp_email', '$inp_password', '$inp_nik', '$inp_level', '$inp_token_us', '$inp_kabag', '$upload_barcode')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>alert('Wow! Anda Berhasil Registrasi!.')
           window.location='daftar_user.php'</script>";
   
         } else {
             echo "<script>alert('Periksa Kembali Pengisian Anda! .')</script>";
           }
       } else {
         echo "<script>alert('Wooopps! Password Anda Salah.')</script>";
         }

         } else {
             echo "<script>alert('Email yang anda gunakan sudah ada!! .')</script>";
           }
       }
   }
   
   ?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include 'include/head.php';?>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include 'include/head_user.php';?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include 'include/sidebar.php';?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Form Registrasi</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Registrasi</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                   
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">REGISTASI - USER</h4>
                                <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-body">
                                        <label>Username </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="username" placeholder="username" required>
                                                </div>
                                            </div>
                                        </div>
                                        </div>


                                        <div class="form-body">
                                        <label>Nama Lengkap </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="nama_user" placeholder="Nama Lengkap" required>
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                        <label>No. NIK </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="inp_nik" placeholder="no.nik" value="<?php echo $inp_nik; ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <label>Email </label>
                                        <p><font color="red">(*diisi dengan email aktif)</font></p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="inp_email" placeholder="tes@gmail.com" value="<?php echo $inp_email; ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <label>Password </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="inp_password" placeholder="password" value="<?php echo $inp_password; ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <label>Konfirmasi Password </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="cpassword" placeholder="password" value="<?php echo $inp_password; ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <label>Upload Barcode</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <input type="file" class="form-control" name="upload_barcode" required>
                                                </div>
                                            </div>
                                        </div>
 
                                        <label>Nama Atasan</label>
                                        <?php
                                        $qry = mysqli_query($con, "SELECT * FROM nm_atasan");
                                        ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <select name="inp_kabag" id="" class="form-control">
                                                    <option value="">-- Pilih Atasan --</option>
                                                    <?php
                                                    while($data=$qry->fetch_array()){
                                                    ?>
                                                    <option value="<?=$data['id_atasan'];?>"><?=$data['nama_atasan'];?></option>
                                                    <?php 
                                                        } 
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> 

                                        <label>Akses</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <select name="inp_level" id="inp_level" class="form-control" required>
                                                    <option value="">-- Pilih Akses --</option>
                                                    <option value="user" <?php if($inp_level== "user"){ echo 'selected'; } ?>>User</option>
                                                    <option value="admin" <?php if($inp_level== "admin"){ echo 'selected'; } ?>>Admin</option>
                                                    <option value="superadmin" <?php if($inp_level== "superadmin"){ echo 'selected'; } ?>>Super Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="form-actions">
                                        <div class="text-left">
                                            <button type="submit" name="submit" class="btn btn-info">Submit</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include 'include/footer.php'; ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
</body>

</html>