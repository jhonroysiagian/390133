            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Absen</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="index.php?route=absenrekam" method="POST">
                        <div class="form-group">
                            <label>Nama Pegawai</label> <span class="inputerror"><?php echo $error_pegawai ?></span>
                            <select class="form-control" name="pegawai">
                                <?php 
                                $pegawai_selected = $_POST['pegawai'];
                                $pegawai = mysql_query("SELECT * FROM pegawai ORDER BY id_pegawai");
                                while ($datapegawai = mysql_fetch_array($pegawai)) {
                                ?>
                                <option <?php echo $datapegawai['id_pegawai']==$pegawai_selected?'selected="selected"':''; ?> value="<?php echo $datapegawai['id_pegawai'] ?>"><?php echo $datapegawai['nama_pegawai'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        
                        <?php 
                        $tgl_hari_ini = date('d');
                        $bln_hari_ini = date('m');
                        $thn_hari_ini = date('Y');
                        
                        $tgl_lalu = mktime(0, 0, 0, $bln_hari_ini, $tgl_hari_ini-30, $thn_hari_ini);
                        $tgl_akhir = date("d/m/Y");
                        $tgl_awal = date("d/m/Y", $tgl_lalu);
                        ?>
                        
                        <div class="form-group">
                            <label>Tanggal Awal</label> <span class="inputerror"><?php echo $error_tgl_awal ?></span>
                            <input readonly="readonly" class="form-control datepicker" type="text" name="tgl_awal" placeholder="tanggal awal" value="<?php echo $tgl_awal; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Tanggal Akhir</label> <span class="inputerror"><?php echo $error_tgl_akhir ?></span>
                            <input readonly="readonly" class="form-control datepicker" type="text" name="tgl_akhir" placeholder="tanggal akhir" value="<?php echo $tgl_akhir; ?>">
                        </div>
                        
                        <input class="btn btn-primary" type="submit" name="submit" value="Berikutnya">
                        <a class="btn btn-default" href="index.php?route=absen">Batal</a>
                    </form>
                </div>
            </div>