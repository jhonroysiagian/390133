<?php
//memulai session, harus di baris pertama aplikasi
session_start();

$error = "";
//jika tombol submit ditekan
if (isset($_POST['submit'])) {
    
//    menangkap inputan
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    include 'inc/koneksi.php';
//    cek ke database
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $hasil = mysql_query($query);
    
//    menghitung jumlah baris hasil query
    $jumlah = mysql_num_rows($hasil);
    
//    ambil data user
    $data = mysql_fetch_assoc($hasil);
//    var_dump($data);
//    echo $data["username"];
    
    if ($jumlah===1) {
//        mendaftarkan session
        $_SESSION['status_login'] = TRUE;
        $_SESSION['nama_user'] = $data["nama_user"];
        $_SESSION['username'] = $data["username"];
        $_SESSION['password'] = $data["password"];
        $_SESSION['level'] = $data["level"];
        $_SESSION['id_user'] = $data["id_user"];
//        
//        redirect ke halaman index
        echo '<script>window.location="index.php"</script>';
    }else{
        $error = "username / password salah";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Aplikasi Gaji</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
        .login-error{
            margin-top: 10px;
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="login.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Sign In" />
                            </fieldset>
                        </form>
                        <div class="text-center text-danger login-error">
                            <?php echo $error; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
