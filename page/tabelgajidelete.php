<?php 
if (isset($_GET['id']))
{
    $id_gaji = $_GET['id'];
}
else
{
    $id_gaji = NULL;
}

//khusus gaji delete
    //    hapus dari database
    $query = "DELETE FROM gaji WHERE id_gaji = '$id_gaji'";
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
//    redirect ke gaji
        echo '<script>window.location="index.php?route=tabelgaji"</script>';
    }
?>