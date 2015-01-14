<?php 
//untuk validasi 
//kita bikin error variabel
$error_jabatan = '';
$error_gaji_pokok = '';
$error_gaji_kehadiran = '';
$error_tunjangan = '';


//jika tombol submit ditekan
if (isset($_POST['submit'])) 
{
//    menangkap input dari form
    $jabatan = mysql_real_escape_string(trim($_POST['jabatan']));
    $gaji_pokok = mysql_real_escape_string(trim($_POST['gaji_pokok']));
    $gaji_kehadiran = mysql_real_escape_string(trim($_POST['gaji_kehadiran']));
    $tunjangan = mysql_real_escape_string(trim($_POST['tunjangan']));
    
//    validasi form
    if ($jabatan=='') {
        $error_jabatan = 'nama jabatan tidak boleh kosong';
    }
    
    if ($gaji_pokok=='') {
        $error_gaji_pokok = 'gaji pokok tidak boleh kosong';
    }else{
        if (!is_numeric($gaji_pokok)) {
            $error_gaji_pokok = 'gaji pokok harus berupa angka';
        }
    }
    
    if ($gaji_kehadiran=='') {
        $error_gaji_kehadiran = 'gaji kehadiran tidak boleh kosong';
    }else{
        if (!is_numeric($gaji_kehadiran)) {
            $error_gaji_kehadiran = 'gaji kehadiran harusa berupa angka';
        }
    }
    
    if ($tunjangan=='') {
        $error_tunjangan = 'tunjangan tidak boleh kosong';
    }  else {
        if (!is_numeric($tunjangan)) {
            $error_tunjangan = 'tunjangan harus berupa angka';
        }
    }
    
    if ($error_jabatan == '' && $error_gaji_pokok == '' && $error_gaji_kehadiran == '' && $error_tunjangan == '') {
    //    input ke database
        $query = "INSERT INTO jabatan (jabatan, gaji_pokok, gaji_kehadiran, tunjangan) VALUES ('$jabatan','$gaji_pokok','$gaji_kehadiran','$tunjangan')";
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
            echo '<script>window.location="index.php?route=jabatan"</script>';
        }
    }
}

?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Jabatan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="index.php?route=jabatanadd" method="POST">
                        <div class="form-group">
                            <label>Jabatan</label> <span class="inputerror"><?php echo $error_jabatan ?></span>
                            <input class="form-control" type="text" name="jabatan" placeholder="jabatan" value="<?php echo $jabatan; ?>">
                        </div>
                        <div class="form-group">
                            <label>Gaji Pokok</label> <span class="inputerror"><?php echo $error_gaji_pokok ?></span>
                            <input class="form-control" type="text" name="gaji_pokok" placeholder="gaji pokok" value="<?php echo $gaji_pokok; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Uang Kehadiran</label> <span class="inputerror"><?php echo $error_gaji_kehadiran ?></span>
                            <input class="form-control" type="text" name="gaji_kehadiran" placeholder="uang kehadiran" value="<?php echo $gaji_kehadiran; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Tunjangan</label> <span class="inputerror"><?php echo $error_tunjangan ?></span>
                            <input class="form-control" type="text" name="tunjangan" placeholder="Tunjangan" value="<?php echo $tunjangan; ?>">
                        </div>
                        <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                        <a class="btn btn-default" href="index.php?route=jabatan">Batal</a>
                    </form>
                    </form>
                </div>
            </div>
            
