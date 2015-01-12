<?php 
$tahun = $_POST['tahun'];
$realbulan = $_POST['bulan'];
$bulan = getBulan($_POST['bulan']);
//  buat query dan jalankan query
$reload = "index.php?route=rekapgajibulanan"; // ke halaman dia sendiri
$query = "SELECT
  *
FROM
  gaji
  LEFT JOIN pegawai ON pegawai.nip = gaji.nip_gaji
WHERE
  tahun_gaji = '$tahun' AND bulan_gaji = '$bulan' 
ORDER BY id_gaji DESC";
$result = mysql_query($query);

$no_urut = 1;
//pagination config end

?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Rekap Absen Bulan <?php echo $bulan.' '.$tahun; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <!--bikin tabel-->
                    <table class="table table-bordered table-striped">
                        <!--bikin baris pakai tr-->
                        <tr>
                            <!--bikin header pakai th-->
                            <th>No.</th>
                            <th>Nama Karyawan</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Masuk</th>
                            <th>Off</th>
                            <th>Cuti</th>
                            <th>Sakit</th>
                            <th>Alpa</th>
                            <th>Aksi</th>
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
                                <td><?php echo $no_urut++; ?></td>
                                <td><?php echo $row['nama_pegawai']; ?></td>
                                <td><?php echo $row['nip']; ?></td>
                                <td><?php echo $row['jabatan_gaji']; ?></td>
                                <td><?php echo $row['masuk']; ?></td>
                                <td><?php echo $row['off']; ?></td>
                                <td><?php echo $row['cuti']; ?></td>
                                <td><?php echo $row['sakit']; ?></td>
                                <td><?php echo $row['alpa']; ?></td>
                                <td>
                                    <a target="_blank" href="index.php?route=rekapabsendetail&id=<?php echo $row['nip'] ?>&bulan=<?php echo $realbulan ?>&tahun=<?php echo $tahun ?>">Detail</a>
                                </td>
                            </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>