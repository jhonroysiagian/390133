<?php 
//  buat query dan jalankan query
if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
    $keyword=$_REQUEST['keyword'];
    $reload = "index.php?route=absen&keyword=$keyword";
    $query = "SELECT
      *
    FROM
      absen
      LEFT JOIN pegawai ON pegawai.id_pegawai = absen.id_pegawai_fk_absen
    WHERE
      nama_pegawai LIKE '%$keyword%' OR 
      ket_absen LIKE '%$keyword%' 
    ORDER BY id_absen DESC";
    $result = mysql_query($query);
}else{
    $reload = "index.php?route=absen"; // ke halaman dia sendiri
    $query = "SELECT
      *
    FROM
      absen
      LEFT JOIN pegawai ON pegawai.id_pegawai = absen.id_pegawai_fk_absen
    ORDER BY id_absen DESC";
    $result = mysql_query($query);
}

    

//pagination config start
$rpp = 31; // jumlah record per halaman
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
                    <h1 class="page-header">Data Absen</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <a href="index.php?route=absenadd" class="btn btn-primary">Tambah</a>

                    <!--muncul jika ada pencarian start-->
                    <?php
                    if($_REQUEST['keyword']<>""){
                    ?>
                        <a class="btn btn-default btn-outline" href="index.php?route=absen"> Reset Pencarian</a>
                    <?php
                    }
                    ?>
                    <!--muncul jika ada pencarian end-->

                </div>
                <div class="col-lg-4 text-right">
                    <form method="post" action="index.php?route=absen">
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
                            <th>Nama *</th>
                            <th>Tanggal</th>
                            <th>Keterangan *</th>
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
                                <td><?php echo tglview($row['tgl_absen']); ?></td>
                                <td><?php echo $row['ket_absen']; ?></td>
                                <td>
                                    <!--menambahkan link untuk edit delete-->
                                    <a href="index.php?route=absenedit&id=<?php echo $row['id_absen']; ?>">Ubah</a> | 
                                    <a href="index.php?route=absendelete&id=<?php echo $row['id_absen']; ?>" onclick="javascript: return confirm('Anda yakin ?')">Hapus</a>
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