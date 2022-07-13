<?php
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


function query($query)
{
    global $conn;
    $result =  mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahData($data)
{
    global $conn;
    // var_dump($data);

    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);

    $query = "INSERT INTO mahasiswa(nrp, nama, email, jurusan, gambar) VALUES ('$nrp','$nama','$email','$jurusan','$gambar');";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateData($data)
{
    global $conn;
    // var_dump($data);

    $id = htmlspecialchars($data['id']);
    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);

    $query = "UPDATE mahasiswa SET nrp='$nrp',nama='$nama',email='$email',jurusan='$jurusan',gambar='$gambar' WHERE id='$id';";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusData($id)
{
    global $conn;
    $query = "DELETE FROM mahasiswa WHERE id = '$id';";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function cariData($keyword)
{
    $query = "SELECT * FROM mahasiswa
            WHERE
            nama LIKE '%$keyword%' OR
            nrp LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%';";

    return query($query);
}
