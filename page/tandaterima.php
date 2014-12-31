            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cetak Tanda Terima Gaji Bulanan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form target="_blank" role="form" action="page/cetaktandaterima.php" method="POST">
                        
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
                        
                        <input class="btn btn-primary" type="submit" name="submit" value="Cetak">
                        <!--<a class="btn btn-default" href="index.php?route=absen">Batal</a>-->
                    </form>
                </div>
            </div>