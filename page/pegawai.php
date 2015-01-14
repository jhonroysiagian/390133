<?php 
//  buat query dan jalankan query
if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
    $keyword=$_REQUEST['keyword'];
    $reload = "index.php?route=pegawai&keyword=$keyword";
    $query = "SELECT
      *
    FROM
      pegawai
      LEFT JOIN jabatan ON pegawai.jabatan_pegawai = jabatan.id_jabatan
      LEFT JOIN ptkp ON pegawai.status_kawin = ptkp.kode_ptkp
    WHERE
      nip LIKE '%$keyword%' OR
      nama_pegawai LIKE '%$keyword%' OR
      jabatan LIKE '%$keyword%' OR
      alamat LIKE '%$keyword%' OR
      jenis_kelamin LIKE '%$keyword%' OR
      tlp_pegawai LIKE '%$keyword%' OR
      npwp_pegawai LIKE '%$keyword%' OR
      jenis_kelamin LIKE '%$keyword%' OR
      agama LIKE '%$keyword%' OR 
      nama_ptkp LIKE '%$keyword%'
    ORDER BY nama_pegawai";
    $result = mysql_query($query);
}else{
    $reload = "index.php?route=pegawai"; // ke halaman dia sendiri
    $query = "SELECT
      *
    FROM
      pegawai
      LEFT JOIN jabatan ON pegawai.jabatan_pegawai = jabatan.id_jabatan
      LEFT JOIN ptkp ON pegawai.status_kawin = ptkp.kode_ptkp
    ORDER BY nama_pegawai";
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
                    <h1 class="page-header">Data Karyawan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <a href="index.php?route=pegawaiadd" class="btn btn-primary">Tambah</a>

                    <!--muncul jika ada pencarian start-->
                    <?php
                    if($_REQUEST['keyword']<>""){
                    ?>
                        <a class="btn btn-default btn-outline" href="index.php?route=pegawai"> Reset Pencarian</a>
                    <?php
                    }
                    ?>
                    <!--muncul jika ada pencarian end-->

                </div>
                <div class="col-lg-4 text-right">
                    <form method="post" action="index.php?route=pegawai">
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
                            <th>NIP *</th>
                            <th>Nama *</th>
                            <th>Jabatan *</th>
                            <th>Alamat *</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin *</th>
                            <th>Nomer Telepon *</th>
                            <th>NPWP *</th>
                            <th>Agama *</th>
                            <th>Status *</th>
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
                                <td><?php echo $row['nip']; ?></td>
                                <td><?php echo $row['nama_pegawai']; ?></td>
                                <td><?php echo $row['jabatan']; ?></td>
                                <td><?php echo $row['alamat']; ?></td>
                                <td><?php echo tglview($row['tgl_lahir']); ?></td>
                                <td><?php echo $row['jenis_kelamin']; ?></td>
                                <td><?php echo $row['tlp_pegawai']; ?></td>
                                <td><?php echo $row['npwp_pegawai']; ?></td>
                                <td><?php echo $row['agama']; ?></td>
                                <td><?php echo $row['nama_ptkp']; ?></td>
                                <td>
                                    <!--menambahkan link untuk edit delete-->
                                    <a href="index.php?route=pegawaiedit&id=<?php echo $row['nip']; ?>">Ubah</a> | 
                                    <a href="index.php?route=pegawaidelete&id=<?php echo $row['nip']; ?>" onclick="javascript: return confirm('Anda yakin ?')">Hapus</a>
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