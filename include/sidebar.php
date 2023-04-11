<?php
include 'include/connection.php';
session_start();

if(!isset($_SESSION['username'])) {
  header ("Location: login.php");
}
?>

<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> 
                    <a class="sidebar-link sidebar-link" href="index.php" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">DATA</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i>
                <span class="hide-menu">Form Surat </span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                    <li class="sidebar-item">
                        <a href="surat_izin_keluar_kantor.php" class="sidebar-link"><span class="hide-menu">Izin Keluar Kantor </span></a></li>
                   <?php 
                   $username=$_SESSION['username'];
                   $get_id  = (mysqli_query($con,"SELECT * FROM user WHERE username='$username'"));
                    while($id_usr=mysqli_fetch_array($get_id)){
                        $user_id = $id_usr['id_us'];
                            $ambildata  = (mysqli_query($con,"SELECT COUNT(id_izin) AS ada_tidak FROM form_izin_keluar_kantor INNER JOIN nm_atasan ON nm_atasan.`inp_nip_atasan`=form_izin_keluar_kantor.`inp_nip_ketua` WHERE nm_atasan.`id_user`='$user_id'"));
                    while($data_ada_tidak=mysqli_fetch_array($ambildata)){
                        if ($data_ada_tidak['ada_tidak']!=0 OR $id_usr['inp_level']=='admin' OR $id_usr['inp_level']=='superadmin') {
                    ?>
                    
                    <li class="sidebar-item"><a href="approv_izin_keluar_kantor.php" class="sidebar-link"><span class="hide-menu">Approve Surat</span></a></li>
                            <?php } else {

                            }
                        }
                } ?>
                </ul>
                    </li>
                        </li>
                
                   <?php
                    $username=$_SESSION['username'];
                    $get_user  = (mysqli_query($con,"SELECT * FROM user WHERE username='$username'"));
                    while($dt_user=mysqli_fetch_array($get_user)){
                        if ($dt_user['inp_level']=="superadmin" OR $dt_user['inp_level']=="admin") {
                   ?>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">MASTER DATA</span></li>
                <li class="sidebar-item"> <a class="sidebar-link" href="daftar_atasan.php" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather-icon feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                <span class="hide-menu">Nama Atasan</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="daftar_user.php" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather-icon feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>  
                <span class="hide-menu">Registrasi User</span></a>
                </li>
            <?php } else {

            }
            } ?>
            </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->