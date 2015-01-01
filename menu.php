        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; height: 51px !important">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div style="height: 50px; width: 251px; padding: 10px; border-right: 1px solid lightgray; background-color: white">
                <a style="padding: 0px" class="navbar-brand" href="index.html"><img src="img/text.jpg" width="230px" height="30px" /></a>
                </div>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li>
                    Selamat Datang, <?php echo $_SESSION['nama_user']; ?>
                    . Anda login sebagai <?php echo $_SESSION['level']; ?>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="index.php?route=profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="index.php?route=profile_setting"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="index.php?route=dashboard"><i class="fa fa-dashboard fa-fw"></i> Beranda</a>
                        </li>
                        
                        <?php 
                        $boleh_lihat_setting = array('admin');
                        
//                        $buah = array('apel','jeruk','mangga');
//                        var_dump(in_array('apel', $buah));
                        
                        if (in_array($_SESSION['level'],$boleh_lihat_setting)) {
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Pengaturan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
                                <li>
                                    <a href="index.php?route=user">Pengguna</a>
                                </li>
                                
                                <li>
                                    <a href="index.php?route=pegawai">Data Karyawan</a>
                                </li>
                                
                                <li>
                                    <a href="index.php?route=jabatan">Data Jabatan</a>
                                </li>
                                
                                <li>
                                    <a href="index.php?route=ptkp">PTKP</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php
                        }
                        ?>

                        <?php 
                        $boleh_input_absen = array('admin','operator');
                        if (in_array($_SESSION['level'],$boleh_input_absen)) {
                        ?>
                        <li>
                            <a href="index.php?route=absen"><i class="fa fa-clock-o fa-fw"></i> Data Absen</a>
                        </li>
                        <?php
                        }
                        ?>

                        <?php 
                        $boleh_preview_gaji = array('admin','operator');
                        if (in_array($_SESSION['level'],$boleh_preview_gaji)) {
                        ?>
                        <li>
                            <a href="index.php?route=previewgaji"><i class="fa fa-file-text fa-fw"></i> Hitungan Gaji</a>
                        </li>
                        <?php
                        }
                        ?>

                        <?php 
                        $boleh_tabel_gaji = array('admin','operator');
                        if (in_array($_SESSION['level'],$boleh_tabel_gaji)) {
                        ?>
                        <li>
                            <a href="index.php?route=tabelgaji"><i class="fa fa-table fa-fw"></i> Tabel Gaji</a>
                        </li>
                        <?php
                        }
                        ?>
                        
                        <?php 
                        $boleh_laporan = array('admin','manager');
                        if (in_array($_SESSION['level'],$boleh_laporan)) {
                        ?>
                        <li>
                            <a href="index.php?route=laporan"><i class="fa fa-th fa-fw"></i> Laporan <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
                                <li>
                                    <a href="index.php?route=struk">Struk Gaji</a>
                                </li>
                                
                                <li>
                                    <a href="index.php?route=tandaterima">Tanda Terima</a>
                                </li>
                                
                                <li>
                                    <a href="index.php?route=gajibulanan">Rekap Gaji Bulanan</a>
                                </li>
                                
                                <li>
                                    <a href="index.php?route=rekapabsen">Rekap Absen</a>
                                </li>
                                
                            </ul>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
