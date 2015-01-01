<!DOCTYPE html>
<html lang="en">

    <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/sb-admin-2.css" rel="stylesheet">
        <link href="../css/custom.css" rel="stylesheet">
        <title>Cetak Struk Gaji</title>
        <style>
            body{
                background-color: white;
                padding: 20px;
            }
            
            .tt tr td{
                /*padding-top: 0px;*/
            }
        </style>
    </head>
    <body onload="window.pridnt()">
<?php 
include '../inc/koneksi.php';
include '../inc/fungsi.php';

$nip = $_POST['pegawai'];
$tahun = $_POST['tahun'];
$bulan = getBulan($_POST['bulan']);
//  buat query dan jalankan query
$query = "SELECT
  *
FROM
  gaji
  LEFT JOIN pegawai ON gaji.nip_gaji = pegawai.nip
  LEFT JOIN jabatan ON pegawai.jabatan_pegawai = jabatan.id_jabatan
  LEFT JOIN ptkp ON pegawai.status_kawin = ptkp.kode_ptkp
WHERE
  tahun_gaji = '$tahun' AND bulan_gaji = '$bulan' AND nip_gaji = '$nip'";
$result = mysql_query($query);
$data = mysql_fetch_assoc($result);

$no_urut = 1;
$no_urut2 = 1;
//pagination config end

?>
            <div class="row">
                <div class="col-lg-6 text-center">
                    <img src="../img/text.jpg" width="200px"/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 text-center">
                    <h2 style="margin-bottom: 20px; margin-top: 5px">Struk Gaji Bulan <?php echo $bulan.' '.$tahun; ?></h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <table class="table" style="font-weight:bold">
                        <tr>
                            <td width="220px">Nama </td>
                            <td><?php echo $data['nama_pegawai'] ?></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td><?php echo $data['jabatan_gaji'] ?></td>
                        </tr>
                    </table>
                    
                    <table class="table">
                        <tr>
                            <th colspan="3">Hitungan Gaji</th>
                        </tr>
                        <tr>
                            <td>Gaji Pokok (Rp)</td>
                            <td></td>
                            <td style="text-align: right"><?php echo ribuan($data['gapok_gaji']) ?></td>
                        </tr>
                        <tr>
                            <td>Gaji Kehadiran (Rp)</td>
                            <td><?php echo ribuan($data['gaji_kehadiran']).' x '.$data['masuk'].' hari' ?></td>
                            <td style="text-align: right"><?php $gk = $data['gaji_kehadiran']*$data['masuk']; echo ribuan($gk)?></td>
                        </tr>
                        <tr>
                            <td>Tunjangan (Rp)</td>
                            <td></td>
                            <td style="text-align: right"><?php echo ribuan($data['tunja_gaji']) ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right">Total (Rp)</td>
                            <td style="text-align: right"><?php $bruto_bulan = $data['gapok_gaji']+$gk+$data['tunja_gaji']; echo ribuan($bruto_bulan) ?></td>
                        </tr>
                        <tr>
                            <td>
                                <!--hitungan pph pasal 21-->
                                <!--penghasilan netto setahun-->
                                <?php 
                                $netto_tahun = 12*$bruto_bulan;
                                $ptkp = $data['nilai_ptkp'];
                                
//                                kena pajak setahun = penghasilan netto pertahun dikurangi ptkp
                                $hpkp = $netto_tahun - $ptkp;
                                $pkp = $hpkp>0?$hpkp:0;
                                
//                                penentuan prosentase pajak sesuai aturan pajak
                                if ($pkp <= 50000000) {
                                    $persen = 5/100;
                                }else if ($pkp >50000000 AND $pkp<=250000000) {
                                    $persen = 15/100;
                                }else if ($pkp >250000000 AND $pkp<=500000000) {
                                    $persen = 25/100;
                                }else if ($pkp >500000000) {
                                    $persen = 30/100;
                                }
                                
//                                pph terhutang setahun
                                $pph_tahun = $pkp*$persen;
                                
//                                pph terhutang bulan ini
                                $pph_bulan = $pph_tahun/12;
                                
                                $gaji_bersih = $bruto_bulan - $pph_bulan;
                                ?>
                            </td>
                            <td style="text-align: right">Penghasilan Netto Setahun (Rp)</td>
                            <td style="text-align: right"><?php echo ribuan($netto_tahun); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right">PTKP Setahun (Rp)</td>
                            <td style="text-align: right"><?php echo ribuan($ptkp); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right">Penghasilan Kena Pajak Setahun (Rp)</td>
                            <td style="text-align: right"><?php echo ribuan($pkp); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right">Persentase PPh Pasal 21</td>
                            <td style="text-align: right"><?php echo $persen*100; echo " %"; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right">PPh Pasal 21 Terhutang Setahun (Rp)</td>
                            <td style="text-align: right"><?php echo ribuan($pph_tahun); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right">PPh Pasal 21 Terhutang Bulanan (Rp)</td>
                            <td style="text-align: right"><?php echo ribuan($pph_bulan); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right">Gaji Bersih (Rp)</td>
                            <td style="text-align: right"><strong><?php echo ribuan($gaji_bersih); ?></strong></td>
                        </tr>
                    </table>
                    <table class="table">
                        <tr>
                            <th colspan="2">Rekap Absen</th>
                        </tr>
                        <tr>
                            <td>Masuk</td>
                            <td style="text-align: right"><?php echo $data['masuk'] ?></td>
                        </tr>
                        <tr>
                            <td>Off</td>
                            <td style="text-align: right"><?php echo $data['off'] ?></td>
                        </tr>
                        <tr>
                            <td>Cuti</td>
                            <td style="text-align: right"><?php echo $data['cuti'] ?></td>
                        </tr>
                        <tr>
                            <td>Sakit</td>
                            <td style="text-align: right"><?php echo $data['sakit'] ?></td>
                        </tr>
                        <tr>
                            <td>Alpa</td>
                            <td style="text-align: right"><?php echo $data['alpa'] ?></td>
                        </tr>
                    </table>
                    <hr>
                    <small>Dicetak tanggal <?php echo date('d-m-Y H:i:s'); ?></small>
                </div>
            </div>
        </body>
</html>