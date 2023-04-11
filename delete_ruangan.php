<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Delete Data</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
    /* Custom style to set icon size */
.alert i[class^="bi-"]{
  font-size: 1.5em;
  line-height: 1;
}
</style>
</head>
<body>
<?php
    //ambil id
    $delete_id= $_GET['id_nm_ruangan'];

    //variabel koneksi
    include 'include/connection.php';

    //cek db
    if ($con->connect_error) {
        die("Connection Failed: " . $con->connect_error);
    }

    //query
    $query  = "DELETE FROM nm_ruangan WHERE id_nm_ruangan='$delete_id'";
    //hasil
    $hasil  = $con->query($query);

    echo '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Anda Berhasil Disimpan!
    </div>';
    echo '<meta http-equiv="refresh" content="1;url=daftar_ruangan.php">';
?>