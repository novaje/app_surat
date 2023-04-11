<?php
include 'include/connection.php';
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
                                <?php
                                    include 'include/connection.php';
                                    $id_us=$_GET['id_us'];
                                    $ambildata  = (mysqli_query($con,"SELECT * FROM user WHERE id_us='$id_us'"));
                                    while($data=mysqli_fetch_array($ambildata)){
                                ?>
                                <form action="" method="POST">
                                <div class="form-body">
                                        <label>Username </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="username" placeholder="username" value="<?php echo $data['username']?>">
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                <div class="form-body">
                                        <label>Nama User </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="nama_user" placeholder="Nama" value="<?php echo $data['nama_user']?>">
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                        <label>No. NIK </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="inp_nik" placeholder="no.nik" value="<?php echo $data['inp_nik']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <label>Email </label>
                                        <p><font color="red">(*diisi dengan email aktif)</font></p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="inp_email" placeholder="tes@gmail.com" value="<?php echo $data['inp_email']?>" required>
                                                </div>
                                            </div>
                                        </div>

                                       <!--  <label>Password </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="inp_password" placeholder="password" required>
                                                </div>
                                            </div>
                                        </div> -->

                                        <!-- <label>Upload Barcode</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <input type="file" class="form-control" name="upload_barcode" required>
                                                </div>
                                                Gambar : <br>
                                                <img width="100" height="100" src="barcode_atasan/<?php echo $data['barcode_us'] ?>">
                                            </div>
                                        </div> -->

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
                                                    while($data_at=$qry->fetch_array()){
                                                    ?>
                                                    <option value="<?php echo $data_at['id_atasan'];?>" <?php if($data['inp_kabag']== $data_at['id_atasan']){ echo 'selected'; } ?>><?php echo $data_at['nama_atasan'];?></option>
                                                    <?php 
                                                        } 
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                         <!-- <label>Akses</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <select name="inp_level" id="inp_level" class="form-control" required>
                                                    <option value="">-- Pilih Akses --</option>
                                                    <option value="user" <?php if($data['inp_level']== "user"){ echo 'selected'; } ?>>User</option>
                                                    <option value="admin" <?php if($data['inp_level']== "admin"){ echo 'selected'; } ?>>Admin</option>
                                                    <option value="superadmin" <?php if($data['inp_level']== "superadmin"){ echo 'selected'; } ?>>Super Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> -->

                                    <div class="form-actions">
                                        <div class="text-left">
                                            <button type="submit" name="save" class="btn btn-info">Submit</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>      
                                </form>
                                <?php 
                                if(isset($_POST['save'])){
                                    
                                    $username         = $_POST['username'];
                                    $inp_nik          = $_POST['inp_nik'];
                                    $inp_kabag        = $_POST['inp_kabag'];
                                    $nama_user        = $_POST['nama_user'];


                                    //query insert data ke dalam database
                                    $query = "UPDATE user SET username='$username', nama_user='$nama_user',inp_nik='$inp_nik',inp_kabag='$inp_kabag' WHERE id_us='$id_us'";

                                    if($con->query($query)) {
                                        
                                        echo '<div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
                                                <i class="bi-check-circle-fill"></i>
                                                <strong class="mx-2">Berhasil!</strong> Data Anda Berhasil Disimpan.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                            </div>';
                                        echo '<meta http-equiv="refresh" content="1;url=daftar_user.php">';
                                     }
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
             <?php } ?>
             
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