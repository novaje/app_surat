<?php
include "include/connection.php" ;

	if (isset($_POST['verifikasi'])){
		$appid = $_POST['appid'];
		$sql = "UPDATE form_izin_keluar_kantor SET status='1' WHERE id_izin = '$appid'";
		$run = mysqli_query($con,$sql);
		if($run == true){
			
			echo "<script> 
					alert('Verfikasi Berhasil');
					window.open('approv_izin_keluar_kantor.php','_self');
				  </script>";
		}else{ 
			echo "<script> 
			alert('Failed To Approved');
			</script>";
		}
	}
?>
