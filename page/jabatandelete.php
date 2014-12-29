<?php 
if (isset($_GET['id']))
{
    $id_jabatan = $_GET['id'];
}
else
{
    $id_jabatan = NULL;
}

//khusus jabatan delete
    //    hapus dari database
    $query = "DELETE FROM jabatan WHERE id_jabatan = '$id_jabatan'";
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
//    redirect ke jabatan
        echo '<script>window.location="index.php?route=jabatan"</script>';
    }
?>