<?php 
//untuk validasi 
//kita bikin error variabel
$error_kode_ptkp = '';
$error_nama_ptkp = '';
$error_nilai_ptkp = '';


//jika tombol submit ditekan
if (isset($_POST['submit'])) 
{
//    menangkap input dari form
    $kode_ptkp = mysql_real_escape_string(trim($_POST['kode_ptkp']));
    $nama_ptkp = mysql_real_escape_string(trim($_POST['nama_ptkp']));
    $nilai_ptkp = mysql_real_escape_string(trim($_POST['nilai_ptkp']));
    
//    validasi form
    if ($kode_ptkp=='') {
        $error_kode_ptkp = 'kode ptkp tidak boleh kosong';
    }
    
    if ($nama_ptkp=='') {
        $error_nama_ptkp = 'nama ptkp tidak boleh kosong';
    }
    
    if ($nilai_ptkp=='') {
        $error_nilai_ptkp = 'nilai ptkp tidak boleh kosong';
    }else{
        if (!is_numeric($nilai_ptkp)) {
            $error_nilai_ptkp = 'nilai ptkp harus berupa angka';
        }
    }
    if ($error_kode_ptkp == '' && $error_nama_ptkp == '' && $error_nilai_ptkp == '') {
    //    input ke database
        $query = "UPDATE ptkp SET kode_ptkp = '$kode_ptkp', nama_ptkp = '$nama_ptkp', nilai_ptkp = '$nilai_ptkp' WHERE kode_ptkp = '$kode_ptkp'";
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
            echo '<script>window.location="index.php?route=ptkp"</script>';
        }
    }
}



$kode_ptkp = $_GET['id']?$_GET['id']:$_POST['kode_ptkp'];


//    ambil dari database
$query = "SELECT * FROM ptkp WHERE kode_ptkp = '$kode_ptkp'";
$result = mysql_query($query);


$row = mysql_fetch_assoc($result);

?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ubah PTKP</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="index.php?route=ptkpedit" method="POST">
                        <div class="form-group">
                            <label>Kode PTKP</label> <span class="inputerror"><?php echo $error_kode_ptkp ?></span>
                            <input readonly="readonly" class="form-control" type="text" name="kode_ptkp" placeholder="Kode PTKP" value="<?php echo $kode_ptkp?$kode_ptkp:$row['kode_ptkp']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Keterangan PTKP</label> <span class="inputerror"><?php echo $error_nama_ptkp ?></span>
                            <input class="form-control" type="text" name="nama_ptkp" placeholder="Keterangan PTKP" value="<?php echo $nama_ptkp?$nama_ptkp:$row['nama_ptkp']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Nilai PTKP / Tahun</label> <span class="inputerror"><?php echo $error_nilai_ptkp ?></span>
                            <input class="form-control" type="text" name="nilai_ptkp" placeholder="gaji pokok" value="<?php echo $nilai_ptkp?$nilai_ptkp:$row['nilai_ptkp']; ?>">
                        </div>
                        <input type="hidden" name="kode_ptkp" value="<?php echo $kode_ptkp?$kode_ptkp:$row['kode_ptkp']; ?>">
                        <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                        <a class="btn btn-default" href="index.php?route=ptkp">Batal</a>
                    </form>
                    </form>
                </div>
            </div>
            
