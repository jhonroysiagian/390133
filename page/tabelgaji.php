<?php 
//  buat query dan jalankan query
if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
    $keyword=$_REQUEST['keyword'];
    $reload = "index.php?route=gaji&keyword=$keyword";
    $query = "SELECT
      *
    FROM
      gaji
      LEFT JOIN pegawai ON pegawai.nip = gaji.nip_gaji
    WHERE
      nama_pegawai LIKE '%$keyword%' OR
      bulan_gaji LIKE '%$keyword%'
    ORDER BY id_gaji DESC";
    $result = mysql_query($query);
}else{
    $reload = "index.php?route=gaji"; // ke halaman dia sendiri
    $query = "SELECT
      *
    FROM
      gaji
      LEFT JOIN pegawai ON pegawai.nip = gaji.nip_gaji
    ORDER BY id_gaji DESC";
    $result = mysql_query($query);
}

    

//pagination config start
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
                    <h1 class="page-header">Data Gaji</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <?php
                    if($_REQUEST['keyword']<>""){
                    ?>
                        <a class="btn btn-default btn-outline" href="index.php?route=tabelgaji"> Reset Pencarian</a>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-lg-4 text-right">
                    <form method="post" action="index.php?route=tabelgaji">
                        <div class="form-group input-group">
                            <input type="text" name="keyword" class="form-control" placeholder="Search..." value="<?php echo $_REQUEST['keyword']; ?>">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <!--bikin tabel-->
                    <table class="table table-bordered table-striped">
                        <!--bikin baris pakai tr-->
                        <tr>
                            <!--bikin header pakai th-->
                            <th>No.</th>
                            <th>Nama Pegawai</th>
                            <th>Periode Gaji</th>
                            <th>Jabatan</th>
                            <th>Gaji Pokok</th>
                            <th>Gaji Kehadiran</th>
                            <th>Tunjangan</th>
                            <th>Gaji Kotor</th>
                            <th>Persentase PPh</th>
                            <th>PPh</th>
                            <th>Gaji Bersih</th>
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
                                <td><?php echo $row['nama_pegawai']; ?></td>
                                <td><?php echo $row['bulan_gaji']." ".$row['tahun_gaji']; ?></td>
                                <td><?php echo $row['jabatan_gaji']; ?></td>
                                <td style="text-align: right"><?php echo ribuan($row['gapok_gaji']); ?></td>
                                <td style="text-align: right"><?php echo ribuan($row['gakeh_gaji']); ?></td>
                                <td style="text-align: right"><?php echo ribuan($row['tunja_gaji']); ?></td>
                                <td style="text-align: right"><?php echo ribuan($row['kotor_gaji']); ?></td>
                                <td style="text-align: right"><?php echo $row['persen_gaji']; ?></td>
                                <td style="text-align: right"><?php echo ribuan($row['pph_bulan_gaji']); ?></td>
                                <td style="text-align: right"><?php echo ribuan($row['bersih_gaji']); ?></td>
                                <td>
                                    <!--menambahkan link untuk edit delete-->
                                    <a href="index.php?route=tabelgajidelete&id=<?php echo $row['id_gaji']; ?>" onclick="javascript: return confirm('Anda yakin ?')">Hapus</a>
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