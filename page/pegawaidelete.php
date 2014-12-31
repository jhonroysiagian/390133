<?php 
if (isset($_GET['id']))
{
    $nip = $_GET['id'];
}
else
{
    $nip = NULL;
}

    //    hapus dari database
$query = "DELETE FROM pegawai WHERE nip = '$nip'";
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

