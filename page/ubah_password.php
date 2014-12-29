<?php 
$error_password_baru = '';
$error_password_baru_2 = '';
$error_password = '';

if (isset($_POST['submit'])) {
    $password_baru = $_POST['password_baru'];
    $password_baru_2 = $_POST['password_baru_2'];
    $password = md5($_POST['password']);
    
    $password_baru_update = md5($_POST['password_baru']);

    $id_user = $_SESSION['id_user'];
    
    if ($password_baru == '') {
        $error_password_baru = 'Password baru tidak boleh kosong';
    }else{
        if ($password_baru <> $password_baru_2) {
            $error_password_baru = 'Ulangi password tidak sama';
        }
    }
    
    if ($password <> $_SESSION['password']) {
        $error_password = 'Password salah';
    }
    
    if ($error_password_baru == '' && $error_password == '' ) {
    //    input ke database
        $query = "UPDATE user SET password = '$password_baru_update' WHERE id_user = '$id_user'";
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
            echo '<script>alert("Perubahan password berhasil. Silahkah logout dan login kembali untuk melihat perubahannya.")</script>';
    //    redirect ke user
            echo '<script>window.location="index.php?route=profile_setting"</script>';
        }
    }
}
?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ubah Username dan Password</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a href="index.php?route=profile_setting">Kembali ke User Profile Setting</a><br><br>
                    <form action="index.php?route=ubah_password" method="post">
                        <div class="form-group">
                            <label>Password Baru</label> <span class="inputerror"><?php echo $error_password_baru ?></span>
                            <input class="form-control" type="password" name="password_baru" placeholder="password baru" value="<?php echo $password_baru; ?>">
                        </div>
                        <div class="form-group">
                        <div class="form-group">
                            <label>Ulangi Password Baru</label>
                            <input class="form-control" type="password" name="password_baru_2" placeholder="ulangi password baru" value="<?php echo $password_baru_2; ?>">
                        </div>
                        <div class="form-group">
                            <label>Password anda saat ini</label> <span class="inputerror"><?php echo $error_password ?></span>
                            <input class="form-control" type="password" name="password">
                        </div>
                        <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                    </form>
                </div>
            </div>