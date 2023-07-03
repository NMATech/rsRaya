<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

$no = $_GET['NoPasien'];

if (hapus($no) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'admin.php';
        </script>";
} else {
    echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'admin.php';
        </script>";
}

?>