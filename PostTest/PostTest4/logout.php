<?php
session_start();
session_unset(); // hapus semua variabel session
session_destroy(); // hapus session sepenuhnya
header("Location: login.php");
exit();
?>
