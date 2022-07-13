<?php
require_once "functions.php";

if (hapusData($_GET['id']) > 0) {
    echo "
        <script>
            alert('Data Berhasil di hapus');
            document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
    <script>
        alert('Data Gagal di hapus');
        document.location.href = 'index.php';
    </script>
    ";
}
