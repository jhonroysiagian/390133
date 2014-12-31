            <?php 
            if (isset($_POST['simpangaji'])) {
                
                $nip_gaji = $_POST['nip_gaji'];
                $jabatan_gaji = $_POST['jabatan'];
                $bulan_gaji = $_POST['bulan_gaji'];
                $tahun_gaji = $_POST['tahun_gaji'];
                $gapok_gaji = $_POST['gapok_gaji'];
                $gakeh_gaji = $_POST['gakeh_gaji'];
                $tunja_gaji = $_POST['tunja_gaji'];
                $kotor_gaji = $_POST['kotor_gaji'];
                $netto_tahun_gaji = $_POST['netto_tahun_gaji'];
                $ptkp_tahun_gaji = $_POST['ptkp_tahun_gaji'];
                $pkp_tahun_gaji = $_POST['pkp_tahun_gaji'];
                $persen_gaji = $_POST['persen_gaji'];
                $pph_tahun_gaji = $_POST['pph_tahun_gaji'];
                $pph_bulan_gaji = $_POST['pph_bulan_gaji'];
                $bersih_gaji = $_POST['bersih_gaji'];
                $masuk = $_POST['masuk'];
                $cuti = $_POST['cuti'];
                $off = $_POST['off'];
                $sakit = $_POST['sakit'];
                $alpa = $_POST['alpa'];

                $del = mysql_query("DELETE FROM gaji WHERE nip_gaji = '$nip_gaji' AND bulan_gaji = '$bulan_gaji' AND tahun_gaji = '$tahun_gaji'");
                
                $query = mysql_query("INSERT INTO gaji (nip_gaji, "
                        . "jabatan_gaji, "
                        . "bulan_gaji, "
                        . "tahun_gaji, "
                        . "gapok_gaji, "
                        . "gakeh_gaji, "
                        . "tunja_gaji, "
                        . "kotor_gaji, "
                        . "netto_tahun_gaji, "
                        . "ptkp_tahun_gaji, "
                        . "pkp_tahun_gaji, "
                        . "persen_gaji, "
                        . "pph_tahun_gaji, "
                        . "pph_bulan_gaji, "
                        . "masuk, "
                        . "off, "
                        . "cuti, "
                        . "sakit, "
                        . "alpa, "
                        . "bersih_gaji) "
                        . "VALUES "
                        . "('$nip_gaji',"
                        . "'$jabatan_gaji',"
                        . "'$bulan_gaji',"
                        . "'$tahun_gaji',"
                        . "'$gapok_gaji',"
                        . "'$gakeh_gaji',"
                        . "'$tunja_gaji',"
                        . "'$kotor_gaji',"
                        . "'$netto_tahun_gaji',"
                        . "'$ptkp_tahun_gaji',"
                        . "'$pkp_tahun_gaji',"
                        . "'$persen_gaji',"
                        . "'$pph_tahun_gaji',"
                        . "'$pph_bulan_gaji',"
                        . "'$masuk',"
                        . "'$off',"
                        . "'$cuti',"
                        . "'$sakit',"
                        . "'$alpa',"
                        . "'$bersih_gaji')");
                echo '<script>alert("Simpan data gaji berhasil.")</script>';
                echo '<script>window.location="index.php?route=previewgaji"</script>';
            } else {
                if ($_POST['pegawai']=="") {
                echo '<script>alert("Pilih pegawai terlebih dahulu.")</script>';
                echo '<script>window.location="index.php?route=previewgaji"</script>';
                }
            }
            
