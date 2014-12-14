<?php 
//jika tombol submit ditekan
if (isset($_POST['submit'])) 
{
//    menangkap input dari form
    $nama_user = mysql_real_escape_string(trim($_POST['nama_user']));
    $username = mysql_real_escape_string(trim($_POST['username']));
    $level = mysql_real_escape_string(trim($_POST['level']));
    $id_user = mysql_real_escape_string(trim($_POST['id_user']));
        
//    validasi form
    
//    input ke database
    $query = "UPDATE user SET nama_user='$nama_user', username='$username', level='$level' WHERE id_user='$id_user'";
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
        echo '<script>window.location="index.php?route=user"</script>';
    }
}

if (isset($_GET['id']))
{
    $id_user = $_GET['id'];
}
else
{
    $id_user = NULL;
}

//    ambil dari database
$query = "SELECT * FROM user WHERE id_user = '$id_user'";
$result = mysql_query($query);


$row = mysql_fetch_assoc($result);

?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User Edit</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="index.php?route=useredit" method="POST">
                        <div class="form-group">
                            <label>Nama User</label>
                            <input class="form-control" type="text" name="nama_user" placeholder="nama user" value="<?php echo $row['nama_user']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username" placeholder="username" value="<?php echo $row['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <?php 
                            $selected_level = $row['level'];
                            ?>
                            <select class="form-control" name="level">
                                <option value="admin" <?php echo $selected_level=='admin'?'selected="selected"':''; ?>>admin</option>
                                <option value="manager" <?php echo $selected_level=='manager'?'selected="selected"':''; ?>>manager</option>
                            </select>
                        </div>
                        <!--jangan lupa kirim id-->
                        <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                        <input class="btn btn-primary" type="submit" name="submit" value="Edit">
                        <a class="btn btn-default" href="index.php?route=user">Cancel</a>
                    </form>
                    </form>
                </div>
            </div>
            
