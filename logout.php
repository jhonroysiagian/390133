<?php 
//memulai session
session_start();

//menghacurkan session
session_destroy();

//redirect ke login.php
echo '<script>window.location="login.php"</script>';
?>