//            ambil data pegawai
            $nip = $_POST['pegawai'];
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
            
            $qgaji = mysql_query("SELECT
                                    *
                                  FROM
                                    pegawai
                                    LEFT JOIN jabatan ON pegawai.jabatan_pegawai = jabatan.id_jabatan
                                    LEFT JOIN ptkp ON pegawai.status_kawin = ptkp.kode_ptkp 
                                  WHERE 
                                    nip = '$nip'");
            
            if (!$qgaji) {
                die(mysql_error());
            }
            
            $data = mysql_fetch_assoc($qgaji);
            
            
//            hitung jumlah masuk kerja
            $qmasuk = mysql_query("SELECT
                                    *
                                  FROM
                                    absen
                                  WHERE 
                                    nip_fk_absen = '$nip' AND DATE_FORMAT(tgl_absen,'%m') = '$bulan' AND DATE_FORMAT(tgl_absen,'%Y') = '$tahun' AND ket_absen = 'masuk'");
            $jumlahmasuk = mysql_num_rows($qmasuk);
//            hitung jumlah cuti kerja
            $qcuti = mysql_query("SELECT
                                    *
                                  FROM
                                    absen
                                  WHERE 
                                    nip_fk_absen = '$nip' AND DATE_FORMAT(tgl_absen,'%m') = '$bulan' AND DATE_FORMAT(tgl_absen,'%Y') = '$tahun' AND ket_absen = 'cuti'");
            $jumlahcuti = mysql_num_rows($qcuti);
//            hitung jumlah sakit kerja
            $qsakit = mysql_query("SELECT
                                    *
                                  FROM
                                    absen
                                  WHERE 
                                    nip_fk_absen = '$nip' AND DATE_FORMAT(tgl_absen,'%m') = '$bulan' AND DATE_FORMAT(tgl_absen,'%Y') = '$tahun' AND ket_absen = 'sakit'");
            $jumlahsakit = mysql_num_rows($qsakit);
//            hitung jumlah alpa kerja
            $qalpa = mysql_query("SELECT
                                    *
                                  FROM
                                    absen
                                  WHERE 
                                    nip_fk_absen = '$nip' AND DATE_FORMAT(tgl_absen,'%m') = '$bulan' AND DATE_FORMAT(tgl_absen,'%Y') = '$tahun' AND ket_absen = 'alpa'");
            $jumlahalpa = mysql_num_rows($qalpa);
//            hitung jumlah off kerja
            $qoff = mysql_query("SELECT
                                    *
                                  FROM
                                    absen
                                  WHERE 
                                    nip_fk_absen = '$nip' AND DATE_FORMAT(tgl_absen,'%m') = '$bulan' AND DATE_FORMAT(tgl_absen,'%Y') = '$tahun' AND ket_absen = 'off'");
            $jumlahoff = mysql_num_rows($qoff);
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hitungan Gaji</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <tr>
                            <th width="220px">Nama Pegawai</th>
                            <th><?php echo $data['nama_pegawai'] ?></th>
                        </tr>
                        <tr>
                            <th width="220px">Jabatan</th>
                            <th><?php echo $data['jabatan'] ?></th>
                        </tr>
                        <tr>
                            <th>Periode</th>
                            <th><?php echo getBulan($bulan).' '.$tahun; ?></th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <table class="table">
                        <tr>
                            <th colspan="3">Hitungan Gaji</th>
                        </tr>
                        <tr>
                            <td>Gaji Pokok (Rp)</td>
                            <td></td>
                            <td style="text-align: right"><?php echo ribuan($data['gaji_pokok']) ?></td>
                        </tr>
                        <tr>
                            <td>Gaji Kehadiran (Rp)</td>
                            <td><?php echo ribuan($data['gaji_kehadiran']).' x '.$jumlahmasuk.' hari' ?></td>
                            <td style="text-align: right"><?php $gk = $data['gaji_kehadiran']*$jumlahmasuk; echo ribuan($gk)?></td>
                        </tr>
                        <tr>
                            <td>Tunjangan (Rp)</td>
                            <td></td>
                            <td style="text-align: right"><?php echo ribuan($data['tunjangan']) ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right">Total (Rp)</td>
                            <td style="text-align: right"><?php $bruto_bulan = $data['gaji_pokok']+$gk+$data['tunjangan']; echo ribuan($bruto_bulan) ?></td>
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
                    <form action="index.php?route=gajihitung" method="post">
                        <input type="hidden" name="nip_gaji" value="<?php echo $nip ?>" />
                        <input type="hidden" name="jabatan" value="<?php echo $data['jabatan'] ?>" />
                        <input type="hidden" name="bulan_gaji" value="<?php echo getBulan($bulan)  ?>" />
                        <input type="hidden" name="tahun_gaji" value="<?php echo $tahun ?>" />
                        <input type="hidden" name="gapok_gaji" value="<?php echo $data['gaji_pokok'] ?>" />
                        <input type="hidden" name="gakeh_gaji" value="<?php echo $gk ?>" />
                        <input type="hidden" name="tunja_gaji" value="<?php echo $data['tunjangan'] ?>" />
                        <input type="hidden" name="kotor_gaji" value="<?php echo $bruto_bulan ?>" />
                        <input type="hidden" name="netto_tahun_gaji" value="<?php echo $netto_tahun ?>" />
                        <input type="hidden" name="ptkp_tahun_gaji" value="<?php echo $ptkp ?>" />
                        <input type="hidden" name="pkp_tahun_gaji" value="<?php echo $pkp ?>" />
                        <input type="hidden" name="persen_gaji" value="<?php echo $persen*100 ?>" />
                        <input type="hidden" name="pph_tahun_gaji" value="<?php echo $pph_tahun ?>" />
                        <input type="hidden" name="pph_bulan_gaji" value="<?php echo $pph_bulan ?>" />
                        <input type="hidden" name="bersih_gaji" value="<?php echo $gaji_bersih ?>" />
                        <input type="hidden" name="masuk" value="<?php echo $jumlahmasuk ?>" />
                        <input type="hidden" name="off" value="<?php echo $jumlahoff ?>" />
                        <input type="hidden" name="cuti" value="<?php echo $jumlahcuti ?>" />
                        <input type="hidden" name="sakit" value="<?php echo $jumlahsakit ?>" />
                        <input type="hidden" name="alpa" value="<?php echo $jumlahalpa ?>" />
                        <input class="btn btn-primary" type="submit" name="simpangaji" value="Setuju dan Simpan">
                        <a class="btn btn-default" href="index.php?route=previewgaji">Batal</a>
                    </form>
                </div>
                <div class="col-lg-4">
                    <table class="table">
                        <tr>
                            <th colspan="2">Rekap Absen</th>
                        </tr>
                        <tr>
                            <td>Masuk</td>
                            <td style="text-align: right"><?php echo $jumlahmasuk ?></td>
                        </tr>
                        <tr>
                            <td>Off</td>
                            <td style="text-align: right"><?php echo $jumlahoff ?></td>
                        </tr>
                        <tr>
                            <td>Cuti</td>
                            <td style="text-align: right"><?php echo $jumlahcuti ?></td>
                        </tr>
                        <tr>
                            <td>Sakit</td>
                            <td style="text-align: right"><?php echo $jumlahsakit ?></td>
                        </tr>
                        <tr>
                            <td>Alpa</td>
                            <td style="text-align: right"><?php echo $jumlahalpa ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Total</td>
                            <td style="text-align: right"><?php echo $jumlahmasuk+$jumlahoff+$jumlahcuti+$jumlahsakit+$jumlahalpa ?></td>
                        </tr>

                    </table>
                </div>
            </div>
