<?php
    //ambil id
    $id_izin=$_GET['id_izin'];

    //variabel koneksi
    include 'include/connection.php';

    //cek db
    if ($con->connect_error) {
        die("Connection Failed: " . $con->connect_error);
    }

    //query
    $query  = "SELECT * FROM form_izin_keluar_kantor WHERE id_izin ='$id_izin'";
    //hasil
    $hasil  = $con->query($query);

    //uraikan
    $row = $hasil->fetch_assoc();
?>

<!DOCTYPE html>
<head>
    <title>Surat Izin Keluar Kantor</title>
    <meta charset="utf-8">
    <style>
        #judul{
            text-align:center;
        }

        #halaman{
            width: 90%; 
            height: auto; 
            position: absolute; 
            border: 1px solid; 
            padding-top: 30px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 700px;
        }
            #halaman2{
            width: auto; 
            height: auto; 
            position: absolute;
            padding-top: 345px; 
            padding-left: 30px; 
            padding-right: 50px; 
            padding-bottom: 500px;
        
    }


    </style>

</head>

<body>
    <div id=halaman>
        <h3 id=judul>SURAT KETERANGAN KELUAR KANTOR</h3>
        <h3 id=judul>RSUD DRS. H AMRI TAMBUNAN</h3>
        <?php
          $ambildata  = (mysqli_query($con,"SELECT * FROM form_izin_keluar_kantor WHERE id_izin='$id_izin'"));
          while($data=mysqli_fetch_array($ambildata)){
        ?>
        <table>
          <tr>
            <td style="width: 45%;">Nama</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;"><?=$data['inp_nama']?></td>
          </tr>
          <tr>
            <td style="width: 45%;">NIP</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;"><?=$data['inp_nip']?></td>
          </tr>
          <tr>
            <td style="width: 45%;">Unit Kerja</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;"><?=$data['inp_unit_kerja']?></td>
          </tr>
          <tr>
            <td style="width: 45%;">Tujuan</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;"><?=$data['inp_tujuan']?></td>
          </tr>
          <tr>
            <td style="width: 45%;">Alasan</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;"><?=$data['inp_alasan']?></td>
          </tr>
          <tr>
            <td style="width: 45%;">Waktu Berangkat</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;"><?=$data['inp_waktu_berangkat']?></td>
          </tr>
          <tr>
            <td style="width: 45%;">Waktu Kembali</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;"><?=$data['inp_waktu_kembali']?></td>
          </tr>
        
          <?php }?>
        </table>
        
        <br><br><br>
        <?php
          $ambildata  = (mysqli_query($con,"SELECT * FROM form_izin_keluar_kantor INNER JOIN USER ON user.id_us=form_izin_keluar_kantor.create_by INNER JOIN nm_atasan ON form_izin_keluar_kantor.inp_nip_ketua=nm_atasan.inp_nip_atasan  WHERE id_izin='$id_izin'"));
          while($data=mysqli_fetch_array($ambildata)){
        ?>
        <div style="width: 50%; text-align: left; float: right;"><?=$data['inp_tgl_surat']?></div><br>
          <div style="width: 50%; text-align: left; float: right;">ASN/NON ASN yang bersangkutan,</div><br><br>
          <div style="width: 50%; text-align: left; float: right;"><img width="100" height="100" src="barcode_atasan/<?=$data['upload_barcode']?>"></div><br><br><br><br><br><br>
          <div style="width: 50%; text-align: left; float: right;"><?=$data['inp_nama']?></div><br>
          <div style="width: 50%; text-align: left; float: right;"><u><?=$data['inp_nip_atasan']?></u></div>
        </div>


        <div id=halaman2>
            <div style="width: 100%; text-align: left; float: right;">Diketahui:</div><br>
            <div style="width: 100%; text-align: left; float: right;">Ka Bagian/ Bidang:</div><br><br>
             <?php if ($data['status']==1) { ?>
            <div style="width: 50%; text-align: left; float: left;"><img width="100" height="100" src="barcode_atasan/<?=$data['upload_barcode']?>"></div>
            <?php }else {

            } ?><br><br><br><br><br><br>
            <div style="width: 100%; text-align: left; float: right;"><?=$data['inp_kepala_bagian']?></div>
             <div style="width: 50%; text-align: left; float: left;"><u><?=$data['inp_nip']?></u></div>
        </div>

      <?php } ?>

</body>
</html>