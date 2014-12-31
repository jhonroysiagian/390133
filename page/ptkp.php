<?php 
//  buat query dan jalankan query
$query = "SELECT * FROM ptkp ORDER BY kode_ptkp DESC";
$result = mysql_query($query);
    

//pagination config start
$reload = "index.php?route=ptkp"; // ke halaman dia sendiri
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
                    <h1 class="page-header">Data PTKP (Penghasilan Tidak Kena Pajak)</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a href="index.php?route=ptkpadd" class="btn btn-primary">Tambah</a> <br><br>
                    <!--bikin tabel-->
                    <table class="table table-bordered table-striped">
                        <!--bikin baris pakai tr-->
                        <tr>
                            <!--bikin header pakai th-->
                            <th>No</th>
                            <th>Kode PTKP</th>
                            <th>Keterangan PTKP</th>
                            <th>Nilai PTKP / Tahun</th>
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
                                <td><?php echo $row['kode_ptkp']; ?></td>
                                <td><?php echo $row['nama_ptkp']; ?></td>
                                <td><?php echo rp($row['nilai_ptkp']);?></td>
                                <td>
                                    <!--menambahkan link untuk edit delete-->
                                    <a href="index.php?route=ptkpedit&id=<?php echo $row['kode_ptkp']; ?>">Ubah</a> | 
                                    <a href="index.php?route=ptkpdelete&id=<?php echo $row['kode_ptkp']; ?>" onclick="javascript: return confirm('Anda yakin ?')">Hapus</a>
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