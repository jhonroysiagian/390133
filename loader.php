<?php
//menangkap route dari URL
$route = isset($_GET['route'])?$_GET['route']:'dashboard';

//menampilkan halaman sesuai route
//if ($route) {
    include 'page/'.$route.'.php';
//}else {
//    include 'page/dashboard.php';
//}
?>