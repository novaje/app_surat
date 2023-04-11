<?php 
include 'include/connection.php';
session_start();
$username=$_SESSION['username'];
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
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar Surat</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="../index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Daftar Surat</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="add_surat_izin_keluar_kantor.php" class="btn btn-primary"><i class="fas fa-plus-circle">Tambah Surat</i></a>
                            </div>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered display no-wrap" >
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">NIP</th>
                                            <th scope="col">Nama Pegawai</th>
                                            <th scope="col">Unit Kerja</th>
                                            <th scope="col">Data Surat</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    $get_user  = (mysqli_query($con,"SELECT * FROM user WHERE username='$username'"));
                                    while($dt_user=mysqli_fetch_array($get_user)){
                                        $id_us = $dt_user['id_us'];
                                        if ($dt_user['inp_level']=="superadmin" OR $dt_user['inp_level']=="admin") {
                                        $ambildata  = (mysqli_query($con,"SELECT * FROM form_izin_keluar_kantor ORDER BY id_izin DESC"));
                                    } else {
                                        $ambildata  = (mysqli_query($con,"SELECT * FROM form_izin_keluar_kantor WHERE create_by='$id_us' ORDER BY id_izin DESC"));
                                    }

                                        while($data=mysqli_fetch_array($ambildata)){
                                    
                                    ?>
                                        <tr>
                                            <td><left><?= $no++ ?></left></td>
                                            <td><left><?=$data['inp_nip']?></left></td>
                                            <td><left><?=$data['inp_nama']?></left></td>
                                            <td><left><?=$data['inp_unit_kerja']?></left></td>
                                            <td> <a href="form_surat_izin_keluar_kantor.php?id_izin=<?=$data['id_izin']?>" target="_blank" class="btn btn-default"><i class="fas fa-file-alt"></i> View Surat</a></td>
                                            <td>
                                                <center>
                                                    <?php
                                                        if ($data['status'] == 0) {
                                                        echo "<span class='badge badge-pill badge-warning'>Ditunda</span>";
                                                        } else if ($data['status'] == 2) {
                                                        echo "<span class='badge badge-pill badge-danger'>Ditolak</span>";
                                                        }
                                                        else {
                                                        echo "<span class='badge badge-pill badge-success'>Diverifikasi</span>";
                                                        }
                                                    ?>
                                                </center>
                                            </td>
                                            
                                            <td>
                                                 <?php if ($data['status']!=1 OR $dt_user['inp_level']=="admin" OR $dt_user['inp_level']=="superadmin") { ?>
                                                <a href="edit_surat_izin_keluar_kantor.php?id_izin=<?=$data['id_izin'] ?>" class="btn btn-sm btn-outline-warning btn-rounded" data-mdb-ripple-color="dark">
                                                Ubah</a>
                                            <?php } else {

                                            } ?>
                                                <?php if ($data['status']==0 OR $dt_user['inp_level']=="admin" OR $dt_user['inp_level']=="superadmin") { ?>
                                                <a href="del_surat_kel_kantor.php?id_izin=<?=$data['id_izin'] ?>" class="btn btn-sm btn-outline-danger btn-rounded" data-mdb-ripple-color="dark">
                                                Delete</a>
                                            <?php } else {

                                            } ?>

                                            <?php if ($data['alasan_ditolak'!=""] AND $data['status']==2) { ?>
                                            <button type="button" class="btn btn-sm btn-outline-info btn-rounded" data-mdb-ripple-color="dark" data-toggle="modal" data-target="#myModal<?php echo $data['id_izin']; ?>">Lihat Alasan</button>
                                        <?php } else {

                                        } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php }
                                    } ?>
                                </table>
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
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
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
    <!--This page plugins -->
    <script src="assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/pages/datatable/datatable-basic.init.js"></script>

</body>
</html>
 <?php
                                    $no=1;
                                    $get_user  = (mysqli_query($con,"SELECT * FROM user WHERE username='$username'"));
                                    while($dt_user=mysqli_fetch_array($get_user)){
                                        $id_us = $dt_user['id_us'];
                                        if ($dt_user['inp_level']=="superadmin" OR $dt_user['inp_level']=="admin") {
                                        $ambildata  = (mysqli_query($con,"SELECT * FROM form_izin_keluar_kantor ORDER BY id_izin DESC"));
                                    } else {
                                        $ambildata  = (mysqli_query($con,"SELECT * FROM form_izin_keluar_kantor WHERE create_by='$id_us' ORDER BY id_izin DESC"));
                                    }

                                        while($data=mysqli_fetch_array($ambildata)){
                                    
                                    ?>
 <div class="modal fade" id="myModal<?php echo $data['id_izin']; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Lihat Alasan</h4>
        </div>

        <div class="modal-body">
            <table>
          <tr>
              <th>
                 <?php echo $data['alasan_ditolak'] ?>
              </th>
          </tr>
          </table>
        </div>
        <div class="modal-footer">
           
          <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
        </div>

      </div>
      
    </div>
  </div>
  <?php }
  } ?>