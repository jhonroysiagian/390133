<?php 
if (isset($_GET['id']))
{
    $id_absen = $_GET['id'];
}
else
{
    $id_absen = NULL;
}

    //    hapus dari database
$query = "DELETE FROM absen WHERE id_absen = '$id_absen'";
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
//    redirect ke absen
    echo '<script>window.location="index.php?route=absen"</script>';
}
?>

