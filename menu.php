        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Aplikasi Gaji Obesphere</a>
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
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
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
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
                        <li>
                            <a href="index.php?route=dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <?php 
                        $boleh_lihat_setting = array('admin');
                        
//                        $buah = array('apel','jeruk','mangga');
//                        var_dump(in_array('apel', $buah));
                        
                        if (in_array($_SESSION['level'],$boleh_lihat_setting)) {
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Setting<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
                                <li>
                                    <a href="index.php?route=user">User</a>
                                </li>
                                
                                <li>
                                    <a href="index.php?route=pegawai">Data Pegawai</a>
                                </li>
                                
                                <li>
                                    <a href="index.php?route=jabatan">Jabatan</a>
                                </li>
                                
                                <li>
                                    <a href="index.php?route=global">Global</a>
                                </li>
                                
                                <li>
                                    <a href="index.php?route=perkawinan">Status Perkawinan</a>
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
                            <a href="index.php?route=inputabsen"><i class="fa fa-clock-o fa-fw"></i> Input Absen</a>
                        </li>
                        <?php
                        }
                        ?>

                        <?php 
                        $boleh_preview_gaji = array('admin','operator');
                        if (in_array($_SESSION['level'],$boleh_preview_gaji)) {
                        ?>
                        <li>
                            <a href="index.php?route=previewgaji"><i class="fa fa-file-text fa-fw"></i> Preview Gaji</a>
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
                        $boleh_laporan = array('manager');
                        if (in_array($_SESSION['level'],$boleh_laporan)) {
                        ?>
                        <li>
                            <a href="index.php?route=laporan"><i class="fa fa-th fa-fw"></i> Laporan</a>
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