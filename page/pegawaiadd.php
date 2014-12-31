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
    $status_kawin = mysql_real_escape_string(trim($_POST['status_kawin']));
    
    $tgl_lahir_input = sql($tgl_lahir);
    
//    validasi form
    if ($nama_pegawai=='') {
        $error_nama_pegawai = 'nama pegawai tidak boleh kosong';
    }
    
    if ($nip=='') {
        $error_nip = 'nip tidak boleh kosong';
    }else{
        if ( !is_numeric($nip)) {
            $error_nip = 'nip harus berupa angka';
        } else {
            if (strlen($nip) <> 8) {
                $error_nip = 'nip harus 8 digit';
            } else {
                $ceknip = mysql_query("SELECT * FROM pegawai WHERE nip = '$nip'");
                $jumlah = mysql_num_rows($ceknip);
                if ($jumlah>0) {
                    $error_nip = 'nip telah ada di database';
                }
            }
        }
    }
    
    if ($alamat=='') {
        $error_alamat = 'alamat tidak boleh kosong';
    }
    
    if ($jabatan_pegawai=='') {
        $error_jabatan_pegawai = 'jabatan tidak boleh kosong';
    }
    
    if ($tgl_lahir=='') {
        $error_tgl_lahir = 'tanggal lahir tidak boleh kosong';
    }
    
    if ($jenis_kelamin=='') {
        $error_jenis_kelamin = 'jenis kelamin tidak boleh kosong';
    }
    
    if ($tlp_pegawai=='') {
        $error_tlp_pegawai = 'nomer telepon tidak boleh kosong';
    }else{
        if ( !is_numeric($tlp_pegawai)) {
            $error_tlp_pegawai = 'nomer telepon harus berupa angka';
        } else {
            if (strlen($tlp_pegawai) > 12) {
                $error_tlp_pegawai = 'nomor telepon maksimal 12 digit';
            }
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
            $error_tlp_pegawai == '' && 
            $error_agama == ''
            ) {
            //    input ke database
                $query = "INSERT INTO pegawai (nama_pegawai,nip,alamat,jabatan_pegawai,tgl_lahir,tlp_pegawai,jenis_kelamin,agama,status_kawin,npwp_pegawai)"
                        . " VALUES ('$nama_pegawai','$nip','$alamat','$jabatan_pegawai','$tgl_lahir_input','$tlp_pegawai','$jenis_kelamin','$agama','$status_kawin','$npwp_pegawai')";
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
                    echo '<script>alert("Penambahan data berhasil.")</script>';
            //    redirect ke user
                    echo '<script>window.location="index.php?route=pegawai"</script>';
                }
            }
}

?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Pegawai</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="index.php?route=pegawaiadd" method="POST">
                        <div class="form-group">
                            <label>Nama Pegawai</label> <span class="inputerror"><?php echo $error_nama_pegawai ?></span>
                            <input class="form-control" type="text" name="nama_pegawai" placeholder="nama pegawai" value="<?php echo $nama_pegawai; ?>">
                        </div>
                        <div class="form-group">
                            <label>NIP</label> <span class="inputerror"><?php echo $error_nip ?></span>
                            <input class="form-control" type="text" name="nip" placeholder="nip" value="<?php echo $nip ?>">
                        </div>
                       
                        <div class="form-group">
                            <label>Jabatan</label> <span class="inputerror"><?php echo $error_jabatan_pegawai ?></span>
                            <select class="form-control" name="jabatan_pegawai">
                                <?php 
                                $jabatan_selected = $_POST['jabatan_pegawai'];
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
                            <input class="form-control" type="text" name="alamat" placeholder="alamat" value="<?php echo $alamat; ?>">
                        </div>
                       
                        <div class="form-group">
                            <label>Tanggal Lahir</label> <span class="inputerror"><?php echo $error_tgl_lahir ?></span>
                            <input readonly="readonly" class="form-control datepicker" type="text" name="tgl_lahir" placeholder="tanggal lahir" value="<?php echo $tgl_lahir; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Jenis Kelamin</label> <span class="inputerror"><?php echo $error_jenis_kelamin ?></span>
                            <?php 
                            $jenis_kelamin_checked = $_POST['jenis_kelamin']?$_POST['jenis_kelamin']:'Laki-laki';
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
                            <label>Nomer Telepon</label> <span class="inputerror"><?php echo $error_tlp_pegawai ?></span>
                            <input class="form-control" type="text" name="tlp_pegawai" placeholder="no telepon" value="<?php echo $tlp_pegawai; ?>">
                        </div>
                       
                        <div class="form-group">
                            <label>NPWP</label> <span class="inputerror"><?php echo $error_npwp_pegawai ?></span>
                            <input class="form-control npwp-masked" type="text" name="npwp_pegawai" placeholder="NPWP" value="<?php echo $npwp_pegawai; ?>">
                        </div>
                       
                        <div class="form-group">
                            <label>Agama</label> <span class="inputerror"><?php echo $error_agama ?></span>
                                <?php $selected_agama = $_POST['agama']; ?>
                                <select class="form-control" type="text" name="agama" placeholder="agama" value="<?php echo $agama; ?>">
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
                                $ptkp_selected = $_POST['status_kawin'];
                                $ptkp = mysql_query("SELECT * FROM ptkp ORDER BY kode_ptkp");
                                while ($dataptkp = mysql_fetch_array($ptkp)) {
                                ?>
                                <option <?php echo $dataptkp['kode_ptkp']==$ptkp_selected?'selected="selected"':''; ?> value="<?php echo $dataptkp['kode_ptkp'] ?>"><?php echo $dataptkp['nama_ptkp'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                        <a class="btn btn-default" href="index.php?route=pegawai">Cancel</a>
                    </form>
                    </form>
                </div>
            </div>
            
