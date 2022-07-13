<?php
session_start();
require_once "functions.php";

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // CEK USERNAME
    if (mysqli_num_rows($result) === 1) {
        // CEK PASSWORD
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // Set session
            $_SESSION["login"] = true;

            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}


if (isset($error)) {
    echo "
    <script>
        alert('Password atau username salah');
    </script>
    ";
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
            <h3>Login</h3>
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
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" name="remember" for="exampleCheck1">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>