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
    // Upload Gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }


    $query = "INSERT INTO mahasiswa(nrp, nama, email, jurusan, gambar) VALUES ('$nrp','$nama','$email','$jurusan','$gambar');";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateData($data)
{
    global $conn;
    // var_dump($_FILES['gambar']);
    // die;

    $id = htmlspecialchars($data['id']);
    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);

    // Check Perubahan Gambar
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = htmlspecialchars($data['gambarLama']);
    } else {
        // Upload Gambar
        $gambar = upload();
        if (!$gambar) {
            return false;
        }
    }

    $query = "UPDATE mahasiswa SET nrp='$nrp',nama='$nama',email='$email',jurusan='$jurusan',gambar='$gambar' WHERE id='$id';";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Check apakah berhasil di upload
    if ($error != 0) {
        echo "
            <script>
              alert('Pilih Gambar Terlebih dahulu');
            </script>
        ";
        return false;
    }

    // Check Jenis file/extensi file
    $extensiGambarValid = ['jpg', 'jpeg', 'png'];
    $extensiGambar = explode('.', $namaFile);
    $extensiGambar = strtolower(end($extensiGambar));
    if (!in_array($extensiGambar, $extensiGambarValid)) {
        echo "
            <script>
                alert('Pilih Gambar format jpg,png,jpeg');
            </script>
        ";
        return false;
    }

    // Check Ukuran file
    if ($ukuranFile > 2000000) {
        echo "
            <script>
                alert('Max gambar 2MB');
            </script>
        ";
        return false;
    }

    // Lolos Pengecekan

    // Generate Nama File
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiGambar;


    // Simpan File
    move_uploaded_file($tmpName, 'assets/img/' . $namaFile);

    return $namaFile;
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

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);


    // Chcek usernam sudah digunakan atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username';");

    // Jika ada maka true
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('username sudah digunakan');
        </script>";
        return false;
    }

    // Cek Konfirmasi
    if ($password != $password2) {
        echo "
        <script>
            alert('password tidak sesuai');
        </script>";
        return false;
    }

    // Enkripsi Password
    $password = password_hash($password, PASSWORD_DEFAULT);
    // var_dump($password);


    // Insert Data
    $query = "INSERT INTO user(username, password) VALUES ('$username','$password');";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
