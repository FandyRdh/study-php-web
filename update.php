<?php
require_once "functions.php";

// Get Data by ID
// var_dump($_GET);
$id = $_GET["id"];
$query = "SELECT * FROM mahasiswa WHERE id='$id';";
$mhs = query($query)[0]; //Ditambahkan array 0
// var_dump($mhs);

// 
if (isset($_POST['submit'])) {
    // call function and check insert
    if (updateData($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil di ubah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal di ubah');
        </script>
        ";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h3>Update Data</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="id" value="<?= $mhs['id']; ?> " id="nrp">
            <input type="hidden" class="form-control" name="gambarLama" value="<?= $mhs['gambar']; ?> ">
            <div class="mb-3">
                <label for="nrp" class="form-label">NRP</label>
                <input type="text" class="form-control" name="nrp" value="<?= $mhs['nrp']; ?> " id="nrp">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $mhs['nama']; ?>" id="nama">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?= $mhs['email']; ?>" id="email">
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" name="jurusan" value="<?= $mhs['jurusan']; ?>" id="jurusan">
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label><br>
                <img src="assets/img/<?= $mhs['gambar']; ?>" alt="foto profile" width="100" class="mt-3 mb-3">
                <input type="file" class="form-control" name="gambar" value="<?= $mhs['gambar']; ?>" id="gambar">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>