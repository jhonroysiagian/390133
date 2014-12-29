            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <tr>
                            <td width="150px">Nama Pegawai</td>
                            <td width="10px">:</td>
                            <td><?php echo $_SESSION['nama_user'] ?></td>
                        </tr>
                        <tr>
                            <td width="150px">Username</td>
                            <td width="10px">:</td>
                            <td><?php echo $_SESSION['username'] ?></td>
                        </tr>
                        <tr>
                            <td width="150px">Level</td>
                            <td width="10px">:</td>
                            <td><?php echo $_SESSION['level'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>