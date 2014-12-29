<?php 
//untuk validasi 
//kita bikin error variabel
$error_nama_pegawai = '';
$error_nip = '';
$error_jabatan_pegawai = '';
$error_alamat = '';
$error_tgl_lahir = '';
$error_jenis_kelamin = '';
$error_tlp_pegawai = '';
$error_npwp_pegawai = '';
$error_agama = '';


//jika tombol submit ditekan
if (isset($_POST['submit'])) 
{
//    menangkap input dari form
    $nama_pegawai = mysql_real_escape_string(trim($_POST['nama_pegawai']));
    $nip = mysql_real_escape_string(trim($_POST['nip']));
    $jabatan_pegawai = mysql_real_escape_string(trim($_POST['jabatan_pegawai']));
    $alamat = mysql_real_escape_string(trim($_POST['alamat']));
    $tgl_lahir = mysql_real_escape_string(trim($_POST['tgl_lahir']));
    $jenis_kelamin = mysql_real_escape_string(trim($_POST['jenis_kelamin']));
    $tlp_pegawai = mysql_real_escape_string(trim($_POST['tlp_pegawai']));
    $npwp_pegawai = mysql_real_escape_string(trim($_POST['npwp_pegawai']));
    $agama = mysql_real_escape_string(trim($_POST['agama']));
    $id_pegawai = mysql_real_escape_string(trim($_POST['id_pegawai']));
    $status_kawin = mysql_real_escape_string(trim($_POST['status_kawin']));
        
    $tgl_lahir_input = sql($tgl_lahir);

//    validasi form
    if ($nama_pegawai=='') {
        $error_nama_pegawai= 'nama pegawai tidak boleh kosong';
    }
    if ($nip=='') {
        $error_nip = 'nip tidak boleh kosong';
    }else{
        $ceknip = mysql_query("SELECT * FROM pegawai WHERE nip = '$nip' AND id_pegawai<>'$id_pegawai'");
        $jumlah = mysql_num_rows($ceknip);
        if ($jumlah>0) {
            $error_nip = 'nip telah ada di database';
        }
    }
    if ($jabatan_pegawai =='') {
        $error_jabatan_pegawai = 'jabatan tidak boleh kosong';
    }
    if ($alamat=='') {
        $error_alamat = 'alamat tidak boleh kosong';
    }
    if ($tgl_lahir=='') {
        $error_tangal_lahir = 'tanggal lahir tidak boleh kosong';
    }
    if ($jenis_kelamin=='') {
        $error_jenis_kelamin = 'jenis kelamin tidak boleh kosong';
    }
    if ($tlp_pegawai=='') {
        $error_tlp_pegawai = 'nama user tidak boleh kosong';
    }else{
        if ( !is_numeric($tlp_pegawai)) {
            $error_tlp_pegawai = 'nomer telepon harus berupa angka';
        }
    }
    if ($npwp_pegawai=='') {
        $error_npwp_pegawai = 'npwp tidak boleh kosong';
    }
    if ($agama=='') {
        $error_agama = 'agama tidak boleh kosong';
    }
    
    if ($error_nama_pegawai == '' && 
            $error_nip == '' && 
            $error_jabatan_pegawai == '' && 
            $error_alamat == '' && 
            $error_tgl_lahir == '' && 
            $error_jenis_kelamin == '' && 
            $error_tlp_pegawai == '' 
            && $error_agama == '') {
    
    //    input ke database
        $query = "UPDATE pegawai SET nama_pegawai='$nama_pegawai', "
                . "nip='$nip', "
                . "alamat='$alamat', "
                . "jabatan_pegawai='$jabatan_pegawai', "
                . "tgl_lahir='$tgl_lahir_input', "
                . "jenis_kelamin='$jenis_kelamin', "
                . "tlp_pegawai='$tlp_pegawai', "
                . "npwp_pegawai='$npwp_pegawai', "
                . "agama='$agama', "
                . "status_kawin='$status_kawin' "
                . "WHERE id_pegawai='$id_pegawai'";
        $result = mysql_query($query);

        if (!$result) 
        {
    //  jika query gagal
            die(mysql_error());
        } 
        else 
        {
    //        jika berhasil
    //    tampilkan pesan
//          echo $query;
            echo '<script>alert("Perubahan data berhasil.")</script>';
    //    redirect ke user
            echo '<script>window.location="index.php?route=pegawai"</script>';
        }
    }
}

if (isset($_GET['id']))
{
    $id_pegawai = $_GET['id'];
}
else
{
    $id_pegawai = NULL;
}

//    ambil dari database
$query = "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'";
$result = mysql_query($query);


$row = mysql_fetch_assoc($result);

