<?php 
if (isset($_GET['id']))
{
    $id_user = $_GET['id'];
}
else
{
    $id_user = NULL;
}

//khusus user delete
if ($id_user==$_SESSION['id_user']) {
//    tampilkan pesan
    echo '<script>alert("Anda tidak boleh menghapus diri sendiri.")</script>';
//    redirect ke user
    echo '<script>window.location="index.php?route=user"</script>';
} 
else
{
    //    hapus dari database
    $query = "DELETE FROM user WHERE id_user = '$id_user'";
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
        echo '<script>alert("Hapus data berhasil.")</script>';
//    redirect ke user
        echo '<script>window.location="index.php?route=user"</script>';
    }
}
?>