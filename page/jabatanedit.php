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
 
//    tambahkan id
    $id_jabatan = mysql_real_escape_string(trim($_POST['id_jabatan']));
    
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
        $query = "UPDATE jabatan SET jabatan='$jabatan', gaji_pokok='$gaji_pokok', gaji_kehadiran='$gaji_kehadiran', tunjangan='$tunjangan' WHERE id_jabatan = '$id_jabatan'";
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
            echo '<script>alert("Perubahan data berhasil.")</script>';
    //    redirect ke user
            echo '<script>window.location="index.php?route=jabatan"</script>';
        }
    }
}


if (isset($_GET['id']))
{
    $id_jabatan = $_GET['id'];
}
else
{
    $id_jabatan = NULL;
}

//    ambil dari database
$query = "SELECT * FROM jabatan WHERE id_jabatan = '$id_jabatan'";
$result = mysql_query($query);


$row = mysql_fetch_assoc($result);

?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ubah Jabatan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="index.php?route=jabatanedit" method="POST">
                        <div class="form-group">
                            <label>Jabatan</label> <span class="inputerror"><?php echo $error_jabatan ?></span>
                            <input class="form-control" type="text" name="jabatan" placeholder="jabatan" value="<?php 
                            if ($jabatan) {
                                echo $jabatan;
                            }else{
                                echo $row['jabatan'];
                            }
                            ?>">
                        </div>
                        <div class="form-group">
                            <label>Gaji Pokok</label> <span class="inputerror"><?php echo $error_gaji_pokok ?></span>
                            <input class="form-control" type="text" name="gaji_pokok" placeholder="gaji pokok" value="<?php
                            if ($gaji_pokok) {
                                echo $gaji_pokok;
                            }else{
                                echo $row['gaji_pokok'];
                            }
                            ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Gaji Kehadiran</label> <span class="inputerror"><?php echo $error_gaji_kehadiran ?></span>
                            <input class="form-control" type="text" name="gaji_kehadiran" placeholder="gaji kehadiran" value="<?php
                            if ($gaji_kehadiran) {
                                echo $gaji_kehadiran;
                            }else{
                                echo $row['gaji_kehadiran'];
                            }
                            ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Tunjangan</label> <span class="inputerror"><?php echo $error_tunjangan ?></span>
                            <input class="form-control" type="text" name="tunjangan" placeholder="Tunjangan" value="<?php
                            if ($tunjangan) {
                                echo $tunjangan;
                            }else{
                                echo $row['tunjangan'];
                            }
                            ?>">
                        </div>
                        <input type="hidden" name="id_jabatan" value="<?php
                            if ($id_jabatan) {
                                echo $id_jabatan;
                            }else{
                                echo $row['id_jabatan'];
                            }
                            ?>">
                        <input class="btn btn-primary" type="submit" name="submit" value="Ubah">
                        <a class="btn btn-default" href="index.php?route=jabatan">Batal</a>
                    </form>
                    </form>
                </div>
            </div>
            
