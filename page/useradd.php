<?php 
//untuk validasi 
//kita bikin error variabel
$error_nama_user = '';
$error_username = '';


//jika tombol submit ditekan
if (isset($_POST['submit'])) 
{
//    menangkap input dari form
    $nama_user = mysql_real_escape_string(trim($_POST['nama_user']));
    $username = mysql_real_escape_string(trim($_POST['username']));
    $level = mysql_real_escape_string(trim($_POST['level']));
    
    $password = md5('1234');
    
//    validasi form
    if ($nama_user=='') {
        $error_nama_user = 'nama user tidak boleh kosong';
    }
    
    if ($username=='') {
        $error_username = 'username tidak boleh kosong';
    }
    
    if ($error_nama_user == '' && $error_username == '') {
    //    input ke database
        $query = "INSERT INTO user (nama_user,username,level,password) VALUES ('$nama_user','$username','$level','$password')";
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
            echo '<script>window.location="index.php?route=user"</script>';
        }
    }
}

?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User Add</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="index.php?route=useradd" method="POST">
                        <div class="form-group">
                            <label>Nama User</label> <span class="inputerror"><?php echo $error_nama_user ?></span>
                            <input class="form-control" type="text" name="nama_user" placeholder="nama user" value="<?php echo $nama_user; ?>">
                        </div>
                        <div class="form-group">
                            <label>Username</label> <span class="inputerror"><?php echo $error_username ?></span>
                            <input class="form-control" type="text" name="username" placeholder="username" value="<?php echo $username; ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <p class="form-control-static">1234</p>
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <?php 
                            $selected_level = $level;
                            ?>
                            <select class="form-control" name="level">
                                <option value="admin" <?php echo $selected_level=='admin'?'selected="selected"':''; ?>>admin</option>
                                <option value="manager" <?php echo $selected_level=='manager'?'selected="selected"':''; ?>>manager</option>
                            </select>
                        </div>
                        <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                        <a class="btn btn-default" href="index.php?route=user">Cancel</a>
                    </form>
                    </form>
                </div>
            </div>
            
