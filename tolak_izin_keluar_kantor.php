<?php
include "include/connection.php" ;

    if (isset($_POST['tolak'])){
        $id_izin = $_POST['id_izin'];
        $alasan_ditolak = $_POST['alasan_ditolak'];
        
        $sql = "UPDATE form_izin_keluar_kantor SET status='2', alasan_ditolak='$alasan_ditolak' WHERE id_izin = '$id_izin'";
        $run = mysqli_query($con,$sql);
        if($run == true){
            
            echo "<script> 
                    alert('Tolak Berhasil');
                    window.open('approv_izin_keluar_kantor.php','_self');
                  </script>";
        }else{ 
            echo "<script> 
            alert('Failed To Approved');
            </script>";
        }
    }
?>
