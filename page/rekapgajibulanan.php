<?php 
$tahun = $_POST['tahun'];
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
ORDER BY nama_pegawai ASC";
$result = mysql_query($query);

$no_urut = 1;
//pagination config end

?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Rekap Gaji Bulan <?php echo $bulan.' '.$tahun; ?></h1>
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
                            <th>Jabatan</th>
                            <th>Gaji Pokok (Rp)</th>
                            <th>Gaji Kehadiran (Rp)</th>
                            <th>Tunjangan (Rp)</th>
                            <th>Gaji Kotor (Rp)</th>
                            <th>Persentase PPh</th>
                            <th>PPh (Rp)</th>
                            <th>Gaji Bersih (Rp)</th>
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
                                <td><?php echo $row['jabatan_gaji']; ?></td>
                                <td style="text-align: right"><?php echo ribuan($row['gapok_gaji']); ?></td>
                                <td style="text-align: right"><?php echo ribuan($row['gakeh_gaji']); ?></td>
                                <td style="text-align: right"><?php echo ribuan($row['tunja_gaji']); ?></td>
                                <td style="text-align: right"><?php echo ribuan($row['kotor_gaji']); ?></td>
                                <td style="text-align: right"><?php echo $row['persen_gaji']; ?> %</td>
                                <td style="text-align: right"><?php echo ribuan($row['pph_bulan_gaji']); ?></td>
                                <td style="text-align: right"><?php echo ribuan($row['bersih_gaji']); ?></td>
                            </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>