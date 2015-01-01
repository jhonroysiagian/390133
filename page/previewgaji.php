            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hitungan Gaji</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="index.php?route=gajihitung" method="POST">
                        <div class="form-group">
                            <label>Nama Karyawan</label> <span class="inputerror"><?php echo $error_pegawai ?></span>
                            <select class="form-control" name="pegawai">
                                <?php 
                                $pegawai_selected = $_POST['pegawai'];
                                $pegawai = mysql_query("SELECT * FROM pegawai ORDER BY nama_pegawai");
                                while ($datapegawai = mysql_fetch_array($pegawai)) {
                                ?>
                                <option <?php echo $datapegawai['nip']==$pegawai_selected?'selected="selected"':''; ?> value="<?php echo $datapegawai['nip'] ?>"><?php echo $datapegawai['nama_pegawai'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Tahun</label>
                            <select class="form-control" name="tahun">
                                <?php 
                                $thn_skr = date('Y');
                                for ($x = $thn_skr; $x >= 2012; $x--) {
                                ?>
                                <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Bulan</label>
                            <select class="form-control" name="bulan">
                                <?php 
                                for ($x = 1; $x <= 12; $x++) {
                                ?>
                                <option value="<?php echo $x ?>"><?php echo getBulan($x) ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        
                        <input class="btn btn-primary" type="submit" name="submit" value="Berikutnya">
                        <!--<a class="btn btn-default" href="index.php?route=absen">Batal</a>-->
                    </form>
                </div>
            </div>