?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ubah Pegawai</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="index.php?route=pegawaiedit" method="POST">
                        <div class="form-group">
                            <label>Nama Pegawai</label> <span class="inputerror"><?php echo $error_nama_pegawai ?></span>
                            <input class="form-control" type="text" name="nama_pegawai" placeholder="nama pegawai" value="<?php echo $nama_pegawai?$nama_pegawai:$row['nama_pegawai']; ?>">
                        </div>
                        <div class="form-group">
                            <label>NIP</label> <span class="inputerror"><?php echo $error_nip ?></span>
                            <input class="form-control" type="text" name="nip" placeholder="nip" value="<?php echo $nip?$nip:$row['nip']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label> <span class="inputerror"><?php echo $error_jabatan_pegawai ?></span>
                            <select class="form-control" name="jabatan_pegawai">
                                <?php 
                                $jabatan_selected = $_POST['jabatan_pegawai']?$_POST['jabatan_pegawai']:$row['jabatan_pegawai'];
                                $jabatan = mysql_query("SELECT * FROM jabatan ORDER BY jabatan");
                                while ($datajabatan = mysql_fetch_array($jabatan)) {
                                ?>
                                <option <?php echo $datajabatan['id_jabatan']==$jabatan_selected?'selected="selected"':''; ?> value="<?php echo $datajabatan['id_jabatan'] ?>"><?php echo $datajabatan['jabatan'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label> <span class="inputerror"><?php echo $error_alamat ?></span>
                            <input class="form-control" type="text" name="alamat" placeholder="alamat" value="<?php echo $alamat?$alamat:$row['alamat']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label> <span class="inputerror"><?php echo $error_tgl_lahir ?></span>
                            <input readonly="readonly" class="form-control datepicker" type="text" name="tgl_lahir" placeholder="tanggal lahir" value="<?php echo $tgl_lahir?$tgl_lahir:tglview($row['tgl_lahir']); ?>">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label> <span class="inputerror"><?php echo $error_jenis_kelamin ?></span>
                            <?php 
                            $jenis_kelamin_checked = $_POST['jenis_kelamin']?$_POST['jenis_kelamin']:$row['jenis_kelamin'];
                            ?>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo $jenis_kelamin_checked=='Laki-laki'?'checked':''; ?>>Laki-laki
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo $jenis_kelamin_checked=='Perempuan'?'checked':''; ?>>Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>No. Telepon</label> <span class="inputerror"><?php echo $error_tlp_pegawai ?></span>
                            <input class="form-control" type="text" name="tlp_pegawai" placeholder="tlp_pegawai" value="<?php echo $tlp_pegawai?$tlp_pegawai:$row['tlp_pegawai']; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>NPWP</label> <span class="inputerror"><?php echo $error_npwp_pegawai ?></span>
                            <input class="form-control npwp-masked" type="text" name="npwp_pegawai" placeholder="NPWP" value="<?php echo $npwp_pegawai?$npwp_pegawai:$row['npwp_pegawai']; ?>">
                        </div>
                       
                        <div class="form-group">
                         <label>Agama</label> <span class="inputerror"><?php echo $error_agama ?></span>
                         <?php $selected_agama = $_POST['agama']?$_POST['agama']:$row['agama']; ?>
                         <select class="form-control" name="agama">
                                <option value="islam" <?php echo $selected_agama=='islam'?'selected="selected"':''; ?>>islam</option>
                                <option value="kristen khatolik" <?php echo $selected_agama=='kristen khatolik'?'selected="selected"':''; ?>>kristen khatolik</option>
                                <option value="kristen protestan" <?php echo $selected_agama=='kristen protestan'?'selected="selected"':''; ?>>kristen protestan</option>
                                <option value="hindu" <?php echo $selected_agama=='hindu'?'selected="selected"':''; ?>>hindu</option>
                                <option value="budha" <?php echo $selected_agama=='budha'?'selected="selected"':''; ?>>budha</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status Perkawinan</label> <span class="inputerror"><?php echo $error_status_kawin ?></span>
                            <select class="form-control" name="status_kawin">
                                <?php 
                                $ptkp_selected = $_POST['status_kawin']?$_POST['status_kawin']:$row['status_kawin'];
                                $ptkp = mysql_query("SELECT * FROM ptkp ORDER BY id_ptkp");
                                while ($dataptkp = mysql_fetch_array($ptkp)) {
                                ?>
                                <option <?php echo $dataptkp['id_ptkp']==$ptkp_selected?'selected="selected"':''; ?> value="<?php echo $dataptkp['id_ptkp'] ?>"><?php echo $dataptkp['nama_ptkp'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <!--jangan lupa kirim id-->
                        <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai?$id_pegawai:$row['id_pegawai']; ?>">
                        <input class="btn btn-primary" type="submit" name="submit" value="Edit">
                        <a class="btn btn-default" href="index.php?route=pegawai">Cancel</a>
                    </form>
                    </form>
                </div>
            </div>
            
