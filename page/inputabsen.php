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
                    <h1 class="page-header">Input Absen</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="index.php?route=inputabsen" method="post">
                        <input type="text" name="id_pegawai" />
                    <table class="table">
                        <?php 
                        $mulai = '2014/12/26';
                        $akhir = '2015/01/05';
                        
                        $startDate = new DateTime($mulai,new DateTimeZone("Europe/London"));
                        $endDate = new DateTime($akhir,new DateTimeZone("Europe/London"));
                        $radio = 1;
                        do {
                        ?>
                        <tr>
                            <td>
                                <input type="text" readonly="readonly" name="tgl_absen[<?php echo $radio ?>]" value="<?php echo $startDate->format("Y-m-d") , PHP_EOL; ?>" />
                            </td>
                            <td>
                                <select name="absen[<?php echo $radio ?>]">
                                    <option value="masuk">Masuk</option>
                                    <option value="cuti">Cuti</option>
                                    <option value="sakit">Sakit</option>
                                    <option value="alpa">Alpa</option>
                                </select>
                            </td>
                        </tr>
                        <?php
                           $startDate->modify("+1 day");
                           $radio++;
                        } while ($startDate <= $endDate);
                        ?>
                        <input type="hidden" name="counter" value="<?php echo $radio ?>" />
                    </table>
                        <input type="submit" name="submit" value="submit" />
                    </form>
                </div>
            </div>
            <?php 
                        if (isset($_POST['submit'])) {
                            
                            $id_pegawai = $_POST['id_pegawai'];
                            $tgl_absen = $_POST['tgl_absen'];
                            $absen = $_POST['absen'];
                            
                            $counter = $_POST['counter']; /* THIS WILL SET AS YOUR COUNTER */
                            
                            for ($i=1; $i<$counter; $i++)
                            {   
                                $del = "DELETE FROM absen WHERE id_pegawai = '$id_pegawai' AND tgl_absen = '$tgl_absen[$i]'";
                                $query = "INSERT INTO absen (id_pegawai,tgl_absen, ket_absen) VALUES ('$id_pegawai','$tgl_absen[$i]','$absen[$i]')";
                                echo $del;
                                echo '<br>';
                                echo $query;
                                echo '<br>';
                            }
                        }
            
            ?>
            
