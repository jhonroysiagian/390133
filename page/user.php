            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a href="index.php?route=useradd" class="btn btn-primary">Add</a> <br><br>
                    <!--bikin tabel-->
                    <table class="table table-bordered table-striped">
                        <!--bikin baris pakai tr-->
                        <tr>
                            <!--bikin header pakai th-->
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                        <?php 
//                        buat query dan jalankan query
                        $query = "SELECT * FROM user ORDER BY nama_user";
                        $result = mysql_query($query);
                        
                        if (!$result) 
                        {
//                        jika query gagal
                            die(mysql_error());
                        } 
                        else 
                        {
//                        jika query berhasil
                            $no_urut = 1;
                            while ($row = mysql_fetch_assoc($result)) 
                            {
                        ?>
                            <!--bikin baris pakai tr-->
                            <tr>
                                <!--bikin kolom pakai td-->
                                <td><?php echo $no_urut++; ?></td>
                                <td><?php echo $row['nama_user']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['level']; ?></td>
                                <td>
                                    <!--menambahkan link untuk edit delete-->
                                    <a href="index.php?route=useredit&id=<?php echo $row['id_user']; ?>">Edit</a> | 
                                    <a href="index.php?route=userdelete&id=<?php echo $row['id_user']; ?>" onclick="javascript: return confirm('Anda yakin ?')">Delete</a>
                                </td>
                            </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>