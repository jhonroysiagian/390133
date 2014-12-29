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
    }else{
        $cekkode = mysql_query("SELECT * FROM ptkp WHERE kode_ptkp = '$kode_ptkp'");
        $jumlah = mysql_num_rows($cekkode);
        if ($jumlah>0) {
            $error_kode_ptkp = 'kode ptkp telah ada di database';
        }
         
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
        $query = "INSERT INTO ptkp (kode_ptkp, nama_ptkp, nilai_ptkp) VALUES ('$kode_ptkp','$nama_ptkp','$nilai_ptkp')";
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
            echo '<script>window.location="index.php?route=ptkp"</script>';
        }
    }
}

?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah PTKP</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="index.php?route=ptkpadd" method="POST">
                        <div class="form-group">
                            <label>Kode PTKP</label> <span class="inputerror"><?php echo $error_kode_ptkp ?></span>
                            <input class="form-control" type="text" name="kode_ptkp" placeholder="Kode PTKP" value="<?php echo $kode_ptkp; ?>">
                        </div>
                        <div class="form-group">
                            <label>Keterangan PTKP</label> <span class="inputerror"><?php echo $error_nama_ptkp ?></span>
                            <input class="form-control" type="text" name="nama_ptkp" placeholder="Keterangan PTKP" value="<?php echo $nama_ptkp; ?>">
                        </div>
                        <div class="form-group">
                            <label>Nilai PTKP / Tahun</label> <span class="inputerror"><?php echo $error_nilai_ptkp ?></span>
                            <input class="form-control" type="text" name="nilai_ptkp" placeholder="gaji pokok" value="<?php echo $nilai_ptkp; ?>">
                        </div>
                        <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                        <a class="btn btn-default" href="index.php?route=ptkp">Batal</a>
                    </form>
                    </form>
                </div>
            </div>
            
