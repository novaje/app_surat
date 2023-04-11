<?php include 'include/connection.php'; 
session_start(); 
$username=$_SESSION['username'];
$qry_us = mysqli_query($con, "SELECT * FROM user WHERE username='$username'");
$us_ry  = mysqli_fetch_assoc($qry_us);

?>
 <?php
$id_izin = $_GET['id_izin'];
$qry = mysqli_query($con, "SELECT * FROM form_izin_keluar_kantor WHERE id_izin='$id_izin'");
$users  = mysqli_fetch_assoc($qry);

if ($us_ry['id_us']==$users['create_by'] OR $us_ry['inp_level']=="admin" OR $us_ry['inp_level']=="superadmin") {
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Form Tambah Surat</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Surat Izin Keluar Kantor</li>
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
                                <h4 class="card-title">Surat Izin Keluar Kantor</h4>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <?php if ($users['status']==2) {?>
                                    <div class="form-body">
                                    <label>Alasan Ditolak </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <textarea class="form-control" readonly><?php echo $users['alasan_ditolak']; ?></textarea>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else {

                                } ?>
                                <div class="form-body">
                                    <label>Nama </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="inp_nama" value="<?php echo $users['inp_nama'] ?>" readonly>
                                                     <input type="hidden" class="form-control" name="id_izin" value="<?php echo $users['id_izin'] ?>" readonly>
                                                     <input type="hidden" class="form-control" name="status" value="<?php echo $users['status'] ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                    <label>NIP </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="inp_nip" value="<?php echo $users['inp_nip'] ?>">
                                                    <input type="hidden" class="form-control" name="create_by" value="<?php echo $users['create_by'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                    <label>Unit Kerja </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="inp_unit_kerja" value="<?php echo $users['inp_unit_kerja'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                    <label>Tujuan </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="inp_tujuan" value="<?php echo $users['inp_tujuan'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                    <label>Alasan </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="inp_alasan" value="<?php echo $users['inp_alasan'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                    <label>Waktu Berangkat </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="datetime-local" class="form-control" name="inp_waktu_berangkat" value="<?php echo $users['inp_waktu_berangkat'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                    <label>Waktu Kembali </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="datetime-local" class="form-control" name="inp_waktu_kembali" value="<?php echo $users['inp_waktu_kembali'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                    <label>Tanggal Surat </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="inp_tgl_surat" placeholder="ex:lubuk Pakam,tgl,bln,thn" value="<?php echo $users['inp_tgl_surat'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <label>Upload Barcode</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <input type="file" class="form-control" name="upload_barcode">
                                                </div>
                                            </div>
                                        </div> -->

                                    <label>Nama Atasan</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   
                                        <input type="text" name="inp_kepala_bagian" value="<?php echo $users['inp_kepala_bagian'] ?>" class="form-control" readonly>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <label>NIP Atasan</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   
                                        <input type="text" name="inp_nip_ketua" value="<?php echo $users['inp_nip_ketua'] ?>" class="form-control" readonly>

                                                </div>
                                            </div>
                                        </div>


                                    <div class="form-actions">
                                        <div class="text-left">
                                            <button type="submit" name="edit" class="btn btn-info">Submit</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>

                                <?php 
                                if(isset($_POST['edit'])){
                                    $inp_nama            = $_POST['inp_nama'];
                                    $inp_nip             = $_POST['inp_nip'];
                                    $inp_unit_kerja      = $_POST['inp_unit_kerja'];
                                    $inp_tujuan          = $_POST['inp_tujuan'];
                                    $inp_alasan          = $_POST['inp_alasan'];
                                    $inp_waktu_berangkat = $_POST['inp_waktu_berangkat'];
                                    $inp_waktu_kembali   = $_POST['inp_waktu_kembali'];
                                    $inp_tgl_surat       = $_POST['inp_tgl_surat'];
                                    $inp_kepala_bagian   = $_POST['inp_kepala_bagian'];
                                    $inp_nip_ketua       = $_POST['inp_nip_ketua'];
                                    $create_by           = $_POST['create_by'];
                                    $id_izin           = $_POST['id_izin'];
                                    $status           = $_POST['status'];


                                    //query insert data ke dalam database
                                    if ($status==2) {
                                    $query = "UPDATE form_izin_keluar_kantor SET inp_nama='$inp_nama', inp_nip='$inp_nip', inp_unit_kerja='$inp_unit_kerja', inp_tujuan='$inp_tujuan', inp_alasan='$inp_alasan', inp_waktu_berangkat='$inp_waktu_berangkat', inp_waktu_kembali='$inp_waktu_kembali', inp_tgl_surat='$inp_tgl_surat', inp_kepala_bagian='$inp_kepala_bagian', inp_nip_ketua='$inp_nip_ketua', create_by='$create_by', status='0' WHERE id_izin='$id_izin'";
                                }else {
                                    $query = "UPDATE form_izin_keluar_kantor SET inp_nama='$inp_nama', inp_nip='$inp_nip', inp_unit_kerja='$inp_unit_kerja', inp_tujuan='$inp_tujuan', inp_alasan='$inp_alasan', inp_waktu_berangkat='$inp_waktu_berangkat', inp_waktu_kembali='$inp_waktu_kembali', inp_tgl_surat='$inp_tgl_surat', inp_kepala_bagian='$inp_kepala_bagian', inp_nip_ketua='$inp_nip_ketua', create_by='$create_by' WHERE id_izin='$id_izin'";
                                }

                                    if($con->query($query)) {
                                        echo '<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                                        role="alert">
                                        <strong>Success - </strong> Data Anda Berhasil Disimpan!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>';
                                        echo '<meta http-equiv="refresh" content="1;url=surat_izin_keluar_kantor.php">';
                                        }
                                    }

                                ?>
                            </div>
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
<?php } else {
    ?>
    <script type="text/javascript">
        alert("Akses Block !!");
        window.location="index.php";
    </script>
    <?php 
} ?>