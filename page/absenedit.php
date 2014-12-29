<?php 
if (isset($_POST['submit'])) {
    
    $ket_absen = $_POST['absen'];
    $id_absen = $_POST['id_absen'];
    
    $ubah = mysql_query("UPDATE absen SET ket_absen = '$ket_absen' WHERE id_absen = '$id_absen'");
    
    if (!$ubah) 
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
            echo '<script>window.location="index.php?route=absen"</script>';
        }
    
}


$id_absen = $_GET['id']?$_GET['id']:$_POST['id_absen'];

$qabsen = mysql_query("SELECT * FROM absen LEFT JOIN pegawai ON pegawai.id_pegawai = absen.id_pegawai_fk_absen WHERE id_absen = '$id_absen'");
$data = mysql_fetch_array($qabsen);
?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Absen</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="index.php?route=absenedit" method="POST">
                        <table class="table">
                            <tr>
                                <td width="200px">Nama Pegawai</td>
                                <td><?php echo $data['nama_pegawai'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Absen</td>
                                <td><?php echo tglview($data['tgl_absen']) ?></td>
                            </tr>
                            <tr>
                                <td>Keterangan Absen</td>
                                <td>
                                    <?php 
                                    $selected_absen = $_POST['absen']?$_POST['absen']:$data['ket_absen'];
                                    ?>
                                    <select name="absen">
                                        <option <?php echo $selected_absen == 'masuk'?'selected = "seleceted"':''; ?> value="masuk">Masuk</option>
                                        <option <?php echo $selected_absen == 'cuti'?'selected = "seleceted"':''; ?> value="cuti">Cuti</option>
                                        <option <?php echo $selected_absen == 'sakit'?'selected = "seleceted"':''; ?> value="sakit">Sakit</option>
                                        <option <?php echo $selected_absen == 'alpa'?'selected = "seleceted"':''; ?> value="alpa">Alpa</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="id_absen" value="<?php echo $data['id_absen'] ?>" />
                        <input class="btn btn-primary" type="submit" name="submit" value="Ubah">
                        <a class="btn btn-default" href="index.php?route=absen">Batal</a>
                    </form>
                </div>
            </div>