<?php
require_once("functions.php");
if (isset($_POST['keyword'])) {
    $mahasiswa = cariData($_POST['keyword']);
} else {
    $mahasiswa = query("SELECT * FROM mahasiswa");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Data Mahasiswa</h1>
        <a href="insertData.php" class="btn btn-primary">Tambah Data</a>
        <form action="" method="post" class="row g-3 mt-2">
            <div class="col-auto ">
                <label for="cari" class="visually-hidden">Cari Data Mahasiswa</label>
                <input type="cari" class="form-control" id="cari" name="keyword" placeholder="Masukan data mahasiswa" autofocus autocomplete="off">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Cari</button>
            </div>
        </form>
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Foto Profile</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0 ?>
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <tr>
                        <th scope="row"><?= ++$i; ?></th>
                        <td><?= $mhs['nrp']; ?></td>
                        <td><?= $mhs['nama']; ?></td>
                        <td><?= $mhs['email']; ?></td>
                        <td><?= $mhs['jurusan']; ?></td>
                        <td><img src="assets/img/<?= $mhs['gambar']; ?>" width="75" alt=""></td>
                        <td>
                            <a class="btn btn-primary" href="update.php?id=<?= $mhs['id']; ?>">Update</a>
                            <a class="btn btn-danger" href="hapus.php?id=<?= $mhs['id']; ?>" onclick="return confirm('yakin akan menghapus data?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>