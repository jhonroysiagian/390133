            <?php 
            if (isset($_POST['rekamabsen'])) {

                $nip = $_POST['nip'];
                $tgl_absen = $_POST['tgl_absen'];
                $absen = $_POST['absen'];

                $counter = $_POST['counter']; 

                for ($i=1; $i<$counter; $i++)
                {   
                    $del = mysql_query("DELETE FROM absen WHERE nip_fk_absen = '$nip' AND tgl_absen = '$tgl_absen[$i]'");
                    $query = mysql_query("INSERT INTO absen(nip_fk_absen,tgl_absen, ket_absen) VALUES ('$nip','$tgl_absen[$i]','$absen[$i]')");
                }
                echo '<script>alert("Penambahan data berhasil.")</script>';
                echo '<script>window.location="index.php?route=absen"</script>';
            } else {
                if ($_POST['pegawai']=="") {
                echo '<script>alert("Pilih pegawai terlebih dahulu.")</script>';
                echo '<script>window.location="index.php?route=absenadd"</script>';
                }
            }

            ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Absen</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="index.php?route=absenrekam" method="POST">
                        <fieldset disabled>
                        <div class="form-group">
                            <label>NIP dan Nama Karyawan</label> <span class="inputerror"><?php echo $error_pegawai ?></span>
                            <select id="disabledSelect" class="form-control disabled" name="pegawai">
                                <?php 
                                $pegawai_selected = $_POST['pegawai'];
                                $pegawai = mysql_query("SELECT * FROM pegawai ORDER BY nama_pegawai");
                                while ($datapegawai = mysql_fetch_array($pegawai)) {
                                ?>
                                <option disabled="disabled" <?php echo $datapegawai['nip']==$pegawai_selected?'selected="selected"':''; ?> value="<?php echo $datapegawai['nip'] ?>"><?php echo $datapegawai['nip'].' - '.$datapegawai['nama_pegawai'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Tanggal Awal</label> <span class="inputerror"><?php echo $error_tgl_awal ?></span>
                            <input readonly="readonly" class="form-control" type="text" name="tgl_awal" placeholder="tanggal awal" value="<?php echo $_POST['tgl_awal']; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Tanggal Akhir</label> <span class="inputerror"><?php echo $error_tgl_akhir ?></span>
                            <input readonly="readonly" class="form-control" type="text" name="tgl_akhir" placeholder="tanggal akhir" value="<?php echo $_POST['tgl_akhir']; ?>">
                        </div>
                        </fieldset>

                        <table class="table">
                            <?php 
                            $mulai = tglrekamabsen($_POST['tgl_awal']);
                            $akhir = tglrekamabsen($_POST['tgl_akhir']);

                            $startDate = new DateTime($mulai,new DateTimeZone("Europe/London"));
                            $endDate = new DateTime($akhir,new DateTimeZone("Europe/London"));
                            $radio = 1;
                            do {
                            ?>
                            <tr <?php if (namahari($startDate->format("Y-m-d"))=="Minggu") {
                                ?>
                                style="background-color: #EEEEEE"
                                <?php
                                }
                            ?>>
                                <td>
                                    <?php echo namahari($startDate->format("Y-m-d"))?>
                                </td>
                                <td>
                                    <?php echo tglindo($startDate->format("Y-m-d"))?>
                                    <input type="hidden" readonly="readonly" name="tgl_absen[<?php echo $radio ?>]" value="<?php echo $startDate->format("Y-m-d") , PHP_EOL; ?>" />
                                </td>
                                <td>
                                    <select name="absen[<?php echo $radio ?>]">
                                        <option value="masuk">Masuk</option>
                                        <option value="off">Off</option>
                                        <option value="cuti">Cuti</option>
                                        <option value="sakit">Sakit</option>
                                        <option value="alpa">Alpa</option>
                                    </select>
                                </td>
                            </tr>
                            <?php
                               $startDate->modify("+1 day");
                               $radio++;
                            } while ($startDate <= $endDate);
                            ?>
                            <input type="hidden" name="counter" value="<?php echo $radio ?>" />
                        </table>

                        <input type="hidden" name="nip" value="<?php echo $pegawai_selected; ?>">
                        <input class="btn btn-primary" type="submit" name="rekamabsen" value="Simpan">
                        <a class="btn btn-default" href="index.php?route=absen">Batal</a>
                    </form>
                </div>
            </div>
