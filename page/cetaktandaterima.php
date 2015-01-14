<!DOCTYPE html>
<html lang="en">

    <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/sb-admin-2.css" rel="stylesheet">
        <link href="../css/custom.css" rel="stylesheet">
        <title>Tanda Terima Gaji</title>
        <style>Cetak Tanda Terima</style>
        <style>
            body{
                background-color: white;
                padding: 20px;
            }
        </style>
    </head>
    <body onload="window.pcrint()">
<?php 
include '../inc/koneksi.php';
include '../inc/fungsi.php';

$tahun = $_POST['tahun'];
$bulan = getBulan($_POST['bulan']);
//  buat query dan jalankan query
$query = "SELECT
  *
FROM
  gaji
  LEFT JOIN pegawai ON pegawai.nip = gaji.nip_gaji
WHERE
  tahun_gaji = '$tahun' AND bulan_gaji = '$bulan' 
ORDER BY nama_pegawai";
$result = mysql_query($query);

$no_urut = 1;
$no_urut2 = 1;
//pagination config end

?>
            <div class="row">
                <div class="col-lg-9">
                    <h1 class="" style="margin-top: 0px">Tanda Terima Gaji Bulan <?php echo $bulan.' '.$tahun; ?></h1>
                </div>
                <div class="col-lg-3 text-right">
                    <img src="../img/text.jpg" width="200px" style="margin-bottom: 20px" />
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <!--bikin tabel-->
                    <table class="table table-bordered table-striped tt">
                        <!--bikin baris pakai tr-->
                        <tr>
                            <!--bikin header pakai th-->
                            <th>No.</th>
                            <th>NIP</th>
                            <th>Nama Karyawan</th>
                            <th>Jabatan</th>
                            <th>Gaji Pokok (Rp)</th>
                            <th>Uang Kehadiran (Rp)</th>
                            <th>Tunjangan (Rp)</th>
                            <th>Gaji Kotor (Rp)</th>
                            <th>Persentase PPh</th>
                            <th>PPh (Rp)</th>
                            <th>Gaji Bersih (Rp)</th>
                            <th>Tanda Tangan</th>
                        </tr>
                        <?php 
                        
                        if (!$result) 
                        {
//                        jika query gagal
                            die(mysql_error());
                        } 
                        else 
                        {
                            
//                        jika query berhasil
                            while($row = mysql_fetch_array($result)) {
                        ?>
                            <!--bikin baris pakai tr-->
                            <tr>
                                <!--bikin kolom pakai td-->
                                <td style="padding: 30px 10px"><?php echo $no_urut++; ?></td>
                                <td style="padding: 30px 10px"><?php echo $row['nip']; ?></td>
                                <td style="padding: 30px 10px"><?php echo $row['nama_pegawai']; ?></td>
                                <td style="padding: 30px 10px"><?php echo $row['jabatan_gaji']; ?></td>
                                <td style="text-align: right; padding: 30px 10px"><?php echo ribuan($row['gapok_gaji']); ?></td>
                                <td style="text-align: right; padding: 30px 10px"><?php echo ribuan($row['gakeh_gaji']); ?></td>
                                <td style="text-align: right; padding: 30px 10px"><?php echo ribuan($row['tunja_gaji']); ?></td>
                                <td style="text-align: right; padding: 30px 10px"><?php echo ribuan($row['kotor_gaji']); ?></td>
                                <td style="text-align: right; padding: 30px 10px"><?php echo $row['persen_gaji']; ?> %</td>
                                <td style="text-align: right; padding: 30px 10px"><?php echo ribuan($row['pph_bulan_gaji']); ?></td>
                                <td style="text-align: right; padding: 30px 10px"><?php echo ribuan($row['bersih_gaji']); ?></td>
                                <td style="padding: 30px 10px"><?php echo $no_urut2++; ?> ...............</td>
                            </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                    <small>Dicetak tanggal <?php echo date('d-m-Y H:i:s'); ?></small>
                </div>
            </div>
        </body>
</html>