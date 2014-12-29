<?php 
//memulai session
session_start();

error_reporting(0);

//include koneksi ke database
include 'inc/koneksi.php';
include 'inc/fungsi.php';
include 'inc/pagination1.php';

//jika belum login, redirect ke login.php
if ($_SESSION['status_login']<>1) {
    echo '<script>window.location="login.php"</script>';
};

include 'header.php'; 
?>
</head>

<body>

    <div id="wrapper">

        <?php include 'menu.php'; ?>
        <div id="page-wrapper">
            <?php include 'loader.php'; ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include 'footer.php'; ?>