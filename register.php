<?php
require_once "functions.php";

if (isset($_POST['register'])) {
    if (registrasi($_POST)) {
        echo "
            <script>
                alert('Data Berhasil di tambahkan');
            </script>
            ";
    } else {
        echo mysqli_error($conn);
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
    <div class="container  p-5">
        <center>
            <h3>Register User</h3>
        </center>
        <form action="" method="post">
            <div class="mb-3">
                <label for="inputUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="inputUsername" name="username">
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="password">
            </div>
            <div class="mb-3">
                <label for="inputPassword2" class="form-label">Confirm Password</label>
                <input type="password2" class="form-control" id="inputPassword2" name="password2">
            </div>
            <button type="submit" class="btn btn-primary" name="register">Register</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>