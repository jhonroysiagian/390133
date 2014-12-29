<?php 
$error_username_baru = '';
$error_password = '';

if (isset($_POST['submit'])) {
    $username_baru = $_POST['username_baru'];
    $password = md5($_POST['password']);
    
    $id_user = $_SESSION['id_user'];
    
    if ($username_baru == '') {
        $error_username_baru = 'Username tidak boleh kosong';
    }else{
        $cek = "SELECT * FROM user WHERE username = '$username_baru'";
        $hasil = mysql_query($cek);
        $count = mysql_num_rows($hasil);
        if ($count>0) {
            $error_username_baru = 'Username telah digunakan, gunakan username lain';
        }
    }
    
    if ($password <> $_SESSION['password']) {
        $error_password = 'Password salah';
    }
    
    if ($error_username_baru == '' && $error_password == '' ) {
    //    input ke database
        $query = "UPDATE user SET username = '$username_baru' WHERE id_user = '$id_user'";
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
            echo '<script>alert("Perubahan username berhasil. Silahkah logout dan login kembali untuk melihat perubahannya.")</script>';
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
                    <form action="index.php?route=ubah_username" method="post">
                        <div class="form-group">
                            <label>Username Baru</label> <span class="inputerror"><?php echo $error_username_baru ?></span>
                            <input class="form-control" type="text" name="username_baru" placeholder="username baru" value="<?php echo $username_baru; ?>">
                        </div>
                        <div class="form-group">
                            <label>Password Anda</label> <span class="inputerror"><?php echo $error_password ?></span>
                            <input class="form-control" type="password" name="password">
                        </div>
                        <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                    </form>
                </div>
            </div>