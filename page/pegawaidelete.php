<?php 
if (isset($_GET['id']))
{
    $id_pegawai = $_GET['id'];
}
else
{
    $id_pegawai = NULL;
}

    //    hapus dari database
$query = "DELETE FROM pegawai WHERE id_pegawai = '$id_pegawai'";
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
//    redirect ke pegawai
    echo '<script>window.location="index.php?route=pegawai"</script>';
}
?>

