<?php 
$nip = $_GET['id'];
$tahun = $_GET['tahun'];
$bulan = $_GET['bulan'];
//  buat query dan jalankan query
$karyawan = mysql_query("SELECT
  *
FROM
  pegawai
  LEFT JOIN jabatan ON pegawai.jabatan_pegawai = jabatan.id_jabatan
  LEFT JOIN ptkp ON pegawai.status_kawin = ptkp.kode_ptkp
WHERE 
  nip = '$nip'");
$datakaryawan = mysql_fetch_assoc($karyawan);

$query = "SELECT
  *
FROM
  absen
  LEFT JOIN pegawai ON pegawai.nip = absen.nip_fk_absen 
WHERE
  MONTH(tgl_absen) = '$bulan' AND YEAR(tgl_absen)= '$tahun' AND nip_fk_absen = '$nip'
ORDER BY tgl_absen";
$result = mysql_query($query);
if (!$result) {
    die(mysql_error());
}

$no_urut = 1;
//pagination config end

?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail Absen Bulan <?php echo getBulan($bulan).' '.$tahun; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <table class="table" style="font-weight: bold">
                        <tr>
                            <td width="200px">Nama Karyawan</td>
                            <td><?php echo $datakaryawan['nama_pegawai'] ?></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td><?php echo $datakaryawan['jabatan'] ?></td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!--bikin tabel-->
                    <table class="table">
                        <tr>
                            <th>Hari</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                        </tr>
                        <?php 
                        while ($row = mysql_fetch_array($result)) {
                        ?>
                        <tr 
                                <?php 
                                if ($row['ket_absen'] == 'alpa') {
                                    echo 'style="background-color: pink"';
                                } elseif ($row['ket_absen'] == 'sakit') {
                                    echo 'style="background-color: lightgreen"';
                                } elseif ($row['ket_absen'] == 'cuti') {
                                    echo 'style="background-color: lightblue"';
                                } elseif ($row['ket_absen'] == 'off') {
                                    echo 'style="background-color: lightgrey"';
                                }
                                
                                ?>
                            >
                            <td><?php echo namahari($row['tgl_absen']) ?></td>
                            <td><?php echo $row['tgl_absen'] ?></td>
                            <td><?php echo $row['ket_absen'] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>