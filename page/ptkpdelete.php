<?php 
if (isset($_GET['id']))
{
    $kode_ptkp = $_GET['id'];
}
else
{
    $kode_ptkp = NULL;
}

//khusus ptkp delete
    //    hapus dari database
    $query = "DELETE FROM ptkp WHERE kode_ptkp = '$kode_ptkp'";
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
//    redirect ke ptkp
        echo '<script>window.location="index.php?route=ptkp"</script>';
    }
?>