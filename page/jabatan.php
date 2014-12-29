<?php 
//  buat query dan jalankan query
$query = "SELECT * FROM jabatan ORDER BY id_jabatan";
$result = mysql_query($query);
    

//pagination config start
$reload = "index.php?route=jabatan"; // ke halaman dia sendiri
$rpp = 10; // jumlah record per halaman
//$adjacents = 4;
$page = intval($_GET["page"]);
if($page<=0) $page = 1;  
$tcount = mysql_num_rows($result); // 7
$tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
$count = 0;
$i = ($page-1)*$rpp;
$no_urut = ($page-1)*$rpp;
//pagination config end

?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Jabatan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a href="index.php?route=jabatanadd" class="btn btn-primary">Tambah</a> <br><br>
                    <!--bikin tabel-->
                    <table class="table table-bordered table-striped">
                        <!--bikin baris pakai tr-->
                        <tr>
                            <!--bikin header pakai th-->
                            <th>No</th>
                            <th>Jabatan</th>
                            <th>Gaji Pokok</th>
                            <th>Gaji Kehadiran</th>
                            <th>Tunjangan</th>
                            <th>Aksi</th>
                        </tr>
                        <?php 
                        
                        if (!$result) 
                        {
//                        jika query gagal
                            die(mysql_error());
                        } 
                        else 
                        {
                            
//                        jika query berhasil
                            while(($count<$rpp) && ($i<$tcount)) {
                                mysql_data_seek($result,$i);
                                $row = mysql_fetch_array($result);
                        ?>
                            <!--bikin baris pakai tr-->
                            <tr>
                                <!--bikin kolom pakai td-->
                                <td><?php echo ++$no_urut; ?></td>
                                <td><?php echo $row['jabatan']; ?></td>
                                <td><?php echo rp($row['gaji_pokok']);?></td>
                                <td><?php echo rp($row['gaji_kehadiran']); ?></td>
                                <td><?php echo rp($row['tunjangan']); ?></td>
                                <td>
                                    <!--menambahkan link untuk edit delete-->
                                    <a href="index.php?route=jabatanedit&id=<?php echo $row['id_jabatan']; ?>">Ubah</a> | 
                                    <a href="index.php?route=jabatandelete&id=<?php echo $row['id_jabatan']; ?>" onclick="javascript: return confirm('Anda yakin ?')">Hapus</a>
                                </td>
                            </tr>
                        <?php
                                $i++; 
                                $count++;
                            }
                        }
                        ?>
                    </table>
                    <div>
                    <?php echo paginate_one($reload, $page, $tpages, $adjacents); ?>
                    </div>
                </div>
            </div>